<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    /**
     * Relationship between the sport and the league
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function leagues()
    {
        return $this->hasMany('App\League');
    }
}
