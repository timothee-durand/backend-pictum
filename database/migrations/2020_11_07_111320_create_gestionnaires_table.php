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
            $table->string("email", 100);
            $table->string("id_univ")->unique();
            $table->boolean("admin")->default(false);

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
