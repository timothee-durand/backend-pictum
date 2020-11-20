<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaletteResource;
use App\Malette;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Malette[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|string
     */
    public function index()
    {
       return MaletteResource::collection(Malette::all())->toJSON();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        if(Malette::create($request->all())){
            return new Response("Create OK", 200);
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
        if($malette->update($request->all())){
            return new Response("Update OK", 200);
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
        if ($malette->delete()) {
            return new Response("Delete OK", 200);

        }
    }
}
