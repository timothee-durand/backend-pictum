<?php

namespace App\Http\Controllers;

use App\Creneaux;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Send only creneaux who are used
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayCreneaux = $request->json()->all();


        //crée chaque créneaux et les ajoute dans la base de donnée
        foreach ($arrayCreneaux as $_creneau) {
            $creneau = new Creneaux([
                "jour" => $_creneau["jour"],
                "heure_debut_matin" => $_creneau["heure_debut_matin"],
                "heure_fin_matin" => $_creneau['heure_fin_matin'],
                "heure_debut_am" => $_creneau["heure_debut_am"],
                "heure_fin_am" => $_creneau["heure_fin_am"],
                "gestionnaire_id" => $_creneau["gestionnaire_id"]
            ]);

            $creneau->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Creneaux $creneaux
     * @return \Illuminate\Http\Response
     */
    public function show(Creneaux $creneaux)
    {
        return new Response("Non implementé", 501);
    }

    /**
     * Update the specifieds resources in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arrayCreneaux = $request->json()->all();

        //mise a jour de chaque element du tableau
        foreach ($arrayCreneaux as $_creneau) {
            //conversion en objet
            $_creneau = (object)$_creneau;
            //recupération de l'élément d'origine
            $creneauToUpdate = Creneaux::find($_creneau->id);

            //verif modif et mise à jour
            if ($_creneau->jour != null) {
                $creneauToUpdate->jour = $_creneau->jour;
            }

            if ($_creneau->heure_debut_matin != null) {
                $creneauToUpdate->heure_debut_matin = $_creneau->heure_debut_matin;
            }

            if ($_creneau->heure_fin_matin != null) {
                $creneauToUpdate->heure_fin_matin = $_creneau->heure_fin_matin;
            }
            if ($_creneau->heure_debut_am != null) {
                $creneauToUpdate->heure_debut_am = $_creneau->heure_debut_am;
            }
            if ($_creneau->heure_fin_am != null) {
                $creneauToUpdate->heure_fin_am = $_creneau->heure_fin_am;
            }
            if ($_creneau->gestionnaire_id != null) {
                $creneauToUpdate->gestionnaire_id = $_creneau->gestionnaire_id;
            }
            //envoi dans la base de donnée
            $creneauToUpdate->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Creneaux $creneaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creneaux $creneaux)
    {
        return new Response("Non implementé", 501);
    }
}
