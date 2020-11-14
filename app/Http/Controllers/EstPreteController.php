<?php

namespace App\Http\Controllers;

use App\EstPrete;
use Illuminate\Http\Request;

class EstPreteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        //récupération de toutes les lignes
        $estprestes = EstPrete::all();

        //requetes annexes pour completer la réponse
        foreach ($estprestes as $pret) {
            $pret->materiel;
            $pret->reservation;
        }

        return $estprestes->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstPrete  $estPrete
     * @return \Illuminate\Http\Response
     */
    public function show(EstPrete $estPrete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstPrete  $estPrete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstPrete $estPrete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstPrete  $estPrete
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstPrete $estPrete)
    {
        //
    }
}
