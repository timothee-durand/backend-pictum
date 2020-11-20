<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return ReservationResource::collection(Reservation::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * formdata reservation
     * + json parsed array of est_prete
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
        return new ReservationResource($reservation);
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
        if($reservation->update($request->all())){
            return new Response("Update OK", 200);
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
