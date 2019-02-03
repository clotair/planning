<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequence extends Model
{
    protected $table = 'frequences';
    public $timestamps = false;
    public function courplanning()
    {
        return $this->belongsTo(CourPlanning::class,'cour');
    }
}
