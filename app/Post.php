<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'active',
        'expired_time'
    ];

    // Table Name
    protected $table= 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    /**
     * Post have a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Post have many categories
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * List Id categories for post
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id')->all();
    }

        /**
     * Post have a user
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public static function scopeActive($query)
    {
        return $query->where('active', 1)
            ->orWhere('expired_time', '<', Carbon::now());
    }

}
