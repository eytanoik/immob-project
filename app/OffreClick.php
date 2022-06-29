<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffreClick extends Model
{
    protected $guarded = [];

    protected $table = 'offreclicks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
