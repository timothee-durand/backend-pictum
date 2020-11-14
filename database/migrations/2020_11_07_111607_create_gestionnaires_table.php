<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestionnaire', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nom", 50);
            $table->string("prenom", 50);
            $table->string("mail", 100);
            $table->integer("id_univ");
            $table->boolean("admin")->default(false);
            $table->foreignId('departement_id')->index()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestionnaire');
    }
}
