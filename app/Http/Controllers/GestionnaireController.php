<?php

namespace App\Http\Controllers;

use App\EstPrete;
use App\Gestionnaire;
use App\Http\Resources\GestionnaireResource;
use App\Reservation;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

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
    private $rdvs = [];
    private $dureeCreneau = "10";


    /**
     * Display a listing of the resource.
     * @group Gestionnaire
     * @response [
    {
    "nom": "Terrance",
    "prenom": "Rohan",
    "mail": "kemmer.osvaldo@gmail.com",
    "id_univ": "waino62",
    "admin": 0,
    "departement": null,
    "rdv": [
    {
    "id": 7,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "date_debut": "2020-08-22 21:41:09",
    "date_fin": "2020-03-01 13:58:20",
    "rendu": "2020-03-01 13:58:20",
    "materiel_id": 5,
    "reservation_id": 20,
    "gestionnaire_id": 1
    },
    {
    "id": 16,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "date_debut": "2020-05-19 22:39:51",
    "date_fin": "2020-11-10 00:33:21",
    "rendu": "2021-01-15 21:20:41",
    "materiel_id": 28,
    "reservation_id": 70,
    "gestionnaire_id": 1
    },

    {
    "id": 92,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-08-27 10:40:07",
    "date_fin": "2020-11-13 12:50:28",
    "rendu": "2021-01-23 03:45:21",
    "materiel_id": 6,
    "reservation_id": 73,
    "gestionnaire_id": 1
    }
    ],
    "creneaux": [
    {
    "id": 5,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 3,
    "heure_debut_matin": "06:51:04",
    "heure_fin_matin": "11:13:07",
    "heure_debut_am": "13:09:21",
    "heure_fin_am": "17:05:33",
    "gestionnaire_id": 1
    },
    {
    "id": 16,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 5,
    "heure_debut_matin": "08:42:31",
    "heure_fin_matin": "11:14:53",
    "heure_debut_am": "13:44:13",
    "heure_fin_am": "16:08:51",
    "gestionnaire_id": 1
    },
    {
    "id": 30,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 5,
    "heure_debut_matin": "07:12:41",
    "heure_fin_matin": "11:12:16",
    "heure_debut_am": "13:26:06",
    "heure_fin_am": "16:18:56",
    "gestionnaire_id": 1
    },
    {
    "id": 32,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 3,
    "heure_debut_matin": "08:49:42",
    "heure_fin_matin": "11:45:22",
    "heure_debut_am": "13:48:19",
    "heure_fin_am": "17:54:38",
    "gestionnaire_id": 1
    }
    ],
    "indisponibilites": []
    }]
     *
     * @return string
     */
    public function index()
    {
        return GestionnaireResource::collection(Gestionnaire::all())->toJson(JSON_PRETTY_PRINT);
    }



    /**
     *
     * Display a listing of the rendez-vous of this Gestionnaire
     * @group Gestionnaire
     * @urlParam id int ID du gestionnaire concerné
     * @queryParam start_day Date required Jour à partir duquel on veut les rendez-vous
     * @response [
     *      {
     *  indexJour:0,
     * date_jour:2020-11-03,
     * rdvMatin:[
     *      08:00,
     *      08:15
     * ],
     * rdvAm:[
     *      14:00,
     *      14:15
     * ]
     * }
     * ]
     *
     * @param Request $request
     * @param int $id
     * @return array
     */

    public function getRendezVous(Request $request, $id)
    {
        $gestionnaires = new GestionnaireResource(Gestionnaire::find($id));

        $this->creneaux = $gestionnaires->creneaux->toArray();
        $indisponibilites = $gestionnaires->indisponibilites;
        $this->rdvs = EstPrete::where("gestionnaire_id", $id)->get()->toArray();

        //echo "inds:" . json_encode($this->rdvs ). "\n";

        //jour de demande : une date
        $this->startDay = $request->input("start_day");
        $this->indexStartDay = $this->getWeekday($this->startDay);

        //on regarde quel est le jour ou la semaine se termine ==> ou il n'y a plus de creneaux
        foreach ($this->creneaux as $creneau) {
            if ($creneau["jour"] > $this->jourMax) {
                $this->jourMax = $creneau["jour"];
            }
        }


        //fait un tableau contenant les jours ouvrés possibles avec date correspondantes
        $this->jourOuvresCreneaux = array();
        $this->jourOuvresCreneaux[] = $this->findCreneau($this->indexStartDay, $indisponibilites)[0];


        //on ajoute les 2 jours ouvrés suivant
        $this->jourOuvresCreneaux = array_merge($this->jourOuvresCreneaux, $this->getNextCreneaux($this->jourOuvresCreneaux[0]["jour"], 2, $indisponibilites));


        //echo "jourouvrecreb :" . json_encode($this->jourOuvresCreneaux) . "\n";

        //fait en sorte que le tableau n'aie plus qu'une dimension
        $this->makeOneDimension($this->jourOuvresCreneaux);

        //echo "indispo".json_encode($indisponibilites)."\n";
       // echo "jourouvrecreb2 :" . json_encode($this->jourOuvresCreneaux) . "\n";


        //enfin on fait les rendez-vous pour chaque jours
        $arrayRDV = array();
        foreach ($this->jourOuvresCreneaux as $jour) {
            $jourR = array();
            $jourR["indexJour"] = $jour["jour"];
            $jourR["date_jour"] = $jour["date"];

            $jourR["rdvMatin"] = $this->getRendezVousFromPeriod($jour["heure_debut_matin"], $jour["heure_fin_matin"], $jourR["date_jour"]);
            $jourR["rdvAm"] = $this->getRendezVousFromPeriod($jour["heure_debut_am"], $jour["heure_fin_am"], $jourR["date_jour"]);

            $arrayRDV[] = (object)$jourR;
        }


        return $arrayRDV;
    }


    /**
     * Store a newly Gestionnaire resource in storage.
     * @group Gestionnaire
     *
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {


        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        $ldap  = getInfoLDAP($request->id_univ);

        if ($ldap != false) {
            $gestionnaire = new Gestionnaire([
                "nom" =>  $ldap["nom"][0],
                "prenom" => $ldap["prenom"][0],
                "mail" => $ldap["courriel"][0],
                "id_univ" => $request->input("id_univ"),
                "admin" => $request->input("admin"),
            ]);

            if ($gestionnaire->save()) {
                return json_encode([
                    "method" => "store",
                    "status" => "OK"
                ]);
            }
        } else {
            return response("NOT FIND", 404);
        }



    }

    /**
     * Display the specified Gestionnaire
     * @group Gestionnaire
     * @urlParam gestionnaire int ID du gestionnaire à afficher
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
     * @group Gestionnaire
     * @urlParam gestionnaire int ID du gestionnaire à afficher
     * @queryParam nom string
     * @queryParam prenom string
     * @queryParam mail string
     * @queryParam id_univ string
     * @queryParam admin bool True si le gestionnaire est un administrateur
     * @queryParam departement_id int ID Pictum du département correspondant
     *
     * @response {
     * "Update OK"
     * }
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
            return response("Update OK");
        }
    }

    /**
     * Remove the specified resource from storage.
     * @group Gestionnaire
     * @urlParam gestionnaire int ID du gestionnaire à afficher
     * @response {
     * "Delete OK"
     * }
     * @param \App\Gestionnaire $gestionnaire
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Gestionnaire $gestionnaire)
    {
        if (Reservation::find($gestionnaire->id)->delete()) {
            return response("Delete OK");

        }
    }


    /* FONCTIONS PERSO */

    /**
     * Renvoie un tableau de Time correpondant aux rendez-vous pour la période donnée avec l'interval donné
     *
     * @param string $start_time Heure de début de la période
     * @param string $end_time Heure de fin de la période
     * @param string $date Date du jour de la période
     *
     * @return array Tableau d'heure de rendez-vous
     */
    public function getRendezVousFromPeriod($start_time, $end_time, $date)
    {
        // echo "start : ".$start_time." end :".$end_time." inter : ".$interval."\n";

        //conversion en heure
        $start_time = strtotime($start_time);
        $end_time = strtotime($end_time);



        $rdvDay = array_filter($this->rdvs, function ($rdvTest) use (&$date) {
            if(Carbon::parse($rdvTest["date_debut"])->isSameDay($date) || Carbon::parse($rdvTest["date_fin"])->isSameDay($date)) {
                return true;
            } else {
                return false;
            }
        });


        $array_reponse = array();
        $time = $start_time;
        while ($time <= $end_time) {
            $rdv = date('H:i', $time);

            if($this->verifyRDV($rdv, $date, $rdvDay)) {
                //si il n'y a pas d'autre rendez-vous pour ce creneau on l'ajoute
                $array_reponse[] = $rdv;
            }

            $time = strtotime('+' . $this->dureeCreneau . ' minutes', $time);
        }

        //echo print_r($array_reponse)."\n";

        return $array_reponse;
    }


    /**
     * Vérifie qu'un rendez-vous n'est pas déjà pris
     *
     * @param $rdv string Heure du rendez-vous à vérifier
     * @param $date string Date du rendez-vous
     * @param $rdvDay array Tableau des rendez-vous à faire correspondre
     *
     *
     * @return bool False si le rendez-vous est déjà pris
     */

    public function verifyRDV($rdv, $date, $rdvDay) {


        $dateTimeDebut = Carbon::create($date);
        $dateTimeDebut->setTimeFromTimeString($rdv);

        $dateTimeFin = $dateTimeDebut->copy()->addMinutes((int) $this->dureeCreneau - 1);

        //pour chaque rdvs on regarde si la datetime de début est dans l'interval du rdv présent
        foreach ($rdvDay as $test) {

            $dateTestDebut = Carbon::parse($test["date_debut"]);
            $dateTestFin = Carbon::parse($test["date_fin"]);

//            echo "test ".$dateTestDebut->toDateTimeString()." -> ".$dateTestFin->toDateTimeString()."\n";
//            echo "rdv ".$dateTimeDebut->toDateTimeString()." -> ". $dateTimeFin->toDateTimeString()."\n";

            if(($dateTestDebut >= $dateTimeDebut && $dateTestDebut < $dateTimeFin) || ($dateTestFin >= $dateTimeDebut && $dateTestFin < $dateTimeFin) ) {
                //echo "rdv saute : ".$dateTimeDebut->toDateTimeString()." -> ". $dateTimeFin->toDateTimeString()."\n";
                return false;
            }

        }

        return true;

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
        return (int)date('w', strtotime($date));
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

        if ($index_day >= $this->indexStartDay) {
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
    function getNextIndexDay($indexDay)
    {
        $indexDay++;


        if ($indexDay < $this->jourMin) {

            $indexDay = $this->jourMin;
        }

        if ($indexDay > $this->jourMax) {

            $indexDay = $this->jourMin;
        }

        return $indexDay;
    }

    /**
     * Renvoie un tableau des prochains créneaux disponibles
     *
     * @param $indexStart int Index du jour à partir duquel on cherche
     * @param $numberCreneaux int Nombre de créneaux à renvoyer
     * @param $indisponibilites array Tableau contenant les indisponibilités du gestionnaire
     * @param bool $verification Doit-on vérifier les créneaux (évite les boucles sans fin si appelé depuis fonction de vérification
     *
     *
     * @return array
     */
    function getNextCreneaux($indexStart, $numberCreneaux, $indisponibilites, $verification = true)
    {

        $indexStart = $this->getNextIndexDay($indexStart);

        $creneauReturn = [];

        //echo "indextsrats".$indexStart."verification".$verification." number of rq :".$numberCreneaux."\n";

        do {


            $creneau = $this->findCreneau($indexStart, $indisponibilites, $verification);

            $creneauReturn [] = $creneau;


            if (count($creneauReturn) < $numberCreneaux) {

                $indexStart = $this->getNextIndexDay($indexStart);

            }

            //echo"creneaureturn : ". json_encode($creneauReturn). 'indextsrat : '. $indexStart."\n";

        } while (count($creneauReturn) < $numberCreneaux);

        return $creneauReturn;

    }


    /**
     * Cherche le prochain créneaux disponible
     *
     * @param int $indexStart Index de départ de recherche
     * @param $indisponibilites array Tableau des indisponibilités du gestionnaire
     * @param bool $verification Doit-on vérifier les rendez-vous
     *
     * @return array|mixed|null Renvoie le créneau demandé
     */
    public function findCreneau(int $indexStart, $indisponibilites, $verification = true)
    {

        // echo "this->creneaux".json_encode($this->creneaux)."\n";
        foreach ($this->creneaux as $test) {
            if ($test["jour"] == $indexStart) {
                $creneauAjout = $test;
                $creneauAjout["date"] = $this->getDateFromIndexDay($creneauAjout["jour"], $this->startDay);

                //echo "creneauAjout". json_encode($creneauAjout)."\n";

                if ($verification) {
                    //ajuste le créneaux aux indisponibilités du gestionnaire
                    $creneauAjout = $this->verifyIndispo($creneauAjout, $indisponibilites);
                }


                // echo"test".json_encode(["test"=>"test", "utre"=>3]);

                return $creneauAjout;
            }
        }

        return null;
    }


    /**
     * Renvoie la date la plus dans le futur des créneaux / ou des indisponibilités
     *
     * @param $creneaux array Créneaux dans lesquels rechercher
     * @param $indisponibilites array Indisponibilités à mettre en face
     *
     * @return mixed|string|null
     */
    private function getMaxDate($creneaux, $indisponibilites)
    {
        $maxDate = $this->startDay;

        //on récupère la date la plus haute des créneaux
        foreach ($creneaux as $creneau) {
            //echo "dateTest : ".json_encode($creneau)."\n";
            $dateTest = $creneau["date"];

            if (Carbon::parse($dateTest)->isAfter($maxDate)) {
                $maxDate = $dateTest;
            }
        }


        //ensuite on vérifie par rapport aux indisponibilites
        foreach ($indisponibilites as $indispo) {


            $dateDebut = explode(" ",$indispo["date_debut"])[0] ;
            $dateFin = explode(" ",$indispo["date_fin"])[0] ;

            // echo "indispo ".$dateDebut->toDateString()."-> ". $dateFin->toDateString()."etzt".Carbon::parse($maxDate)->isBetween($dateDebut->toDateString(), $dateFin ->toDateString())."\n";

            if(Carbon::parse($maxDate)->isBetween($dateDebut, $dateFin )) {
                //si elle est concernée par une indisponibilité
                //on regarde quelle date doit être considérée comme la date de reprise de l'activité
                //echo"entre";
                $maxDate = Carbon::parse($maxDate)->maximum($indispo["date_fin"])->toDateString();
            }
        }

        //echo "maxDate : ".$maxDate."\n";

        return $maxDate;
    }

    /**
     * Vérifie que le créneau est bien disponble et renvoie le créneau correct si jamais
     *
     * @param  $creneauToVerify mixed Créneau à vérifier
     * @param  $indisponibilites array Tableau des indisponibilités à comparer
     *
     * @return array
     */
    private function verifyIndispo($creneauToVerify, $indisponibilites)
    {
        //echo "creneauToVerify".json_encode($creneauToVerify)."\n";

        $dateTimeDebut = Carbon::createFromFormat("Y-m-d", $creneauToVerify["date"]);
        $dateTimeDebut->setTimeFromTimeString($creneauToVerify["heure_debut_matin"]);

        $dateTimeFin = Carbon::createFromFormat("Y-m-d", $creneauToVerify["date"]);
        $dateTimeFin->setTimeFromTimeString($creneauToVerify["heure_fin_am"]);


        foreach ($indisponibilites as $indisponibilite) {
            // echo "indispo :".json_encode($indisponibilite)."\n creneeau :".$dateTimeDebut->toDateTimeString()."->".$dateTimeFin->toDateTimeString()."\n";
            $dateDebutIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_debut"]);
            $dateFinIndispo = Carbon::createFromFormat("Y-m-d H:i:s", $indisponibilite["date_fin"]);


            //on regarde si l'indisponibilité concerne le creneau
            if ($dateTimeDebut->isBetween($dateDebutIndispo, $dateFinIndispo) || $dateTimeFin->isBetween($dateDebutIndispo, $dateFinIndispo)) {
                //echo "creneau : " . $dateTimeDebut->toDateTimeString() . "->" . $dateTimeFin->toDateTimeString(), ", indispo : " . $dateDebutIndispo->toDateTimeString() . "->" . $dateFinIndispo->toDateTimeString() . "\n";

                if ($dateTimeDebut->isBefore($dateDebutIndispo)) {
                    //si cela commence pendant le creneau
                    // echo "before";

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_matin"], $creneauToVerify["heure_fin_matin"])) {
                        //et que cela commence le matin
                        $creneauToVerify["heure_fin_matin"] = $dateDebutIndispo->toTimeString();
                    }

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_am"], $creneauToVerify["heure_fin_am"])) {
                        //et que cela commence l'après-midi
                        $creneauToVerify["heure_fin_am"] = $dateDebutIndispo->toTimeString();
                    }
                }

                if ($dateTimeDebut->isAfter($dateDebutIndispo) && $dateTimeFin->isBefore($dateFinIndispo)) {
                    //si c'est pendant l'indisponibilité
                    //on change le créneau pour qu'il soit le prochain jour ouvré dispo
                    //echo "between" . "\n";

                    // echo "this->jourouversldknjdf : " . json_encode($creneauToVerify) . "\n";

                    $creneauToVerify = $this->getNextCreneaux($this->getWeekday($this->getMaxDate($this->jourOuvresCreneaux, $indisponibilites)), 1, $indisponibilites, false);


                    //echo "jourouvre2" . json_encode($creneauToVerify) . "\n";
                }

                if ($dateTimeFin->isAfter($dateFinIndispo)) {
                    //si l'indisponibilité se finit avant la fin du creneau
                    //echo "after";

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_matin"], $creneauToVerify["heure_fin_matin"])) {
                        //et que ca se finit pendant le matin
                        $creneauToVerify["heure_debut_matin"] = $dateDebutIndispo->toTimeString();
                    }

                    if (Carbon::parse($dateDebutIndispo->toDateTimeString())->isBetween($creneauToVerify["heure_debut_am"], $creneauToVerify["heure_fin_am"])) {
                        //et que ca se finit pendant l'après-midi
                        $creneauToVerify["heure_debut_am"] = $dateDebutIndispo->toTimeString();
                    }
                }

            }
        }



        return $creneauToVerify;
    }

    /**
     * Retourne un tableau à une dimension (résout bien des problèmes croyez-moi)
     *
     * @param array $array Tableau à transformer
     *
     * @return array
     */
    private function makeOneDimension(array $array)
    {
        return array_map(function ($test) {
            //echo "isarray : ".array_key_exists("jour", $test)."\n obj :".json_encode($test)."\n";

            //si c'est bien un objet
            if (array_key_exists("id", $test) || array_key_exists("date", $test) || array_key_exists("date_debut", $test)) {
                return $test;
            } else {
                return $test[0];
            }
        }, $array);
    }


}
