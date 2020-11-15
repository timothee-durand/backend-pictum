<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestionnaire extends Model
{
    protected $table = "gestionnaire";
    protected $fillable = [
        "nom",
        "prenom",
        "mail",
        "id_univ",
        "admin",
        "departement_id"
    ];

    public function departement () {
        return $this->belongsTo("App\Departement");
    }
}
