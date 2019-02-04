<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jour')->unique()->index();
            $table->time('heure_debut')->unique()->index();
            $table->time('heure_fin')->unique()->index();
            $table->integer('cour')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequences');
    }
}
