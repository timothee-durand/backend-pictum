<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Http\Resources\DepartementResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return DepartementResource::collection(Departement::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
       if( Departement::create($request->all())) {
           return new Response("Create OK", 200);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        return new DepartementResource($departement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Departement $departement)
    {
       if($departement->update($request->all())) {
           return new Response("Update OK", 200);
       } else {
           return new Response("Update Failed", 404);
       }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Departement $departement)
    {
        if ($departement->delete()) {
            return new Response("Destroy OK", 200);

        }
    }
}
