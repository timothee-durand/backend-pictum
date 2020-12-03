<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Gestionnaire extends Authenticatable
{
    use HasApiTokens;
    protected $guard = "gest";
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

    public function creneaux() {
        return $this->hasMany("App\Creneaux");
    }

    public function indisponibilites(){
        return $this->hasMany("App\Indisponibilite");
    }

    public function rendezVous(){
        return $this->hasMany(EstPrete::class, "gestionnaire_id");
    }
}
