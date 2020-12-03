<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaterielResource;
use App\Materiel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function MongoDB\BSON\toJSON;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return MaterielResource::collection(Materiel::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Materiel $materiel)
    {
        if ($materiel->save()) {
            return json_encode([
                "method" => "store",
                "status" => "OK"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return MaterielResource
     */
    public function show(Materiel $materiel)
    {
        return new MaterielResource($materiel);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiel  $materiel
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Materiel $materiel)
    {
        //envoi modifs
        if ($materiel->update($request->all())) {
            return new Response("Update OK", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiel  $materiel
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Materiel $materiel)
    {
        if ($materiel->delete()) {
            return new Response("Delete OK", 200);

        }
    }





}
