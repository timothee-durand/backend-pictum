<?php

namespace App\Http\Controllers;

use App\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Blacklist::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $blacklist = new Blacklist([
            "nom"=>$request->input("nom"),
            "prenom"=>$request->input("prenom"),
            "mail"=>$request->input("mail"),
            "id_univ"=>$request->input("id_univ"),
        ]);

        if ($blacklist->save()) {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Blacklist  $blacklist
     * @return false|\Illuminate\Http\Response|string
     */
    public function show(Blacklist $blacklist)
    {
        $blacklistr = Blacklist::find($blacklist->id);


        if ($blacklistr != null) {
            return $blacklistr->toJSON();
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
     * @param  \App\Blacklist  $blacklist
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Blacklist $blacklist)
    {
        $blacklistr = Blacklist::find($blacklist->id);

        if($blacklistr != null) {

            if($request->input("nom")!=null) {
                $blacklistr->nom = $request->input("nom");
            }

            if($request->input("prenom")!=null) {
                $blacklistr->prenom = $request->input("prenom");
            }

            if($request->input("mail")!=null) {
                $blacklistr->mail = $request->input("mail");
            }

            if($request->input("id_univ")!=null) {
                $blacklistr->id_univ = $request->input("id_univ");
            }

            //envoi modifs
            if ($blacklistr->save()) {
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

        else {
            //si pas d'entree correspondante
            return json_encode([
                "method" => "update",
                "status" => "!FIND"
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blacklist  $blacklist
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Blacklist $blacklist)
    {
        if (Blacklist::find($blacklist->id)->delete()) {
            return json_encode([
                "method" =>  "destroy",
                "status" => "OK"
            ]);
        } else {
            return json_encode([
                "method" => "destroy",
                "status" => "FAILED"
            ]);
        }
    }
}
