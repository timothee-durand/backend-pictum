<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Http\Resources\GestionnaireResource;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class GestionnaireController extends Controller
{
    //variables globales pour simplifier le nombre de paramètres des fonctions

    private $indexStartDay = 0;
    private $startDay = null;
    private $jourMax = 0;
    //semaine commence lundi donc a 1
    private $jourMin = 1;
    private $indexEndWeek = 6;
    private $jourOuvresCreneaux = [];
    private $creneaux = [];


    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
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
     *Get the index of the day from a date
     * Semaine commence le dimanche : Di = 0, Lu = 1...
     * https://gist.github.com/samcrosoft/6550473
     *
     * @param $date
     * @return int
     */
    private function getWeekday($date)
    {
        return (int) date('w', strtotime($date));
    }

    /**
     * Return the date from the index of a day of week after an other date
     *
     * @param $index_day
     * @param $start_date
     * @param $index_start_day
     * @param int $day_max
     * @return false|int
     */
    private function getDateFromIndexDay($index_day, $start_date)
    {
         //echo "start_day : ".$start_date." index :".$this->indexStartDay." indexday:".$index_day."\n";

        if ($index_day >=  $this->indexStartDay) {
            //si il est après dans la semaine
            $difdate = $index_day - $this->getWeekday($start_date);

            return date('Y-m-d', strtotime($start_date . " + " . $difdate . " days"));
        } else {
            //on se replace par rapport au début de la semaine

            //echo "difsem ".($index_day + ($this->indexEndWeek - $this->indexStartDay) + $this->jourMin)."\n";
            $difdate = $index_day + ($this->indexEndWeek - $this->indexStartDay) + $this->jourMin;
            $strindate = strtotime($start_date . "+" . $difdate . " day");

            return date("Y-m-d", $strindate);
        }

    }

    /**
     *
     * Return next correct index day
     *
     * @param $indexDay
     * @param $jourMax
     * @param $jourMin
     *
     * @return int
     */
    function getNextIndexDay($indexDay) {
            $indexDay++;

            if($indexDay < $this->jourMin) {

                $indexDay = $this->jourMin;
            }

            if($indexDay > $this->jourMax) {
                $indexDay = $this->jourMin;
            }

            return $indexDay;
    }

    function getNextCreneaux ($indexStart, $numberCreneaux, $indisponibilites ) {

        $indexStart = $this->getNextIndexDay($indexStart);

        $creneauReturn = [];

        //echo json_encode($indexStart)."\n";

        do{
            $creneauReturn [] = $this->findCreneau($indexStart, $indisponibilites);

            if (count($creneauReturn) < $numberCreneaux) {

                $indexStart =  $this->getNextIndexDay($indexStart);

            }

           echo"creneaureturn : ". json_encode($creneauReturn). 'indextsrat : '. $indexStart."\n";

        } while (count($creneauReturn) < $numberCreneaux);

        return $creneauReturn;

    }

    /**
     *
     * @param int $indexStart
     * @param  $startDate

     * @return array
     */
    public function findCreneau(int $indexStart, $indisponibilites)
    {
       // echo "this->creneaux".json_encode($this->creneaux)."\n";
        foreach ($this->creneaux as $test) {
            if ($test["jour"] == $indexStart) {
                $creneauAjout = $test;
                $creneauAjout["date"] = $this->getDateFromIndexDay($creneauAjout["jour"], $this->startDay);
                echo "creneauAjout". json_encode($creneauAjout)."\n";

                //ajuste le créneaux aux indisponibilités du gestionnaire
                $creneauAjout = $this->verifyIndispo($creneauAjout, $indisponibilites);

                return $creneauAjout;
            }
        }

        return null;
    }


    /**
     * @param $creneaux
     *
     * @return
     */

    private function getMaxDate($creneaux){
        $maxDate = $this->startDay;


        foreach ($creneaux as $creneau) {
            //echo "dateTest : ".json_encode($creneau)."\n";
            $dateTest = $creneau["date"];

            if(Carbon::parse($dateTest)->isAfter($maxDate)) {
                $maxDate = $dateTest;
            }
        }

       // echo "maxDate : ".$maxDate."\n";

        return $maxDate;
    }

    /**
     * @param array $creneauToVerify
     * @param array $indisponibilites
     * @return array
     */
    private function verifyIndispo (array $creneauToVerify, $indisponibilites) {

        $dateTimeDebut = Carbon::createFromFormat("Y-m-d", $creneauToVerify["date"]);
        $dateTimeDebut->setTimeFromTimeString($creneauToVerify["heure_debut_matin"]);

        $dateTimeFin = Carbon::createFromFormat("Y-m-d", $creneauToVerify["date"]);
        $dateTimeFin->setTimeFromTimeString($creneauToVerify["heure_fin_am"]);


        foreach ($indisponibilites as $indisponibilite) {
            //echo "indispo :".json_encode($indisponibilite)."\n creneeau :".$dateTimeDebut->toDateTimeString()."->".$dateTimeFin->toDateTimeString()."\n";
            $dateDebutIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_debut"]);
            $dateFinIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_fin"]);


            //on regarde si l'indisponibilité concerne le creneau
            if($dateTimeDebut->isBetween($dateDebutIndispo, $dateFinIndispo) || $dateTimeFin->isBetween($dateDebutIndispo, $dateFinIndispo)){
                echo "creneau : ".$dateTimeDebut->toDateTimeString()."->".$dateTimeFin->toDateTimeString(),", indispo : ".$dateDebutIndispo->toDateTimeString()."->".$dateFinIndispo->toDateTimeString()."\n";

                if($dateTimeDebut->isBefore($dateDebutIndispo)){
                    //si cela commence pendant le creneau
                    echo "before";

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_matin"],$creneauToVerify["heure_fin_matin"])) {
                        //et que cela commence le matin
                        $creneauToVerify["heure_fin_matin"] = $dateDebutIndispo->toTimeString();
                    }

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_am"],$creneauToVerify["heure_fin_am"])) {
                        //et que cela commence l'après-midi
                        $creneauToVerify["heure_fin_am"] = $dateDebutIndispo->toTimeString();
                    }
                }

                if($dateTimeDebut->isAfter($dateDebutIndispo) && $dateTimeFin->isBefore($dateFinIndispo)) {
                    //si c'est pendant l'indisponibilité
                    //on change le créneau pour qu'il soit le prochain jour ouvré dispo
                    echo"between"."\n";

                    $creneauToVerify = $this->getNextCreneaux($this->getWeekday($this->getMaxDate($this->jourOuvresCreneaux)), 1, $indisponibilites);

                    // echo "jourouvre2".json_encode($creneau)."\n";
                }

                if($dateTimeFin->isAfter($dateFinIndispo)) {
                    //si l'indisponibilité se finit avant la fin du creneau
                    echo"after";

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_matin"],$creneauToVerify["heure_fin_matin"])) {
                        //et que ca se finit pendant le matin
                        $creneauToVerify["heure_debut_matin"] = $dateDebutIndispo->toTimeString();
                    }

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_am"],$creneauToVerify["heure_fin_am"])) {
                        //et que ca se finit pendant l'après-midi
                        $creneauToVerify["heure_debut_am"] = $dateDebutIndispo->toTimeString();
                    }
                }

            }
        }

        return $creneauToVerify;
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
        $gestionnaires = new GestionnaireResource(Gestionnaire::find($id));

        $this->creneaux =  $gestionnaires->creneaux->toArray();
        $indisponibilites = $gestionnaires->indisponibilites;
//        $rdvExistants = $gestionnaires->rdvs;
//
//        dd($rdvExistants);

        //echo "inds:" . json_encode($this-> ). "\n";

        //jour de demande : une date
        $this->startDay = $request->input("start_day");
        $this->indexStartDay = $this->getWeekday($this->startDay);



        //fait un tableau contenant les jours ouvrés possibles avec date correspondantes
        $this->jourOuvresCreneaux = [$this->findCreneau($this->indexStartDay, $indisponibilites)];

//        $indexJoursOuvres = array();
//        $indexJoursOuvres[] = (object)["index" => $startDayIndex, "date" => $startDay];

        //on regarde quel est le jour ou la semaine se termine ==> ou il n'y a plus de creneaux
        foreach ($this->creneaux as $creneau) {
            if ($creneau["jour"] > $this->jourMax) {
                $this->jourMax =  $creneau["jour"];
            }
        }

        //on ajoute les 2 jours ouvrés suivant
        $this->jourOuvresCreneaux = array_merge($this->jourOuvresCreneaux, $this->getNextCreneaux($this->indexStartDay, 2, $indisponibilites)) ;

        echo "jourouvrecreb :" . json_encode($this->jourOuvresCreneaux) . "\n";

        //echo "indispo".json_encode($indisponibilites)."\n";

  //      foreach ($this->jourOuvresCreneaux as $joursOuvresCreneau) {
//
//            $dateTimeDebut = Carbon::createFromFormat("Y-m-d", $joursOuvresCreneau["date"]);
//            $dateTimeDebut->setTimeFromTimeString($joursOuvresCreneau["heure_debut_matin"]);
//
//            $dateTimeFin = Carbon::createFromFormat("Y-m-d", $joursOuvresCreneau["date"]);
//            $dateTimeFin->setTimeFromTimeString($joursOuvresCreneau["heure_fin_am"]);
//
//
//            foreach ($indisponibilites as $indisponibilite) {
//                //echo "indispo :".json_encode($indisponibilite)."\n creneeau :".$dateTimeDebut->toDateTimeString()."->".$dateTimeFin->toDateTimeString()."\n";
//                $dateDebutIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_debut"]);
//                $dateFinIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_fin"]);
//
//
//                //on regarde si l'indisponibilité concerne le creneau
//                if($dateTimeDebut->isBetween($dateDebutIndispo, $dateFinIndispo) || $dateTimeFin->isBetween($dateDebutIndispo, $dateFinIndispo)){
//                    echo "creneau : ".$dateTimeDebut->toDateTimeString()."->".$dateTimeFin->toDateTimeString(),", indispo : ".$dateDebutIndispo->toDateTimeString()."->".$dateFinIndispo->toDateTimeString()."\n";
//
//
//                    if($dateTimeDebut->isBefore($dateDebutIndispo)){
//                        //si cela commence pendant le creneau
//                        echo "before";
//
//                        if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($joursOuvresCreneau["heure_debut_matin"],$joursOuvresCreneau["heure_fin_matin"])) {
//                            //et que cela commence le matin
//                            $joursOuvresCreneau["heure_fin_matin"] = $dateDebutIndispo->toTimeString();
//                        }
//
//                        if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($joursOuvresCreneau["heure_debut_am"],$joursOuvresCreneau["heure_fin_am"])) {
//                            //et que cela commence l'après-midi
//                            $joursOuvresCreneau["heure_fin_am"] = $dateDebutIndispo->toTimeString();
//                        }
//                    }
//
//                    if($dateTimeDebut->isAfter($dateDebutIndispo) && $dateTimeFin->isBefore($dateFinIndispo)) {
//                        //si c'est pendant l'indisponibilité
//                        //on change le créneau pour qu'il soit le prochain jour ouvré dispo
//                        echo"between"."\n";
//
//                        $joursOuvresCreneaux [] = $this->getNextCreneaux($this->getWeekday($this->getMaxDate($joursOuvresCreneaux)),$this->creneaux, 1);
//
//                        unset ($joursOuvresCreneau);
//
//                       // echo "jourouvre2".json_encode($joursOuvresCreneau)."\n";
//                    }
//
//                    if($dateTimeFin->isAfter($dateFinIndispo)) {
//                        //si l'indisponibilité se finit avant la fin du creneau
//                        echo"after";
//
//                        if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($joursOuvresCreneau["heure_debut_matin"],$joursOuvresCreneau["heure_fin_matin"])) {
//                            //et que ca se finit pendant le matin
//                            $joursOuvresCreneau["heure_debut_matin"] = $dateDebutIndispo->toTimeString();
//                        }
//
//                        if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($joursOuvresCreneau["heure_debut_am"],$joursOuvresCreneau["heure_fin_am"])) {
//                            //et que ca se finit pendant l'après-midi
//                            $joursOuvresCreneau["heure_debut_am"] = $dateDebutIndispo->toTimeString();
//                        }
//                    }
//
//                }
//            }

     //   }


        //enfin on fait les rendez-vous pour chaque jours
        $arrayRDV = array();
        foreach ($this->jourOuvresCreneaux as $jour) {
            $jourR = array();
            $jourR["indexJour"] = $jour["jour"];
            $jourR["date_jour"] = $jour["date"];
            $jourR["rdvMatin"] = $this->getRendezVousFromPeriod($jour["heure_debut_matin"], $jour["heure_fin_matin"], "10");
            $jourR["rdvAm"] = $this->getRendezVousFromPeriod($jour["heure_debut_matin"], $jour["heure_fin_matin"], "10");

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
