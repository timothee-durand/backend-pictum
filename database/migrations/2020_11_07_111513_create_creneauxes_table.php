<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreneauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creneaux', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("jour");
            $table->time("heure_debut_matin");
            $table->time("heure_fin_matin");
            $table->time("heure_debut_am");
            $table->time("heure_fin_am");
            $table->foreignId('gestionnaire_id')->constrained("gestionnaire")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creneaux');
    }
}
