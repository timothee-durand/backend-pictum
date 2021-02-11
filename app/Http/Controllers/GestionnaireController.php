<?php

namespace App\Http\Controllers;

use App\EstPrete;
use App\Gestionnaire;
use App\Http\Resources\GestionnaireResource;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Cmixin\BusinessTime;
use Hackzilla\PasswordGenerator\Generator\HybridPasswordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\OpeningHours\OpeningHours;

class GestionnaireController extends Controller
{
    //variables globales pour simplifier le nombre de paramètres des fonctions

    private $indexStartDay = 0;
    private $startDay = null;
    private $jourMax = 0;
    //semaine commence lundi donc a 1
    private $jourMin = 1;
    private $indexEndWeek = 5;
    private $jourOuvresCreneaux = [];
    private $creneaux = [];
    private $rdvs = [];
    private $dureeCreneau = null;
    private $indisponibilites = [];
    private $dayName = [
        '',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        '',

    ];

    /**
     * GestionnaireController constructor.
     * @param null $dureeCreneau
     */
    public function __construct()
    {
        $this->dureeCreneau = env("DUREE_RDV");
    }


    /**
     * Display a listing of the resource.
     * @group Gestionnaire
     * @response [
     * {
     * "nom": "Terrance",
     * "prenom": "Rohan",
     * "mail": "kemmer.osvaldo@gmail.com",
     * "id_univ": "waino62",
     * "admin": 0,
     * "departement": null,
     * "rdv": [
     * {
     * "id": 7,
     * "created_at": "2020-12-03T17:31:13.000000Z",
     * "updated_at": "2020-12-03T17:31:13.000000Z",
     * "date_debut": "2020-08-22 21:41:09",
     * "date_fin": "2020-03-01 13:58:20",
     * "rendu": "2020-03-01 13:58:20",
     * "materiel_id": 5,
     * "reservation_id": 20,
     * "gestionnaire_id": 1
     * },
     * {
     * "id": 16,
     * "created_at": "2020-12-03T17:31:13.000000Z",
     * "updated_at": "2020-12-03T17:31:13.000000Z",
     * "date_debut": "2020-05-19 22:39:51",
     * "date_fin": "2020-11-10 00:33:21",
     * "rendu": "2021-01-15 21:20:41",
     * "materiel_id": 28,
     * "reservation_id": 70,
     * "gestionnaire_id": 1
     * },
     *
     * {
     * "id": 92,
     * "created_at": "2020-12-03T17:31:14.000000Z",
     * "updated_at": "2020-12-03T17:31:14.000000Z",
     * "date_debut": "2020-08-27 10:40:07",
     * "date_fin": "2020-11-13 12:50:28",
     * "rendu": "2021-01-23 03:45:21",
     * "materiel_id": 6,
     * "reservation_id": 73,
     * "gestionnaire_id": 1
     * }
     * ],
     * "creneaux": [
     * {
     * "id": 5,
     * "created_at": "2020-12-03T17:31:14.000000Z",
     * "updated_at": "2020-12-03T17:31:14.000000Z",
     * "jour": 3,
     * "heure_debut_matin": "06:51:04",
     * "heure_fin_matin": "11:13:07",
     * "heure_debut_am": "13:09:21",
     * "heure_fin_am": "17:05:33",
     * "gestionnaire_id": 1
     * },
     * {
     * "id": 16,
     * "created_at": "2020-12-03T17:31:14.000000Z",
     * "updated_at": "2020-12-03T17:31:14.000000Z",
     * "jour": 5,
     * "heure_debut_matin": "08:42:31",
     * "heure_fin_matin": "11:14:53",
     * "heure_debut_am": "13:44:13",
     * "heure_fin_am": "16:08:51",
     * "gestionnaire_id": 1
     * },
     * {
     * "id": 30,
     * "created_at": "2020-12-03T17:31:14.000000Z",
     * "updated_at": "2020-12-03T17:31:14.000000Z",
     * "jour": 5,
     * "heure_debut_matin": "07:12:41",
     * "heure_fin_matin": "11:12:16",
     * "heure_debut_am": "13:26:06",
     * "heure_fin_am": "16:18:56",
     * "gestionnaire_id": 1
     * },
     * {
     * "id": 32,
     * "created_at": "2020-12-03T17:31:14.000000Z",
     * "updated_at": "2020-12-03T17:31:14.000000Z",
     * "jour": 3,
     * "heure_debut_matin": "08:49:42",
     * "heure_fin_matin": "11:45:22",
     * "heure_debut_am": "13:48:19",
     * "heure_fin_am": "17:54:38",
     * "gestionnaire_id": 1
     * }
     * ],
     * "indisponibilites": []
     * }]
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
        $request->validate([
            "start_day" => 'required|date'
        ]);
        $gestionnaires = new GestionnaireResource(Gestionnaire::find($id));

        $this->creneaux = $gestionnaires->creneaux->toArray();
        $this->indisponibilites = $gestionnaires->indisponibilites;
        $this->rdvs = EstPrete::where("gestionnaire_id", $id)->get()->toArray();

       // echo "inds:" . json_encode($this->indisponibilites) . "\n";

        $this->startDay = $request->input("start_day");
        $this->indexStartDay = Carbon::parse($this->startDay)->weekday();

        //initialise les créneaux et les indisponibilités dans la librairie
        $this->initialiseBusinessTime();

        $days = [];
        $day = Carbon::parse($this->startDay)->currentOrNextOpen();

        for ($i = 0; $i < 3; $i++) {
            $day->setTimeFromTimeString("10:00");
            $dayAr = [
                "date_jour" => $day->toDateString(),
                "duree" => $this->dureeCreneau,
                "rdvMatin" => $this->getRendezVousFromPeriod($day->currentOrPreviousOpen()->toTimeString(), $day->currentOrNextClose()->toTimeString(), $day->toDateString()),
            ];

            $day->setTimeFromTimeString("15:00");

            $dayAr["rdvAm"] = $this->getRendezVousFromPeriod($day->currentOrPreviousOpen()->toTimeString(), $day->currentOrNextClose()->toTimeString(), $day->toDateString());

            $days[] = $dayAr;
            //echo json_encode($day) . "\n";
            $day->setTimeFromTimeString("23:00");
            $day = $day->nextOpen();
            //echo json_encode($day) . "\n";
        }

        return $days;
    }


    /**
     * Store a newly Gestionnaire resource in storage.
     * @group Gestionnaire
     * @bodyParam id_univ required
     * @bodyParam admin bool required
     * @bodyParam password required
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {


        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        $ldap = getInfoLDAP($request->id_univ);

        if ($ldap != false) {
            //récuprération d'un mot de passe fort
            $generator = new HybridPasswordGenerator();

            $generator
                ->setLowercase()
                ->setNumbers()
                ->setSymbols(false)
                ->setSegmentLength(3)
                ->setSegmentCount(4)
                ->setSegmentSeparator('-');

            $password = $generator->generatePassword();


            $gestionnaire = new Gestionnaire([
                "nom" => $ldap["nom"][0],
                "prenom" => ucfirst($ldap["prenom"][0]),
                "email" => $ldap["courriel"][0],
                "id_univ" => $ldap["uid"],
                "admin" => $request->input("admin"),
                "password" => Hash::make($password),
            ]);


            if ($gestionnaire->save()) {
                $gestionnaire->sendEmailVerificationNotification();
                $gestionnaire->informGest($password);

                return response("Store OK");
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

        if ($request->input("email") != null) {
            $gestionnaire->email = $request->input("email");
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
        if ($gestionnaire->delete()) {
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
            if (Carbon::parse($rdvTest["date_debut"])->isSameDay($date) || Carbon::parse($rdvTest["date_fin"])->isSameDay($date)) {
                return true;
            } else {
                return false;
            }
        });


        $array_reponse = array();
        $time = $start_time;
        while ($time <= $end_time) {
            $rdv = date('H:i', $time);

            if ($this->verifyRDV($rdv, $date, $rdvDay)) {
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

    public function verifyRDV($rdv, $date, $rdvDay)
    {


        $dateTimeDebut = Carbon::create($date);
        $dateTimeDebut->setTimeFromTimeString($rdv);

        $dateTimeFin = $dateTimeDebut->copy()->addMinutes((int)$this->dureeCreneau - 1);

        //pour chaque rdvs on regarde si la datetime de début est dans l'interval du rdv présent
        foreach ($rdvDay as $test) {

            $dateTestDebut = Carbon::parse($test["date_debut"]);
            $dateTestFin = Carbon::parse($test["date_fin"]);

//            echo "test ".$dateTestDebut->toDateTimeString()." -> ".$dateTestFin->toDateTimeString()."\n";
//            echo "rdv ".$dateTimeDebut->toDateTimeString()." -> ". $dateTimeFin->toDateTimeString()."\n";

            if (($dateTestDebut >= $dateTimeDebut && $dateTestDebut < $dateTimeFin) || ($dateTestFin >= $dateTimeDebut && $dateTestFin < $dateTimeFin)) {
                //echo "rdv saute : ".$dateTimeDebut->toDateTimeString()." -> ". $dateTimeFin->toDateTimeString()."\n";
                return false;
            }

        }

        return true;

    }





    private function initialiseBusinessTime()
    {
        BusinessTime::enable('Illuminate\Support\Carbon');
        $options = [
            'monday' => ['09:00-12:00', '13:00-18:00'],
            'tuesday' => ['09:00-12:00', '13:00-18:00'],
            'wednesday' => ['09:00-12:00'],
            'thursday' => ['09:00-12:00', '13:00-18:00'],
            'friday' => ['09:00-12:00', '13:00-20:00'],
            'saturday' => [],
            'sunday' => [],
            'exceptions' => [

            ],
        ];
        //echo json_encode($options);
        //on ajoute les créneaux
        foreach ($this->creneaux as $creneau) {
            $day = $this->getDayName($creneau["jour"]);
            //echo json_encode($creneau);
            //echo json_encode($day);
            $horaires = [
                $this->getTimePeriodString($creneau["heure_debut_matin"], $creneau["heure_fin_matin"]),
                $this->getTimePeriodString($creneau["heure_debut_am"], $creneau["heure_fin_am"]),
            ];
            $options[$day] = $horaires;
        }

//        echo json_encode($options);

        $indispos = [];
        //on ajoute les indisponibilités
        foreach ($this->indisponibilites as $indispo) {
            //je traite le premier jour
            //echo json_encode($indispo);
            $indispos = array_merge($indispos, $this->getExceptionFromDateTime($indispo["date_debut"], $indispo["date_fin"]));
        }

        $options["exceptions"] = array_merge($options["exceptions"], $indispos);

        //echo json_encode($options);
        $openinghour = OpeningHours::create($options);

        Carbon::setOpeningHours($options);

    }

    private function getTimePeriodString($heure_debut, $heure_fin)
    {
        $debut = $this->getTimeWithoutSeconds($heure_debut);
        $fin = $this->getTimeWithoutSeconds($heure_fin);
        return $debut . "-" . $fin;
    }

    private function getTimeWithoutSeconds($time)
    {
        $response = Carbon::make($time)->format("H:m");
        return str_replace(' ', '', $response);
    }

    private function getDayName($index)
    {
        return $this->dayName[$index];
    }

    private function getExceptionFromDateTime($date_debut, $date_fin)
    {
        $_date_debut = new Carbon($date_debut);
        $_date_fin = new Carbon($date_fin);
        $period = CarbonPeriod::create($_date_debut, '1 days', $_date_fin);
        $response = [];
        foreach ($period as $day) {
            $response[$day->format("Y-m-d")] = [];
        }
        return $response;

    }


}
