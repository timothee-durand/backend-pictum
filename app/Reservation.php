<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservation";

    protected $fillable = [
        "valide",
        "prof",
        "nom_emprunteur",
        "prenom_emprunteur",
        "mail_emprunteur",
        "id_univ_emprunteur",
    ];
}
