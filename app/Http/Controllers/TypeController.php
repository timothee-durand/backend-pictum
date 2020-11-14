<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Type::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $type= new Type([
            "nom"=>$request->input("nom"),
            "picto"=>$request->input("picto")
        ]);

        if ($type->save()) {
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
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function show(Type $type)
    {
        $type = Type::find($type->id);


        if ($type != null) {
            return $type->toJSON();
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
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Type $type)
    {
        $type = Type::find($type->id);

        if($type!=null) {
            if($request->input("nom") != null) {
                $type->nom = $request->input("nom");
            }

            if ($request->input("picto") != null) {
                $type->picto = $request->input("picto");
            }

            if ($type->save()) {
                return json_encode([
                    "method" => "update",
                    "status" => "OK"
                ]);
            } else {
                return json_encode([
                    "method" => "update",
                    "status" => "FAILED"
                ]);
            }
        } else {
            //si pas d'entree correspondante
            return json_encode([
                "method" => "show",
                "status" => "!FIND"
            ]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Type $type)
    {
        if (Type::find($type->id)->delete()) {
            return json_encode([
                "method" => "destroy",
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
