<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creneaux extends Model
{
    protected $table = "creneaux";
    protected $fillable = [
        "jour",
        "heure_debut_matin",
        "heure_fin_matin",
        "heure_debut_am",
        "heure_fin_am",
        "gestionnaire_id"
    ];

}
