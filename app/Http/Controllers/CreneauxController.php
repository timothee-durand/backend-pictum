<?php

namespace App\Http\Controllers;

use App\Creneaux;
use Illuminate\Http\Request;

class CreneauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Creneaux::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     * Send an Array
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "arrayCreneaux"=>"required",
        ]);

        $arrayCreneaux = $request->input("arrayCreneaux");

        //crée chaque créneaux et les ajoute dans la base de donnée
        foreach ($arrayCreneaux as $_creneau) {
            $creneau = new Creneaux([
                "jour"              =>$_creneau->jour,
                "heure_debut_matin" =>$_creneau->heure_debut_matin,
                "heure_fin_matin"   =>$_creneau->heure_fin_matin,
                "heure_debut_am"    =>$_creneau->heure_debut_am,
                "heure_fin_am"      =>$_creneau->heure_fin_am,
                "gestionnaire_id"   =>$_creneau->gestionnaire_id
            ]);

            $creneau->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creneaux  $creneaux
     * @return \Illuminate\Http\Response
     */
    public function show(Creneaux $creneaux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creneaux  $creneaux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creneaux $creneaux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creneaux  $creneaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creneaux $creneaux)
    {
        //
    }
}
