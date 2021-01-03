<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Http\Resources\DepartementResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartementController extends Controller
{
    /**
     *
     * Display a listing of the departements
     * @group Departement
     * @response [
     * {
     * "lat": -88.3,
     * "long": 5.09,
     * "nom": "Port Conorside",
     * "gestionnaire": {
     * "id": 5,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Harrison",
     * "prenom": "Hessel",
     * "mail": "dovie58@christiansen.com",
     * "id_univ": "zzulauf",
     * "admin": 0
     * }
     * },
     * {
     * "lat": 70.05,
     * "long": -142.14,
     * "nom": "North Rachaelburgh",
     * "gestionnaire": {
     * "id": 3,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Lyric",
     * "prenom": "Schmidt",
     * "mail": "veronica.runte@hotmail.com",
     * "id_univ": "edgar.schumm",
     * "admin": 0
     * }
     * }]
     *
     * @return string
     */
    public function index()
    {
        return DepartementResource::collection(Departement::all())->toJson();
    }

    /**
     * Store a newly created departement in storage.
     * @group Departement
     * @queryParam lat float required Latitude du département
     * @queryParam long float required Longitude du département
     * @queryParam nom string required Nom du département
     * @queryParam gestionnaire_id int required ID Pictum du gestionnaire concerné
     *
     * @response {
     *  "Create OK"
     * }
     * @authenticated
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required|string|min:1",
            "lat" => "required|numeric",
            "long" => "required|numeric",
            "gestionnaire_id" => "required|exists:gestionnaire,id"
        ]);
        if (Departement::create($request->all())) {
            return new Response("Create OK", 200);
        }
    }

    /**
     * Display the specified resource.
     * @group Departement
     * @urlParam departement int ID du département concerné
     * @response {
     * "data": {
     * "lat": 70.05,
     * "long": -142.14,
     * "nom": "North Rachaelburgh",
     * "gestionnaire": {
     * "id": 3,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Lyric",
     * "prenom": "Schmidt",
     * "mail": "veronica.runte@hotmail.com",
     * "id_univ": "edgar.schumm",
     * "admin": 0
     * }
     * }
     * }
     *
     * @param \App\Departement $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        return new DepartementResource($departement);
    }

    /**
     * Update the specified resource in storage.
     * @group Departement
     *
     * @bodyParam  lat float Latitude du département
     * @bodyParam long float Longitude du département
     * @bodyParam nom string Nom du département
     * @bodyParam gestionnaire_id int ID Pictum du gestionnaire concerné
     * @urlParam departement int ID du département concerné
     *
     * @response {
     *  "Update OK"
     * }
     * @authenticated
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Departement $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            "nom" => "string|min:1",
            "lat" => "numeric",
            "long" => "numeric",
            "gestionnaire_id" => "exists:gestionnaire,id"
        ]);

        //echo json_encode($request->all());
        if ($departement->update($request->only([
            "lat", "long", "nom", "gestionnaire_id"
        ]))) {
            return new Response("Update OK", 200);
        } else {
            return new Response("Update Failed", 404);
        }


    }

    /**
     * Remove the specified resource from storage.
     * @group Departement
     * @urlParam departement int ID du département concerné
     *
     * @response {
     *  "Destroy OK"
     * }
     *
     * @param \App\Departement $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Departement $departement)
    {
        if ($departement->delete()) {
            return new Response("Destroy OK", 200);
        } else {
            return \response("Failed", 500);
        }
    }
}
