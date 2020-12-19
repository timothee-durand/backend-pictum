<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Materiel;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ReservationController extends Controller
{
    /**
     * Display a listing of the Reservations.
     * @group Reservation
     * @authenticated
     * @response   [ {
    "valide": 0,
    "prof": 0,
    "nom_emprunteur": null,
    "prenom_emprunteur": null,
    "mail_emprunteur": null,
    "id_univ_emprunteur": null,
    "raison_pro": "I had it written down: but I grow up, I'll write one--but I'm grown up now,' she added in an undertone to the waving of the trees upon her knee, and looking at the sudden change, but very politely: 'Did you say \"What a pity!\"?' the Rabbit angrily.",
    "est_pretes": [
    {
    "id": 8,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "date_debut": "2020-07-30 23:11:37",
    "date_fin": "2020-11-01 18:05:10",
    "rendu": "2020-11-01 18:05:10",
    "materiel_id": 17,
    "reservation_id": 2,
    "gestionnaire_id": 5,
    "materiel": {
    "id": 17,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_LIG_MAND_01",
    "nom": "Mercedes Littel III",
    "photo": "https://via.placeholder.com/200x200.png/007788?text=aperiam",
    "usage": "ONE respectable person!' Soon her eye fell upon a Gryphon, lying fast asleep in the night? Let me see: four times seven is--oh dear! I shall ever see you any more!' And here poor Alice began to say.",
    "carac": "Duchess asked, with another dig of her voice, and see that she was quite out of his pocket, and was coming back to the conclusion that it was good manners for her neck kept getting entangled among.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "I!' he replied. 'We quarrelled last March--just.",
    "type_id": 8,
    "malette_id": 9,
    "departement_id": 2
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
    }
    }
    ],
    "malettes": [
    {
    "id": 9,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "nom": "Claudie Flatley Sr.",
    "ref": "L1_MAL_PHOTO_01",
    "photo": "https://via.placeholder.com/200x200.png/009933?text=harum"
    }
    ]
    }]
     *
     * @return string
     */
    public function index()
    {
        return ReservationResource::collection(Reservation::all())->toJson();
    }

    /**
     * Store a newly created resource in storage
     *
     * @group Reservation
     * @authenticated
     * @bodyParam id_univ string required Id Universitaire
     * @bodyParam raison_pro string Si demande de matériel professionnel, raison produite par le demandeur
     * @bodyParam valide bool required Si raison pro, est true si la reservation est validée, true par défault
     *
     * @response {
     *      "Store OK"
     * }
     *
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request, Reservation $reservation)
    {
        $ldap = $this->getInfoLDAP($request->id_univ);

        //echo "mdp".json_encode(Hash::make($reservation->password));

        if($ldap != false) {
            //si on trouve qqc sur le serveur LDAP
            $new_reservation = new Reservation([
                "nom" => $ldap["nom"][0],
                "prenom" => $ldap["prenom"][0],
                "email" => $ldap["courriel"][0],
                "id_univ" => $request->id_univ,
                "prof" => $this->isProf($ldap["inGroup"]),
                "password"=> Hash::make($reservation->password),
                "raison_pro"=>$request->raison_pro,
                "valide"=>$request->valide
            ]);

            if ($new_reservation->save()) {
                $new_reservation->sendEmailVerificationNotification();
                return \response("Store OK");
            } else {
                return \response("Error on saving", 500);
            }

        } else {
            return \response("ID_UNIV NOT FIND", 401);
        }

    }

    private function isProf(array $groups)
    {
        foreach ($groups as $group) {
            if ($group === "enseignant") {
                return 1;
            }
        }
        return 0;
    }

    /**
     * Display the specified resource.
     * @group Reservation
     * @authenticated
     * @urlParam reservation int ID de la réservation concernée
     * @response {
    "data": {
    "valide": 1,
    "prof": 0,
    "nom_emprunteur": null,
    "prenom_emprunteur": null,
    "mail_emprunteur": null,
    "id_univ_emprunteur": null,
    "raison_pro": "Yet you finished the goose, with the Gryphon. Alice did not at all anxious to have got altered.' 'It is wrong from beginning to end,' said the Mock Turtle went on, '--likely to win, that it's hardly worth while finishing the game.' The Queen turned.",
    "est_pretes": [],
    "malettes": []
    }
    }
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified Reservation in storage.
     *
     * @group Reservation
     * @authenticated
     * @urlParam reservation int ID de la réservation concernée
     * @bodyParam nom string
     * @bodyParam prenom string
     * @bodyParam mail string
     * @bodyParam id_univ string  Id Universitaire
     * @bodyParam raison_pro string Si demande de matériel professionnel, raison produite par le demandeur
     * @bodyParam prof bool  True si la personne est un prof, false par défault
     * @bodyParam valide bool  Si raison pro, est true si la reservation est validée, true par défault
     *
     * @response {
     *      "Update OK"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->password = Hash::make($request->password);
        if($reservation->update($request->all())){
            return new Response("Update OK", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @group Reservation
     * @authenticated
     * @urlParam reservation int ID de la réservation concernée
     *
     * @param  \App\Reservation  $reservation
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Reservation $reservation)
    {
        if (Reservation::find($reservation->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }

    private function getInfoLDAP($id_univ)
    {
        include(app_path("/Http/Controllers/client_api/UtilsLDAP.php"));

        //recherche si l'username LDAP est bon
        return getInfoLDAP($id_univ);
    }
}
