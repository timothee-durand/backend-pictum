<?php

namespace App\Http\Controllers;

use App\EstPrete;
use App\Http\Resources\EstPreteResource;
use App\Materiel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EstPreteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @group EstPrete
     *
     * @response [
    {
    "materiel": {
    "id": 20,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_PER_RHO_01",
    "nom": "Mr. Clinton Shields Sr.",
    "photo": "https://via.placeholder.com/200x200.png/00aa00?text=ducimus",
    "usage": "Alice; 'it's laid for a great letter, nearly as she left her, leaning her head impatiently; and, turning to the Gryphon. Alice did not quite know what \"it\" means.' 'I know what they're about!' 'Read.",
    "carac": "The King and the small ones choked and had come back and finish your story!' Alice called out in a hurry. 'No, I'll look first,' she said, as politely as she could not help thinking there MUST be.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "Edwin and Morcar, the earls of Mercia and.",
    "type_id": 10,
    "malette_id": 9,
    "departement_id": 6
    },
    "reservation": {
    "id": 79,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "valide": 0,
    "prof": 1,
    "nom": "Raul",
    "prenom": "Kertzmann",
    "mail": "kyleigh.konopelski@rippin.com",
    "raison_pro": "Duchess; 'and that's a fact.' Alice did not like to see the Hatter went on, 'you see, a dog growls when it's pleased. Now I growl when I'm pleased, and wag my tail when it's pleased. Now I growl when I'm angry. Therefore I'm mad.' 'I call it.",
    "id_univ": "ogreen"
    },
    "gestionnaire": {
    "id": 5,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Harrison",
    "prenom": "Hessel",
    "mail": "dovie58@christiansen.com",
    "id_univ": "zzulauf",
    "admin": 0
    },
    "date_debut": "2020-06-02 12:01:02",
    "date_fin": "2020-01-07 07:28:37",
    "rendu": "2021-01-09 09:23:31"
    },
    {
    "materiel": {
    "id": 16,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_PER_RHO_01",
    "nom": "Myrna Klein",
    "photo": "https://via.placeholder.com/200x200.png/00bbbb?text=odio",
    "usage": "Dormouse; 'VERY ill.' Alice tried to fancy to cats if you wouldn't have come here.' Alice didn't think that will be When they take us up and walking away. 'You insult me by talking such nonsense!'.",
    "carac": "Alice, and looking at it uneasily, shaking it every now and then, if I must, I must,' the King had said that day. 'No, no!' said the Caterpillar. 'Not QUITE right, I'm afraid,' said Alice, who felt.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "Cat, 'or you wouldn't keep appearing and.",
    "type_id": 7,
    "malette_id": 8,
    "departement_id": 4
    },
    "reservation": {
    "id": 12,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "valide": 1,
    "prof": 0,
    "nom": "Dallin",
    "prenom": "Becker",
    "mail": "alta15@hotmail.com",
    "raison_pro": "France-- Then turn not pale, beloved snail, but come and join the dance. '\"What matters it how far we go?\" his scaly friend replied. \"There is another shore, you know, upon the other bit. Her chin was pressed so closely against her foot, that there.",
    "id_univ": "lea34"
    },
    "gestionnaire": {
    "id": 6,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "nom": "Furman",
    "prenom": "Moen",
    "mail": "kuphal.van@gmail.com",
    "id_univ": "gwatsica",
    "admin": 0
    },
    "date_debut": "2020-06-02 00:39:23",
    "date_fin": "2020-02-15 04:05:21",
    "rendu": "2020-02-15 04:05:21"
    }]
     *
     * @return string
     */
    public function index()
    {
        return EstPreteResource::collection(EstPrete::all())->toJson();
    }

    /**
     * Store some new EstPrete in storage.
     *
     * @group EstPrete
     * @authenticated
     * @queryParam id_malettes[] int required Tableau d'ID pictum des malettes concernées par la réservation - Peut être vide
     * @queryParam id_materiels[] int Tableau d'ID pictum des matériels individuels concernées par la réservation - Peut être vide
     * @queryParam reservation_id int required ID Pictum de la réservation correspondante
     * @queryParam date_debut DateTime required Rendez-vous de prise de matériel
     * @queryParam date_fin DateTime required Rendez-vous de retour de matériel
     * @authenticated
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idMateriels = json_decode($request->input("id_materiels"));
        $idMalettes = json_decode($request->input("id_malettes"));

        if (is_array($idMateriels)) {
            //si la requete est du bon type et n'est pas vide
            foreach ($idMateriels as $idMateriel) {
                $this->storeEstPrete($idMateriel, $request->input("reservation_id"), $request->input("date_debut"), $request->input("date_fin"));
            }
        }

        if (is_array($idMalettes)) {
            //si la requete est du bon type et n'est pas vide
            foreach ($idMalettes as $idMalette) {
                //on récupère tout le matériel qui est dans la malette (qui a son id)
                $materiels_malette = Materiel::where("malette_id", $idMalette)->get();

                //pour chaque matériel de la malette on crée le est_prete
                foreach ($materiels_malette as $materiel) {
                    $this->storeEstPrete($materiel->id, $request->input("reservation_id"), $request->input("date_debut"), $request->input("date_fin"));

                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     */
    public function show(EstPrete $estPrete)
    {
        return new Response("Not Implemented", 501);
    }

    /**
     * Set the group of EstPrete as rendu
     * Required to be gestionnaire
     * @group EstPrete
     * @queryParam id_estprete[] int ID des est-prete à marquer comme rendu
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arrayID = json_decode($request->input("id_estprete"));

        foreach ($arrayID as $id) {
            $estPrete = EstPrete::find($id);
            $estPrete->rendu = Carbon::now();
            $estPrete->save();
        }

    }

    /**
     * Delete EstPrete
     *Required to be gestionnaire
     * @group EstPrete
     * @urlParam estPrete int ID du prêt concerné
     * @response {
     *  "Delete OK"
     * }
     *
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(EstPrete $estPrete)
    {
        if($estPrete->delete()){
            return \response("Delete OK");
        }
    }


    /**
     * Store an EstPrete instance with a Materiel id
     *
     * @param $idMateriel
     * @param $idReservation
     * @param $dateDebut
     * @param $dateFin
     */
    public function storeEstPrete($idMateriel, $idReservation, $dateDebut, $dateFin): void
    {
        $mat = Materiel::find($idMateriel);
        echo "gestionnaire_id" . $mat->gestionnaire;
        //on cree le est_prete
        $est_prete = new EstPrete([
            "gestionnaire_id" => $mat->gestionnaire,
            "materiel_id" => $mat->id,
            "reservation_id" => $idReservation,
            "date_debut" => $dateDebut,
            "date_fin" => $dateFin,
        ]);
        //on l'envoie vers la base de données
        $est_prete->save();
    }
}
