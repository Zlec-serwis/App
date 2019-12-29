<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function doer()
    {
        return $this->belongsTo(Doer::class);
    }
}
