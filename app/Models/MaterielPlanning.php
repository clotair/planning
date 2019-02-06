<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frequence;

class MaterielPlanning extends Model
{
    protected $table = 'planning_materiel';

    public $timestamps = false;
    public function frequence()
    {
        return $this->hasMany(Frequence::class,'evenement');
    }
}
