<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use function App\Utils\getFullFilePath;

class MaletteResource extends JsonResource
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
            "id"=>$this->id,
            "nom" => $this->nom,
            "ref" => $this->ref,
            "photo" => Storage::url($this->photo),
            "materiels" => $this->materiels,
            "est_pretes"=> $this->estPretee(),
            "jour_dispo" => $this->dayDispo()
        ];
    }
}
