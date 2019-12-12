<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['user_id', 'doer_id', 'post_id', 'price', 'day', 'description', 'accepted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doer()
    {
        return $this->belongsTo(Doer::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
