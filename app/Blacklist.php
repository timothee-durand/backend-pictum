<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $table = "blacklist";
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "id_univ"
    ];
}
