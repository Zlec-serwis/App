<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doer extends Model
{
    protected $fillable = [
        'description',
    ];

    /**
     * Doer have a user
     */
    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

}
