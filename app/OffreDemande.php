<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffreDemande extends Model
{
    protected $guarded = [];

    protected $table = 'offre_demande';

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
