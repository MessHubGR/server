<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'latitude', 'longitude', 'capacity', 'active', 'battery'
    ];
}
