<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean("valide")->default(true);
            $table->boolean("prof")->default(false);
            $table->string("nom_emprunteur", 32);
            $table->string("prenom_emprunteur", 32);
            $table->string("mail_emprunteur", 100);
            $table->integer("id_univ_emprunteur");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
