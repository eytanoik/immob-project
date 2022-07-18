<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offre extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offreclicks()
    {
        return $this->hasMany(OffreClick::class);
    }

    public function demandes()
    {
        return $this->belongsToMany(Demande::class);
    }

}
