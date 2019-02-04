<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classe')->index();
            $table->integer('matiere')->index();
            $table->integer('enseignant')->index();
            $table->integer('salle')->index();
            $table->integer('type_cour')->index();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('jour')->index();
            $table->time('heure_debut');
            $table->time('heure_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planning_cours');
    }
}
