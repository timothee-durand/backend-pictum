<?php

namespace App\Http\Controllers;

use App\Creneaux;
use App\Gestionnaire;
use App\Http\Resources\GestionnaireResource;
use App\Indisponibilite;
use App\Reservation;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class GestionnaireController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
//        $gestionnaires = Gestionnaire::all();
//
//        foreach ($gestionnaires as $gestionnaire)  {
//            $gestionnaire->departement;
//        }

        return GestionnaireResource::collection(Gestionnaire::all())->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Renvoie un tableau de Time correpondant aux rendez-vous pour la période donnée avec l'interval donné
     *
     * @param string $start_time
     * @param string $end_time
     * @param string $interval
     * @return array
     */
    public function getRendezVousFromPeriod($start_time, $end_time, $interval = "10")
    {
        // echo "start : ".$start_time." end :".$end_time." inter : ".$interval."\n";
        //conversion en heure
        $start_time = strtotime($start_time);
        $end_time = strtotime($end_time);


        $array_reponse = array();
        $time = $start_time;
        while ($time <= $end_time) {
            $array_reponse[] = date('H:i', $time);
            $time = strtotime('+' . $interval . ' minutes', $time);
        }

        //echo print_r($array_reponse)."\n";

        return $array_reponse;
    }

    /**
     * Get the index of the day from a date
     * Semaine commence le dimanche : Di = 0, Lu = 1...
     * https://gist.github.com/samcrosoft/6550473
     *
     * @param string $date
     * @return false|string
     */
    private function getWeekday($date)
    {
        return date('w', strtotime($date));
    }

    /**
     * Return the date from the index of a day of week after an other date
     *
     * @param $index_day
     * @param $start_date
     * @return false|int
     */
    private function getDateFromIndexDay($index_day, $start_date, $day_max = 7)
    {
//        $end = false;
//        while (!$end) {
//            if ($this->getWeekday($start_date) != $index_day) {
//                //si la date de départ ne correspond pas au bon jour
//                $start_date = strtotime($start_date . "+1 day");
//                echo $start_date;
//            } else {
//                //si c'est le bon jour
//                $end = true;
//                return $start_date;
//            }
//        }
        //si il est après dans la semaine
        if($index_day >= $this->getWeekday($start_date)) {
            $difdate = $index_day - $this->getWeekday($start_date);
            $strindate = strtotime($start_date."+".$difdate." day");
            return date("Y-m-d", $strindate);
        }
        else {
            //on se replace par rapport au début de la semaine
            $difdate = $index_day + ($day_max - $index_day) + $this->getWeekday($start_date);
            $strindate = strtotime($start_date."+".$difdate." day");
            return date("Y-m-d", $strindate);
        }

    }


    /**
     *
     * Display a listing of the rendez-vous of this Gestionnaire
     *
     * @param Request $request
     * @param int $id
     * @return array
     */

    public function getRendezVous(Request $request, $id)
    {
        $creneaux = Creneaux::where("gestionnaire_id", $id)->get();
        $indisponibilites = Indisponibilite::where("gestionnaire_id", $id)->get();

        echo "indisponibilites :".$indisponibilites->toJSON(JSON_PRETTY_PRINT);

        //jour de demande : un int
        $startDay = $request->input("start_day");
        $startDayIndex = $this->getWeekday($startDay);

        //fait un tableau contenant les jours ouvrés possibles avec date correspondantes
        $joursOuvresCreneaux = array();

        $indexJoursOuvres = array();
        $indexJoursOuvres[] = (object)["index" => $startDayIndex, "date" => $startDay];

        //on regarde quel est le jour ou la semaine se termine ==> ou il n'y a plus de creneaux
        $jourMax = 0;
        foreach ($creneaux as $creneau) {
            if ($creneau->jour > $jourMax) {
                $jourMax = $creneau->jour;
            }
        }

        //regarde quels jours de la semaine sont les 2 jours ouvrés après le jour de départ
        $indexJour = $startDayIndex + 1;

        for ($i = 0; $i < 2; $i++) {
            //vérifie si le jour est dans l'interval de la semaine
            if ($indexJour >= 0 && $indexJour <= $jourMax) {
                //si oui on le rajoute au tableau de jours
                $indexJoursOuvres[] = (object)["index" => $indexJour, "date" => $this->getDateFromIndexDay($indexJour, $startDay)];
            } else {
                //sinon on retourne au début de la semaine
                $indexJour = 0;
                //puis on rajoute
                $indexJoursOuvres[] = (object)["index" => $indexJour, "date" => $this->getDateFromIndexDay($indexJour, $startDay)];
            }
            //echo $this->getDateFromIndexDay($indexJour, $startDay)."\n";
            $indexJour++;
        }

        //puis on ne garde que les crenaux dont les jours correspondent
        foreach ($creneaux as $creneau) {
            foreach ($indexJoursOuvres as $indexJour) {
                if ($creneau->jour == $indexJour->index) {
                    $joursOuvresCreneaux[] = $creneau;
                }
            }
        }


        //enfin on fait les rendez-vous pour chaque jours
        $arrayRDV = array();
        foreach ($joursOuvresCreneaux as $jour) {
            $jourR = array();
            $jourR["indexJour"] = $jour->jour;

            $jourR["rdvMatin"] = $this->getRendezVousFromPeriod($jour->heure_debut_matin, $jour->heure_fin_matin, "10");
            $jourR["rdvAm"] = $this->getRendezVousFromPeriod($jour->heure_debut_am, $jour->heure_fin_am, "10");

            $arrayRDV[] = (object)$jourR;
        }


        return $arrayRDV;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
//        //validation envoi
//        $this->validate( $request, [
//                "id_univ"=>"required",
//                "admin"=>"required"
//            ]
//        );

        /*TODO : faire en sorte que le remplissage nom/prenom/mail se fasse automatiquement avec LDAP */

        $gestionnaire = new Gestionnaire([
            "nom" => $request->input("nom"),
            "prenom" => $request->input("prenom"),
            "mail" => $request->input("mail"),
            "id_univ" => $request->input("id_univ"),
            "admin" => $request->input("admin"),
            "departement_id" => $request->input("departement_id")
        ]);

        if ($gestionnaire->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Gestionnaire $gestionnaire
     * @return GestionnaireResource
     */
    public function show(Gestionnaire $gestionnaire)
    {
        return new GestionnaireResource($gestionnaire);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Gestionnaire $gestionnaire
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Gestionnaire $gestionnaire)
    {
        $gestionnaire = Gestionnaire::find($gestionnaire->id);

        //verif modif et mise à jour
        if ($request->input("nom") != null) {
            $gestionnaire->nom = $request->input("nom");
        }

        if ($request->input("prenom") != null) {
            $gestionnaire->prenom = $request->input("prenom");
        }

        if ($request->input("mail") != null) {
            $gestionnaire->mail = $request->input("mail");
        }
        if ($request->input("id_univ") != null) {
            $gestionnaire->id_univ = $request->input("id_univ");
        }
        if ($request->input("admin") != null) {
            $gestionnaire->admin = $request->input("admin");
        }
        if ($request->input("departement_id") != null) {
            $gestionnaire->departement_id = $request->input("departement_id");
        }

        //envoi modifs
        if ($gestionnaire->save()) {
            return json_encode([
                "method" => "update",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Gestionnaire $gestionnaire
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Gestionnaire $gestionnaire)
    {
        if (Reservation::find($gestionnaire->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }
}
