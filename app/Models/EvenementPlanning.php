<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvenementPlanning extends Model
{
    protected $table = 'planning_evenements';
    public $timestamps = false;
    public function frequence()
    {
        return $this->hasMany('App\Models\EvenementPlanning','evenement');
    }
}
