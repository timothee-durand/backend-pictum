<?php

namespace App\Http\Controllers;

use App\Indisponibilite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Foreach_;

class IndisponibiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @group Indisponibilites
     *
     * @response [
    {
    "id": 1,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-11-10 17:29:14",
    "date_fin": "2020-11-24 01:01:31",
    "gestionnaire_id": 5
    },
    {
    "id": 2,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-06-07 16:14:48",
    "date_fin": "2020-08-20 02:26:19",
    "gestionnaire_id": 9
    }]
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Indisponibilite::all()->toJson();
    }

    /**
     * Store some new Indisponibilite
     *
     * @group Indisponibilites
     * @bodyParam date_debut DateTime required Date de début de l'indisponibilite
     * @bodyParam date_fin DateTime required Date de fin de l'indisponibilite
     * @bodyParam gestionnaire_id int required Id Pictum du gestionnaire concerné
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_debut'=>"required|date",
            'date_fin'=>'required|date',
            "gestionnaire_id"=>'exists:gestionnaire,id'
        ]);

       if(Indisponibilite::create($request->all())){
           return \response("Indisponibilité ajoutée");
       } else {
           return \response("Problème enregistrement", 500);
       }


    }

    /**
     * Display the specified Indisponibilite.
     * @group Indisponibilites
     *
     *
     * @param  \App\Indisponibilite  $indisponibilite
     * @return \Illuminate\Http\Response
     */
    public function show(Indisponibilite $indisponibilite)
    {
        return new Response("Not Implemented", 501);
    }

    /**
     * Update the specified indisponibilite in storage.
     * @group Indisponibilites
     *
     * @queryParam date_debut DateTime  Date de début de l'indisponibilite
     * @queryParam date_fin DateTime  Date de fin de l'indisponibilite
     * @queryParam id_gestionnaire int  Id Pictum du gestionnaire concerné
     *
     * @urlParam indisponibilite ID de l'indisponibilité concernée
     * @response {
     *  "Update OK"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indisponibilite  $indisponibilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indisponibilite $indisponibilite)
    {
        if($indisponibilite->update($request->all())){
            return new Response("Update OK", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @group Indisponibilites
     * @urlParam indisponibilite ID de l'indisponibilité concernée
     * @response {
     *  "Delete OK"
     * }
     *
     * @param  \App\Indisponibilite  $indisponibilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indisponibilite $indisponibilite)
    {
        if($indisponibilite->delete()){
            return new Response("Destroy OK", 200);
        }
    }
}
