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

    public function addresRelation()
    {
        return $this->hasOne('App\Address');
    }


    /**
     * Doer have many categories
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
