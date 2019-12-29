<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //protected $fillable = ['name'];

    public function offer()
    {
        return $this->belongsToMany(Offer::class);
    }

}
