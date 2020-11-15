<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Http\Resources\GestionnaireCollection;
use App\Http\Resources\GestionnaireResource;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            "nom"               => $request->input("nom"),
            "prenom"            => $request->input("prenom"),
            "mail"              => $request->input("mail"),
            "id_univ"           => $request->input("id_univ"),
            "admin"             => $request->input("admin"),
            "departement_id"    => $request->input("departement_id")
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
     * @param  \App\Gestionnaire  $gestionnaire
     * @return GestionnaireResource
     */
    public function show(Gestionnaire $gestionnaire)
    {
        return new GestionnaireResource($gestionnaire);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gestionnaire  $gestionnaire
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Gestionnaire $gestionnaire)
    {
        $gestionnaire = Gestionnaire::find($gestionnaire->id);

        //verif modif et mise à jour
        if($request->input("nom")!=null) {
            $gestionnaire->nom = $request->input("nom");
        }

        if($request->input("prenom")!=null) {
            $gestionnaire->prenom = $request->input("prenom");
        }

        if($request->input("mail")!=null) {
            $gestionnaire->mail = $request->input("mail");
        }
        if($request->input("id_univ")!=null) {
            $gestionnaire->id_univ = $request->input("id_univ");
        }
        if($request->input("admin")!=null) {
            $gestionnaire->admin = $request->input("admin");
        }
        if($request->input("departement_id")!=null) {
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
     * @param  \App\Gestionnaire  $gestionnaire
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
