<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequence extends Model
{
    protected $table = 'frequences';
    public $timestamps = false;
    protected $fillable = ['jour', 'heure_fin', 'heure_debut'];

    public function courplanning()
    {
        return $this->belongsTo('App\Models\CourPlanning','cour');
    }
    public function eventplanning()
    {
        return $this->belongsTo('App\Models\EventPlanning','evenement');
    }
}
