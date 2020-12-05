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
            $table->string("nom", 32);
            $table->string("prenom", 32);
            $table->string("mail", 100);
            $table->string("raison_pro", 300)->nullable();
            $table->string("id_univ");
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
