<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = "materiel";

    protected $fillable = [
        "ref",
        "photo",
        "usage",
        "carac",
        "tutos",
        "notice",
        "indisp",
        "indisp_raison",
        "type_id",
        "malette_id",
        "departement_id",
    ];

    public function departement() {
        return $this->belongsTo("App\Departement");
    }

    public function malette() {
        return $this->belongsTo("App\Malette");
    }

    public function est_prete() {
        return $this->hasMany("App\EstPrete");
    }

    public function gestionnaire() {
        return $this->hasOneThrough("App\Gestionnaire", "App\Departement");
    }

    public function type() {
        return $this->belongsTo("App\Type");
    }
}
