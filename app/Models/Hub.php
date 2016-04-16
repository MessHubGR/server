<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'latitude', 'longitude', 'capacity', 'active', 'battery', 'lockdown', 'deployed_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'deployed_at'];

    /**
     * Get the takeaways for this hub.
     */
    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }
}