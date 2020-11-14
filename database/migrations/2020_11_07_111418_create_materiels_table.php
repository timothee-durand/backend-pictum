<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ref", 32);
            $table->string("photo", 255);
            $table->string("usage", 300);
            $table->string("carac", 300);
            $table->json("tutos");
            $table->string("notice", 255);
            $table->boolean("indisp")->default(false);
            $table->string("indisp_raison");
            $table->foreignId('type_id')->constrained("type");
            $table->foreignId('malette_id')->constrained("malette")->nullable();
            $table->foreignId('departement_id')->constrained("departement");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiel');
    }
}
