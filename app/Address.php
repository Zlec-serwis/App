<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'city',
        'province'
    ];

    /**
     * User have many posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function doers()
    {
        return $this->hasMany(Doer::class);
    }
}
