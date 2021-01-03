<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaterielResource;
use App\Materiel;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

class MaterielController extends Controller
{

    /**
     * Display a listing of the Materiel.
     * @group Materiel
     * @authenticated
     * @response [
    {
    "ref": "L2_PER_RHO_01",
    "photo": "https://via.placeholder.com/200x200.png/00bb33?text=fugiat",
    "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
    "caracteristiques": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisponible": 0,
    "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
    "type": {
    "id": 19,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "nom": "Lumiere",
    "picto": "https://via.placeholder.com/30x30.png/009944?text=omnis"
    },
    "malette": {
    "id": 1,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Etha Weber",
    "ref": "L1_MAL_PHOTO_03",
    "photo": "https://via.placeholder.com/200x200.png/006688?text=laborum"
    },
    "departement": {
    "id": 7,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "lat": 63.66,
    "long": 36.7,
    "nom": "South Vickyborough",
    "gestionnaire_id": 4
    },
    "prets": [
    {
    "id": 38,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "date_debut": "2020-07-24 16:55:58",
    "date_fin": "2020-08-20 09:48:52",
    "rendu": "2021-01-13 12:57:10",
    "materiel_id": 1,
    "reservation_id": 47,
    "gestionnaire_id": 7
    },
    {
    "id": 59,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-05-12 01:07:08",
    "date_fin": "2020-05-31 18:05:24",
    "rendu": "2020-05-31 18:05:24",
    "materiel_id": 1,
    "reservation_id": 69,
    "gestionnaire_id": 9
    },
    {
    "id": 94,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-12-16 04:54:45",
    "date_fin": "2020-01-04 17:03:00",
    "rendu": null,
    "materiel_id": 1,
    "reservation_id": 91,
    "gestionnaire_id": 2
    }
    ],
    "jour_dispo": [
    {
    "date": "2020-12-05",
    "disponible": false
    },
    {
    "date": "2020-12-06",
    "disponible": false
    },
    {
    "date": "2020-12-07",
    "disponible": false
    },
    {
    "date": "2020-12-08",
    "disponible": false
    },
    {
    "date": "2020-12-09",
    "disponible": false
    },
    {
    "date": "2020-12-10",
    "disponible": false
    },
    {
    "date": "2020-12-11",
    "disponible": false
    },
    {
    "date": "2020-12-12",
    "disponible": false
    },
    {
    "date": "2020-12-13",
    "disponible": false
    }
    ]
    }]
     *
     *
     * @return string
     */
    public function index()
    {
        return MaterielResource::collection(Materiel::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     * @group Materiel
     * @authenticated
     * @bodyParam  ref string required Reference du materiel
     * @bodyParam nom string required Nom
     * @bodyParam photo pdf required Photo du matériel
     * @bodyParam usage string required Usage possible du matériel
     * @bodyParam carac string required Caractéristiques techniques du matériel
     * @bodyParam notice file required Notice du matériel (PDF c'est mieux)
     * @bodyParam indisp bool required Matériel disponible ou indisponible
     * @bodyParam pro bool Matériel "pro" (défaut:false)
     * @bodyParam indisp_raison string Raison de l'indisponibilité
     * @bodyParam type_id int required ID pictum du type de matériel
     * @bodyParam malette_id int ID pictum de la malette correspondante (si il existe à une malette, sinon null)
     * @bodyParam departement_id int required ID pictum du département ou il est stoké
     * @bodyParam tutos json required Array comme ca :
    {
    "name": "John",
    "skills": ["SQL", "C#", "Azure"]
    },
    {
    "name": "Jane",
    "surname": "Doe"
    }
    ]
     *
     * @response {
     *  "Store OK"
     *}
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(Request $request, Materiel $materiel )
    {
       $request->validate([
            'ref' => 'required|string|min:6',
            'nom' => 'required|string|min:4',
            'photo' => 'required|image',
            'usage' => 'required|string',
            'notice' => 'required|string',
            'indisp' => 'boolean',
            'pro' => 'numeric',
            'indisp_raison' => 'string',
            'type_id' => 'required|exists:type,id',
            'malette_id' => 'exists:malette,id',
            'departement_id' => 'exists:departement,id',
            'tutos' => 'required|json',
        ]);
        $_materiel = new Materiel($request->all());
        $_materiel->photo = $this->storeImage($request);
        if ($_materiel->save()) {
            return \response("Store OK");
        }
    }

    protected function storeImage(Request $request) {

        $fileName = $request->get('nom') . '.' . $request->file('photo')->extension();

        $path = Storage::putFileAs(
            'public/photo-materiel', $request->file('photo'), $fileName
        );
        return $path;
    }


    /**
     * Display the specified resource.
     * @group Materiel
     * @urlParam materiel int required ID pictum du matériel
     * @authenticated
     * @response
     * {
    "data": {
    "ref": "L2_PER_RHO_01",
    "photo": "https://via.placeholder.com/200x200.png/00bb33?text=fugiat",
    "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
    "caracteristiques": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
    "notice": "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
    "indisponible": 0,
    "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
    "type": {
    "id": 19,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "nom": "Lumiere",
    "picto": "https://via.placeholder.com/30x30.png/009944?text=omnis"
    },
    "malette": {
    "id": 1,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Etha Weber",
    "ref": "L1_MAL_PHOTO_03",
    "photo": "https://via.placeholder.com/200x200.png/006688?text=laborum"
    },
    "departement": {
    "id": 7,
    "created_at": "2020-12-03T17:31:12.000000Z",
    "updated_at": "2020-12-03T17:31:12.000000Z",
    "lat": 63.66,
    "long": 36.7,
    "nom": "South Vickyborough",
    "gestionnaire_id": 4
    },
    "prets": [
    {
    "id": 38,
    "created_at": "2020-12-03T17:31:13.000000Z",
    "updated_at": "2020-12-03T17:31:13.000000Z",
    "date_debut": "2020-07-24 16:55:58",
    "date_fin": "2020-08-20 09:48:52",
    "rendu": "2021-01-13 12:57:10",
    "materiel_id": 1,
    "reservation_id": 47,
    "gestionnaire_id": 7
    },
    {
    "id": 59,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-05-12 01:07:08",
    "date_fin": "2020-05-31 18:05:24",
    "rendu": "2020-05-31 18:05:24",
    "materiel_id": 1,
    "reservation_id": 69,
    "gestionnaire_id": 9
    },
    {
    "id": 94,
    "created_at": "2020-12-03T17:31:14.000000Z",
    "updated_at": "2020-12-03T17:31:14.000000Z",
    "date_debut": "2020-12-16 04:54:45",
    "date_fin": "2020-01-04 17:03:00",
    "rendu": null,
    "materiel_id": 1,
    "reservation_id": 91,
    "gestionnaire_id": 2
    }
    ],
    "jour_dispo": [
    {
    "date": "2020-12-05",
    "disponible": false
    },
    {
    "date": "2020-12-06",
    "disponible": false
    },
    {
    "date": "2020-12-07",
    "disponible": false
    },
    {
    "date": "2020-12-08",
    "disponible": false
    },
    {
    "date": "2020-12-09",
    "disponible": false
    },
    {
    "date": "2020-12-10",
    "disponible": false
    },
    {
    "date": "2020-12-11",
    "disponible": false
    },
    {
    "date": "2020-12-12",
    "disponible": false
    },
    {
    "date": "2020-12-13",
    "disponible": false
    }
    ]
    }
    }
     *
     * @param  \App\Materiel  $materiel
     * @return MaterielResource
     */
    public function show(Materiel $materiel)
    {
        return new MaterielResource($materiel);

    }

    /**
     * Update the specified Materiel in storage.
     * @group Materiel
     * @authenticated
     * @urlParam materiel int required ID pictum du matériel
     * @bodyParam  ref string  Reference du materiel
     * @bodyParam nom string  Nom
     * @bodyParam photo file  Photo du matériel
     * @bodyParam usage string  Usage possible du matériel
     * @bodyParam carac string  Caractéristiques techniques du matériel
     * @bodyParam notice file  Notice du matériel (PDF c'est mieux)
     * @bodyParam indisp bool  Matériel disponible ou indisponible
     * @bodyParam indisp_raison string Raison de l'indisponibilité
     * @bodyParam type_id int  ID pictum du type de matériel
     * @bodyParam malette_id int ID pictum de la malette correspondante (si il existe à une malette, sinon null)
     * @bodyParam departement_id int  ID pictum du département ou il est stoké
     * @bodyParam tutos json  Array comme ca : [
    {
    "name": "John",
    "skills": ["SQL", "C#", "Azure"]
    },
    {
    "name": "Jane",
    "surname": "Doe"
    }
    ]
     *
     *
     * @response {
     *  "Update OK"
     *}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiel  $materiel
     * @return false|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Materiel $materiel)
    {
        $inputs = $request->input();
        //echo json_encode($inputs)."\n";

        if($request->has("photo")){
           // echo "\nphoto rtututfyuuifyuifyuiyuiytuiyuiyuiyuiyuiyuiyu\n";
            $inputs["photo"] = $this->storeImage($request);
        }
        //envoi modifs
        if ($materiel->update($inputs)) {
            return new Response("Update OK", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @group Materiel
     * @authenticated
     * @urlParam materiel int required ID pictum du matériel
     * @response {
     *      "Delete OK"
     * }
     *
     * @param \App\Materiel $materiel
     * @return false|\Illuminate\Http\Response|string
     * @throws \Exception
     */
    public function destroy(Materiel $materiel)
    {
        if ($materiel->delete()) {
            return new Response("Delete OK", 200);

        }
    }





}
