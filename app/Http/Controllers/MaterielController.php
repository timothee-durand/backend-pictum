<?php

namespace App\Http\Controllers;

use App\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $materiels = Materiel::all();

        foreach ($materiels as $materiel) {
            $materiel->departement;
            $materiel->malette;
            $materiel->est_prete;
        }
        return $materiels->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $materiel = new Materiel([
            "ref"           =>$request->input("ref"),
            "photo"         =>$request->input("photo"),
            "usage"         =>$request->input("usage"),
            "carac"         =>$request->input("carac"),
            "tutos"         =>$request->input("tutos"),
            "notice"         =>$request->input("notice"),
            "indisp"         =>$request->input("indisp"),
            "indisp_raison"  =>$request->input("indisp_raison"),
            "type_id"        =>$request->input("type_id"),
            "malette_id"     =>$request->input("malette_id"),
            "departement_id" =>$request->input("departement_id"),
        ]);

        if ($materiel->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $materiel)
    {
        $materiel = Materiel::find($materiel->id);

        //ajout des compléments
        $materiel->departement;
        $materiel->malette;
        $materiel->est_prete;

        return $materiel->toJson(JSON_PRETTY_PRINT);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiel  $materiel
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Materiel $materiel)
    {
        $materiel = Materiel::find($materiel->id);

        //verif modif et mise à jour
        if($request->input("ref")!=null) {
            $materiel->ref = $request->input("ref");
        }

        if($request->input("photo")!=null) {
            $materiel->photo = $request->input("photo");
        }

        if($request->input("usage")!=null) {
            $materiel->usage = $request->input("usage");
        }
        if($request->input("carac")!=null) {
            $materiel->carac = $request->input("carac");
        }
        if($request->input("notice")!=null) {
            $materiel->notice = $request->input("notice");
        }
        if($request->input("indisp")!=null) {
            $materiel->indisp = $request->input("indisp");
        }
        if($request->input("type_id")!=null) {
            $materiel->type_id = $request->input("type_id");
        }
        if($request->input("malette_id")!=null) {
            $materiel->malette_id = $request->input("malette_id");
        }
        if($request->input("departement_id")!=null) {
            $materiel->departement_id = $request->input("departement_id");
        }

        //envoi modifs
        if ($materiel->save()) {
            return json_encode([
                "method" => "update",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiel  $materiel
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Materiel $materiel)
    {
        if (Materiel::find($materiel->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }
}
