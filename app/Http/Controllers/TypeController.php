<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the Type.
     *
     * @group Type
     * @authenticated
     * @response [
    {
    "id": 1,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Lumiere",
    "picto": "https://via.placeholder.com/30x30.png/0044cc?text=rerum"
    },
    {
    "id": 2,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Prise de vue",
    "picto": "https://via.placeholder.com/30x30.png/005533?text=nostrum"
    }
     * ]
     *
     * @return string
     */
    public function index()
    {
        return TypeResource::collection(Type::all())->toJson();
    }


    /**
     *
     * Store a newly created resource in storage.
     * @group Type
     * @authenticated
     * @bodyParam nom string required Nom du Type
     * @bodyParam picto file required Pictogramme représentant le type
     *
     * @response {
     *  "Store OK"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required|string|min:4",
            "picto"=>"required|image"
        ]);

        $type= new Type([
            "nom"=>$request->input("nom"),
            "picto"=>$this->storeImage($request),
        ]);

        if ($type->save()) {
            return response("Store OK");
        } else {
            return response("Store failed", 400);
        }
    }

    protected function storeImage(Request $request) {
        $fileName = $request->get('nom') . '.' . $request->file('picto')->extension();
        $path = $request->file('picto')->storeAs('public/picto-type', $fileName);
        return $path;
    }

    /**
     * Display the specified resource.
     * @group Type
     * @authenticated
     * @urlParam type int ID Pictum du type demandé
     *
     * @response {
    "id": 2,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Prise de vue",
    "picto": "https://via.placeholder.com/30x30.png/005533?text=nostrum"
    }
     *
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function show(Type $type)
    {
        $_type = new TypeResource($type);


        if ($_type != null) {
            return $_type->toJSON();
        } else {
            //si pas d'entree correspondante
            return response("Don't find", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @group Type
     * @authenticated
     * @urlParam type int ID Pictum du type demandé
     * @bodyParam nom string Nom du Type
     * @bodyParam picto file Pictogramme représentant le type
     * @response {
     *  "Update OK"
     * }
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Type $type)
    {
        echo json_encode($request->picto);
        if($request->picto != null) {
            $type->picto = $this->storeImage($request->picto);
        }
         if($type->update($request->all())){
             return response("Update OK");
         }
    }

    /**
     * Remove the specified resource from storage.
     * @group Type
     * @authenticated
     * @urlParam type int ID Pictum du type demandé
     * @response {
     *  "Destroy OK"
     * }
     *
     * @param  \App\Type  $type
     * @return false|\Illuminate\Http\Response|string
     */
    public function destroy(Type $type)
    {
        if ($type->delete()) {
            return response("Destroy OK");
        } else {
            return response("Destroy Failed", 500);
        }
    }
}
