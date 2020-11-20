<?php

namespace App\Http\Controllers;

use App\EstPrete;
use App\Http\Resources\EstPreteResource;
use App\Materiel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EstPreteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return EstPreteResource::collection(EstPrete::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * param = {id_malettes:[id], id_materiels:[id], reservation_id:int, date_debut, date_fin}
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idMateriels = json_decode($request->input("id_materiels"));
        $idMalettes = json_decode($request->input("id_malettes"));

        if (is_array($idMateriels)) {
            //si la requete est du bon type et n'est pas vide
            foreach ($idMateriels as $idMateriel) {
                $this->storeEstPrete($idMateriel, $request->input("reservation_id"), $request->input("date_debut"), $request->input("date_fin"));
            }
        }

        if (is_array($idMalettes)) {
            //si la requete est du bon type et n'est pas vide
            foreach ($idMalettes as $idMalette) {
                //on récupère tout le matériel qui est dans la malette (qui a son id)
                $materiels_malette = Materiel::where("malette_id", $idMalette)->get();

                //pour chaque matériel de la malette on crée le est_prete
                foreach ($materiels_malette as $materiel) {
                    $this->storeEstPrete($materiel->id, $request->input("reservation_id"), $request->input("date_debut"), $request->input("date_fin"));

                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     */
    public function show(EstPrete $estPrete)
    {
        return new Response("Not Implemented", 501);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstPrete $estPrete)
    {
        return new Response("Not Implemented", 501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\EstPrete $estPrete
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstPrete $estPrete)
    {
        return new Response("Not Implemented", 501);
    }


    /**
     * Store an EstPrete instance with a Materiel id
     *
     * @param $idMateriel
     * @param $idReservation
     * @param $dateDebut
     * @param $dateFin
     */
    public function storeEstPrete($idMateriel, $idReservation, $dateDebut, $dateFin): void
    {
        $mat = Materiel::find($idMateriel);
        echo "gestionnaire_id" . $mat->gestionnaire;
        //on cree le est_prete
        $est_prete = new EstPrete([
            "gestionnaire_id" => $mat->gestionnaire,
            "materiel_id" => $mat->id,
            "reservation_id" => $idReservation,
            "date_debut" => $dateDebut,
            "date_fin" => $dateFin,
        ]);
        //on l'envoie vers la base de données
        $est_prete->save();
    }
}
