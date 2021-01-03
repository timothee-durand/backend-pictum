<?php

namespace App\Http\Controllers;

use App\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the user that are in the Blacklist
     *
     * @group Blacklist
     * @authenticated
     *
     * @response [
     * {
     * "id": 1,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Mckenna",
     * "prenom": "Kuhic",
     * "mail": "matilda77@yahoo.com",
     * "id_univ": "kasandra.kling"
     * },
     * {
     * "id": 2,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Coby",
     * "prenom": "Murray",
     * "mail": "windler.godfrey@hotmail.com",
     * "id_univ": "clemmie29"
     * }
     * ]
     *
     *
     *
     * @return string
     */
    public function index()
    {
        return Blacklist::all()->toJson();
    }

    /**
     *
     * Store a newly created Blacklist in storage.
     *
     * @group Blacklist
     * @authenticated
     * @bodyParam  nom required string Nom de la personne
     * @bodyParam prenom required string Prénom de la personne
     * @bodyParam email required string Mail de la personne
     * @bodyParam id_univ required string Id universitaire de la personne
     *
     * @response {
     *  "Blacklist Created"
     * }
     *
     *
     *
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required|string",
            "prenom" => "required|string",
            "email" => "required|string",
            "id_univ" => "required|string"
        ]);

        $blacklist = new Blacklist([
            "nom" => $request->input("nom"),
            "prenom" => $request->input("prenom"),
            "email" => $request->input("email"),
            "id_univ" => $request->input("id_univ"),
        ]);

        if ($blacklist->save()) {
            return response("Blacklist Created");
        }
    }

    /**
     *
     *
     * Display the specified Blacklisted person.
     *
     * @group Blacklist
     * @authenticated
     * @urlParam id ID Pictum
     *
     * @response {
     * "id": 1,
     * "created_at": "2020-12-03T17:30:34.000000Z",
     * "updated_at": "2020-12-03T17:30:34.000000Z",
     * "nom": "Mckenna",
     * "prenom": "Kuhic",
     * "mail": "matilda77@yahoo.com",
     * "id_univ": "kasandra.kling"
     * }
     *
     *
     * @param \App\Blacklist $blacklist
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
     * Update the specified blacklisted person in storage.
     * @group Blacklist
     * @urlParam blacklist int ID Pictum
     *
     * @queryParam nom string Nom de la personne
     * @queryParam prenom string Prénom de la personne
     * @queryParam mail string Mail de la personne
     * @queryParam id_univ string Id universitaire de la personne
     *
     * @response {
     * "Not Find"
     * }
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Blacklist $blacklist
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Blacklist $blacklist)
    {
        $blacklistr = Blacklist::find($blacklist->id);

        if ($blacklistr != null) {

            if ($request->input("nom") != null) {
                $blacklistr->nom = $request->input("nom");
            }

            if ($request->input("prenom") != null) {
                $blacklistr->prenom = $request->input("prenom");
            }

            if ($request->input("mail") != null) {
                $blacklistr->mail = $request->input("mail");
            }

            if ($request->input("id_univ") != null) {
                $blacklistr->id_univ = $request->input("id_univ");
            }

            //envoi modifs
            if ($blacklistr->save()) {
                return response("Blacklist updated");
            } else {
                return response("Blacklist update failed", 418);
            }
        } else {
            //si pas d'entree correspondante
            return response("Not Find", 404);
        }


    }

    /**
     *
     * Remove the specified resource from storage.
     *
     * @group Blacklist
     * @authenticated
     * @urlParam blacklist int ID Pictum correspondant
     *
     *
     *
     * @param \App\Blacklist $blacklist
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Blacklist $blacklist)
    {
        if (Blacklist::find($blacklist->id)->delete()) {
            return response("Blacklist destroyed");
        } else {
            return response("Blacklist not destroyed", 418);
        }
    }
}
