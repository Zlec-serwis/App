<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * Category have many posts
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')
            ->withTimestamps();
    }
}
