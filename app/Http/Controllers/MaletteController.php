<?php

namespace App\Http\Controllers;

use App\Malette;
use Illuminate\Http\Request;

class MaletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Malette[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|string
     */
    public function index()
    {
       return Malette::all()->toJSON(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $malette = new Malette([
            "nom" => $request->input("nom"),
            "ref" => $request->input("ref"),
            "photo" => $request->input("photo"),
        ]);

        if ($malette->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Malette  $malette
     * @return false|\Illuminate\Http\Response|string
     */
    public function show(Malette $malette)
    {
        $malette = Malette::find($malette->id);

        if ($malette != null) {
            return $malette->toJSON(JSON_PRETTY_PRINT);
        } else {
            //si pas d'entree correspondante
            return json_encode([
                "method" => "show",
                "status" => "!FIND"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Malette  $malette
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Malette $malette)
    {
        $malette = Malette::find($malette->id);

        if($malette != null) {

            if($request->input("nom")!=null) {
                $malette->nom = $request->input("nom");
            }

            if($request->input("ref")!=null) {
                $malette->ref = $request->input("ref");
            }

            if($request->input("photo")!=null) {
                $malette->photo = $request->input("photo");
            }


            //envoi modifs
            if ($malette->save()) {
                return json_encode([
                    "method" => "store",
                    "status" => "OK"
                ]);
            } else {
                return json_encode([
                    "method" => "store",
                    "status" => "FAILED"
                ]);
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Malette  $malette
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Malette $malette)
    {
        if (Malette::find($malette->id)->delete()) {
            return json_encode([
                "method" => "destroy",
                "status" => "OK"
            ]);

        }
    }
}
