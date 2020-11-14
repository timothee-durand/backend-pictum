<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Departement::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $departement = new Departement([
            "nom"=>$request->input("nom"),
            "lat"=>$request->input("lat"),
            "long"=>$request->input("long"),
        ]);

        if ($departement->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        $departement = Departement::find($departement->id);

        return $departement->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Departement $departement)
    {
        $departement = Departement::find($departement->id);

        //verif modif et mise à jour
        if($request->input("nom")!=null) {
            $departement->nom = $request->input("nom");
        }

        if($request->input("lat")!=null) {
            $departement->lat = $request->input("lat");
        }

        if($request->input("long")!=null) {
            $departement->long = $request->input("long");
        }


        //envoi modifs
        if ($departement->save()) {
            return json_encode([
                "method" => "update",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Departement $departement)
    {
        if (Departement::find($departement->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }
}
