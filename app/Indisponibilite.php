<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indisponibilite extends Model
{
    protected $table = "indisponibilite";
    protected $fillable = [
        "date_debut",
        "date_fin",
        "gestionnaire_id"
    ];
}
