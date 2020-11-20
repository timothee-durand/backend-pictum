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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Indisponibilite::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     * Send a json array of indisponibilites
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //on rcupère le tableau envoyé
        $arrayIndispo = $request->json()->all();

        foreach ($arrayIndispo as $indispo) {
            $nIndipo =new Indisponibilite([
                "date_debut"=>$indispo["date_debut"],
                "date_fin"=>$indispo["date_fin"],
                "gestionnaire_id"=>$indispo["gestionnaire_id"],
            ]);

            $nIndipo->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indisponibilite  $indisponibilite
     * @return \Illuminate\Http\Response
     */
    public function show(Indisponibilite $indisponibilite)
    {
        return new Response("Not Implemented", 501);
    }

    /**
     * Update the specified resource in storage.
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
