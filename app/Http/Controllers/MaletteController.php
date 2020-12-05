<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaletteResource;
use App\Malette;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaletteController extends Controller
{
    /**
     * Display a listing of the Malettes.
     * @group Malette
     * @authenticated
     * @response [
    {
    "id": 1,
    "nom": "Etha Weber",
    "ref": "L1_MAL_PHOTO_03",
    "photo": "https://via.placeholder.com/200x200.png/006688?text=laborum",
    "materiels": [
    {
    "id": 1,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_PER_RHO_01",
    "nom": "Brionna Funk",
    "photo": "https://via.placeholder.com/200x200.png/00bb33?text=fugiat",
    "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
    "carac": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
    "type_id": 19,
    "malette_id": 1,
    "departement_id": 7
    },
    {
    "id": 7,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_PER_RHO_01",
    "nom": "Terrell Murray",
    "photo": "https://via.placeholder.com/200x200.png/004466?text=placeat",
    "usage": "I can creep under the table: she opened it, and they sat down, and nobody spoke for some way, and then keep tight hold of its right ear and left foot, so as to bring tears into her eyes; and once.",
    "carac": "YOU sing,' said the Hatter. 'He won't stand beating. Now, if you want to stay in here any longer!' She waited for some time after the others. 'We must burn the house of the goldfish kept running in.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "Alice whispered, 'that it's done by everybody.",
    "type_id": 18,
    "malette_id": 1,
    "departement_id": 2
    },
    {
    "id": 8,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "ref": "L2_ENR_ZOOM_01",
    "nom": "Tristin Erdman",
    "photo": "https://via.placeholder.com/200x200.png/007777?text=vero",
    "usage": "I've had such a long hookah, and taking not the smallest notice of them can explain it,' said the Mock Turtle yawned and shut his eyes.--'Tell her about the same words as before, 'It's all her.",
    "carac": "Alice. 'Exactly so,' said the Gryphon. 'We can do without lobsters, you know. So you see, as she could, and waited till the eyes appeared, and then nodded. 'It's no use in knocking,' said the.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 1,
    "indisp_raison": "ONE.' 'One, indeed!' said the Footman. 'That's.",
    "type_id": 17,
    "malette_id": 1,
    "departement_id": 6
    },
    {
    "id": 46,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "ref": "L2_ENR_ZOOM_01",
    "nom": "Dr. Jesus Mitchell",
    "photo": "https://via.placeholder.com/200x200.png/00ff33?text=voluptatem",
    "usage": "I know!' exclaimed Alice, who had spoken first. 'That's none of them hit her in such confusion that she was now the right words,' said poor Alice, 'when one wasn't always growing larger and smaller.",
    "carac": "Alice, jumping up in her life; it was quite surprised to see some meaning in it,' but none of my life.' 'You are old,' said the Dormouse; 'VERY ill.' Alice tried to curtsey as she had made her so.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisp": 0,
    "indisp_raison": "I then? Tell me that first, and then added them.",
    "type_id": 16,
    "malette_id": 1,
    "departement_id": 2
    }
    ]
    }
     * ]
     *
     *
     * @return Malette[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|string
     */
    public function index()
    {
       return MaletteResource::collection(Malette::all())->toJSON();
    }

    /**
     *
     * Store a newly created resource in storage.
     * @group Malette
     * @bodyParam  nom string required Nom affiché de la malette
     * @bodyParam ref string required Reférence de la malette en particulier
     * @bodyParam photo file required Photo de la malette
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $malette = new Malette([
            'nom'=>$request->nom,
            "ref"=>$request->ref,
            "photo"=>$this->storeImage($request)
        ]);
        if($malette->save()){
            return new Response("Create OK", 200);
        }
    }

    /**
     *
     * Store the image in storage/app/public/photo-malette
     * in web url : storage/photo-malette/
     *
     *
     * @param Request $request
     * @return false|string
     */
    protected function storeImage(Request $request) {
        $fileName = $request->get('nom') . '.' . $request->file('photo')->extension();
        $path = $request->file('photo')->storeAs('public/photo-malette', $fileName);
        return substr($path, strlen('storage/'));
    }

    /**
     *
     * Display the specified Malette
     * @group Malette
     * @urlParam  malette ID Pictum de la malette
     * @response {
    "id": 2,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Iliana Graham",
    "ref": "L1_MAL_PHOTO_03",
    "photo": "https://via.placeholder.com/200x200.png/00ee22?text=doloremque"
    }
     *@authenticated
     *
     * @param  \App\Malette  $malette
     * @return false|\Illuminate\Http\Response|string
     */
    public function show(Malette $malette)
    {
        $malette = Malette::find($malette->id);

        if ($malette != null) {
            return $malette->toJSON();
        } else {
            //si pas d'entree correspondante
            return \response("Not Find", 404);
        }
    }

    /**
     * Update the specified Malette in storage.
     * @group Malette
     * @urlParam malette ID Pictum de la malette
     * @bodyParam nom string required Nom affiché de la malette
     * @bodyParam ref string required Reférence de la malette en particulier
     * @bodyParam photo file required Photo de la malette
     *@authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Malette  $malette
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Malette $malette)
    {
        $maletteArr = $request->all();
        if($request["photo"] != null) {
            $malette["photo"] = $this->storeImage($request["photo"]);
        }

        if($malette->update($maletteArr)){
            return response("Update OK", 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @group Malette
     * @urlParam malette ID Pictum de la malette
     * @response {
     *      "Delete OK"
     * }
     * @authenticated
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
