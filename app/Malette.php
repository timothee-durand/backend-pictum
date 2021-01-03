<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Malette extends Model
{
    protected $table = "malette";
    protected $fillable = [
        "nom",
        "ref",
        "photo"
    ];

    public function materiels(){
        return $this->hasMany("App\Materiel");
    }

    public function estPretee(){
        $materiels = Materiel::where("malette_id", $this->id)->first();
        if($materiels !== null) {
            $est_prete = EstPrete::where("materiel_id", $materiels->id)->get();
        } else {
            $est_prete = [];
        }
        return $est_prete;
    }
}
