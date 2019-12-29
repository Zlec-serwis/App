<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_id',
        'doer_id'
    ];
    public function doer()
    {
        return $this->belongsTo(Doer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
