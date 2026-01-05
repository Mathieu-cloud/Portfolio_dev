<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projet extends Model
{
    protected $fillable = ['nom', 'description','image','lien'];


    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technologie::class);
    }


}
