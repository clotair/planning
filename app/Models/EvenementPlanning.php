<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frequence;

class EvenementPlanning extends Model
{
    protected $table = 'planning_evenements';
    public $timestamps = false;
    public function frequence()
    {
        return $this->hasMany(Frequence::class,'evenement');
    }
}
