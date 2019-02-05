<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frequence;
class CourPlanning extends Model
{
    protected $table = 'planning_cours';

    public $timestamps = false;
    public function frequence()
    {
        return $this->hasMany(Frequence::class,'cour');
    }
}
