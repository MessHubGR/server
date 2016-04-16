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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key'       => 'string',
        'latitude'  => 'double',
        'longitude' => 'double',
        'capacity'  => 'integer',
        'active'    => 'boolean',
        'battery'   => 'integer',
        'lockdown'  => 'boolean'
    ];

    /**
     * Get the log for this hub.
     */
    public function log()
    {
        return $this->actions()->orderBy('created_at', 'desc')->limit(50)->get();
    }
}
