<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    /**
     * Relationship between the sport and the league
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sports()
    {
        return $this->belongsTo('App\Sport');
    }

    /**
     * Relationship between the team and the league
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->belongsToMany('App\Team')->withTimestamps();
    }
}
