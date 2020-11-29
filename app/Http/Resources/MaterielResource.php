<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return[
            "ref" => $this->ref,
            "photo" => $this->photo,
            "usage" => $this->usage,
            "caracteristiques" => $this->carac ,
            "tutos" => $this->tutos,
            "notice" =>$this->notice,
            "indisponible"=> $this->indisp ,
            "indisp_raison" => $this->indisp_raison,
            "type" => $this->type ,
            "malette" => $this->malette,
            "departement" => $this->departement,
            "prets"=>$this->est_prete,
            "jour_dispo"=>$this->dayDispo()
        ];
    }
}
