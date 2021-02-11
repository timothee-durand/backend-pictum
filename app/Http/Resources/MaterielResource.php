<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use function App\Utils\getFullFilePath;

class MaterielResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" =>$this->id,
            "nom"=>$this->nom,
            "ref" => $this->ref,
            "photo" => Storage::url($this->photo),
            "usage" => $this->usage,
            "caracteristiques" => $this->carac ,
            "tutos" => $this->tutos,
            "notice" => $this->notice,
            "indisp"=> $this->indisp ,
            "indisp_raison" => $this->indisp_raison,
            "type" => $this->type ,
            "type_id" => $this->type_id ,
            "malette" => $this->malette,
            "malette_id" => $this->malette_id,
            "departement" => $this->departement,
            "departement_id" => $this->departement_id,
            "prets"=>$this->est_prete,
            "jour_dispo"=>$this->dayDispo(),
            "pro"=>$this->pro,
            "gestionnaire"=>new GestionnaireResource($this->gestionnaire())
        ];
    }
}
