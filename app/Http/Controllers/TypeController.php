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
            "picto"=>$this->storeImage($request),
        ]);

        if ($type->save()) {
            return json_encode([
                "method" => "store",
                "status" => "200"
            ]);
        } else {
            return json_encode([
                "method" => "store",
                "status" => "400"
            ]);
        }
    }

    protected function storeImage(Request $request) {
        $fileName = $request->get('nom') . '.' . $request->file('picto')->extension();
        $path = $request->file('picto')->storeAs('public/picto-type', $fileName);
        return substr($path, strlen('storage/'));
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
         return Type::find($type->id)->update($request->all());
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
