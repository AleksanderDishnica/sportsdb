<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * Relationship between the team and the league
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function leagues()
    {
        return $this->belongsToMany('App\League')->withTimestamps();
    }

}
