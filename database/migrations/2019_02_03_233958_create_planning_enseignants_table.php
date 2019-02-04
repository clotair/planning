<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_enseignants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enseignant')->index();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->integer('jour')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planning_enseignants');
    }
}
