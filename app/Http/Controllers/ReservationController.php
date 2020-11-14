<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Reservation::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $reservation = new Reservation([
            "valide"=>$request->input("valide"),
            "prof"=>$request->input("prof"),
            "nom_emprunteur"=>$request->input("nom_emprunteur"),
            "prenom_emprunteur"=>$request->input("prenom_emprunteur"),
            "mail_emprunteur"=>$request->input("mail_emprunteur"),
            "id_univ_emprunteur"=>$request->input("id_univ_emprunteur"),
        ]);

        if ($reservation->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return Reservation::find($reservation->id)->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);

        //verif modif et mise à jour
        if($request->input("valide")!=null) {
            $reservation->valide = $request->input("valide");
        }

        if($request->input("prof")!=null) {
            $reservation->prof = $request->input("prof");
        }

        if($request->input("nom_emprunteur")!=null) {
            $reservation->nom_emprunteur = $request->input("nom_emprunteur");
        }
        if($request->input("prenom_emprunteur")!=null) {
            $reservation->prenom_emprunteur = $request->input("prenom_emprunteur");
        }
        if($request->input("mail_emprunteur")!=null) {
            $reservation->mail_emprunteur = $request->input("mail_emprunteur");
        }
        if($request->input("id_univ_emprunteur")!=null) {
            $reservation->id_univ_emprunteur = $request->input("id_univ_emprunteur");
        }


        //envoi modifs
        if ($reservation->save()) {
            return json_encode([
                "method" => "update",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Reservation $reservation)
    {
        if (Reservation::find($reservation->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }
}
