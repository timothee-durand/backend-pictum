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
     * @group Creneaux
     *
     * @response [
    {
    "id": 1,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 1,
    "heure_debut_matin": "07:20:32",
    "heure_fin_matin": "11:49:03",
    "heure_debut_am": "13:34:21",
    "heure_fin_am": "17:53:21",
    "gestionnaire_id": 7
    },
    {
    "id": 2,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "jour": 1,
    "heure_debut_matin": "07:00:32",
    "heure_fin_matin": "11:41:31",
    "heure_debut_am": "13:48:33",
    "heure_fin_am": "16:57:37",
    "gestionnaire_id": 9
    }
     * ]
     *
     *
     * @return string
     */
    public function index()
    {
        return Creneaux::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     *
     *
     *
     * Store Gestionnaire's Creneaux
     * Send only creneaux who are used
     *
     * @bodyParam creneaux[] required Array of the creneaux of a gestionnaire
     * @bodyParam creneaux[].jour int required Index du jour correspondant (0 => Dimanche)
     * @bodyParam creneaux[].heure_debut_matin Time required Heure de début de la période du matin
     * @bodyParam creneaux[].heure_fin_matin Time required Heure de fin de la période du matin
     * @bodyParam creneaux[].heure_debut_am Time required Heure de début de la période de l'après-midi
     * @bodyParam creneaux[].heure_fin_am Time required Heure de fin de la période de l'après-midi
     * @bodyParam creneaux[].gestionnaire_id int required ID du gestionnaire correspondant
     * @group Creneaux
     * @authenticated
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayCreneaux = json_decode($request->creneaux);

        //crée chaque créneaux et les ajoute dans la base de donnée
            //mise a jour de chaque element du tableau
            foreach ($arrayCreneaux as $_creneau) {
                //conversion en objet
                $_creneau = (object)$_creneau;

                $creneauToUpdate = new Creneaux();
                //recupération de l'élément d'origine
                if(property_exists($_creneau, "id")) {
                    $creneauToUpdate = Creneaux::find($_creneau->id);

                    //si il ne troue rien on crée puis on enregistre
                    if ($creneauToUpdate === null) {
                        $creneauToUpdate = new Creneaux([
                            "jour" => $_creneau->jour,
                            "heure_debut_matin" => $_creneau->heure_debut_matin,
                            "heure_fin_matin" => $_creneau->heure_fin_matin,
                            "heure_debut_am" => $_creneau->heure_debut_am,
                            "heure_fin_am" => $_creneau->heure_fin_am,
                            "gestionnaire_id" => $_creneau->gestionnaire_id
                        ]);
                        $creneauToUpdate->save();
                    } else {
                        //sinon on met a jour
                        $creneauToUpdate->update((array)$_creneau);
                    }

                } else {
                    //si c'est une création (pas d'id)...
                    $creneauToUpdate = new Creneaux([
                        "jour" => $_creneau->jour,
                        "heure_debut_matin" => $_creneau->heure_debut_matin,
                        "heure_fin_matin" => $_creneau->heure_fin_matin,
                        "heure_debut_am" => $_creneau->heure_debut_am,
                        "heure_fin_am" => $_creneau->heure_fin_am,
                        "gestionnaire_id" => $_creneau->gestionnaire_id
                    ]);
                    $creneauToUpdate->save();
                }
            }

    }

    /**
     * Display the specified resource.
     * @group Creneaux
     * @bodyParam creneaux[] required Array of the creneaux of a gestionnaire
     * @bodyParam creneaux[].jour int  Index du jour correspondant (0 => Dimanche)
     * @bodyParam creneaux[].heure_debut_matin Time  Heure de début de la période du matin
     * @bodyParam creneaux[].heure_fin_matin Time  Heure de fin de la période du matin
     * @bodyParam creneaux[].heure_debut_am Time  Heure de début de la période de l'après-midi
     * @bodyParam creneaux[].heure_fin_am Time  Heure de fin de la période de l'après-midi
     * @bodyParam creneaux[].gestionnaire_id int  ID du gestionnaire correspondant
     * @group Creneaux
     * @authenticated
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
     * @group Creneaux
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arrayCreneaux = json_decode($request->creneaux);

        echo json_encode($arrayCreneaux);
        //mise a jour de chaque element du tableau
        foreach ($arrayCreneaux as $_creneau) {
            //conversion en objet
            $_creneau = (object)$_creneau;
            //recupération de l'élément d'origine
            $creneauToUpdate = Creneaux::find($_creneau->id);

            if($creneauToUpdate === null) {
                $creneauToUpdate = new Creneaux([
                    "jour" => $_creneau->jour,
                    "heure_debut_matin" => $_creneau->heure_debut_matin,
                    "heure_fin_matin" => $_creneau->heure_fin_matin,
                    "heure_debut_am" => $_creneau->heure_debut_am,
                    "heure_fin_am" => $_creneau->heure_fin_am,
                    "gestionnaire_id" => $_creneau->gestionnaire_id
                ]);
            }

//
//            //verif modif et mise à jour
//            if ($_creneau->jour != null) {
//                $creneauToUpdate->jour = $_creneau->jour;
//            }
//
//            if ($_creneau->heure_debut_matin != null) {
//                $creneauToUpdate->heure_debut_matin = $_creneau->heure_debut_matin;
//            }
//
//            if ($_creneau->heure_fin_matin != null) {
//                $creneauToUpdate->heure_fin_matin = $_creneau->heure_fin_matin;
//            }
//            if ($_creneau->heure_debut_am != null) {
//                $creneauToUpdate->heure_debut_am = $_creneau->heure_debut_am;
//            }
//            if ($_creneau->heure_fin_am != null) {
//                $creneauToUpdate->heure_fin_am = $_creneau->heure_fin_am;
//            }
//            if ($_creneau->gestionnaire_id != null) {
//                $creneauToUpdate->gestionnaire_id = $_creneau->gestionnaire_id;
//            }
            //envoi dans la base de donnée
            $creneauToUpdate->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @group Creneaux
     * @hideFromAPIDocumentation
     *
     * @param \App\Creneaux $creneaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creneaux $creneaux)
    {
        return new Response("Non implementé", 501);
    }
}
