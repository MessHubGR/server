<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'birthdate', 'regid'
    ];

}
