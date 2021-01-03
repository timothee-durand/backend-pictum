<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUniquePositionGestRes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gestionnaire', function (Blueprint $table) {
            $table->string("email", 100)->change();
            $table->string("id_univ")->change();
        });
        Schema::table('reservation', function (Blueprint $table) {
            $table->string("email", 100)->change();
            $table->string("id_univ")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
