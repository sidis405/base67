<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //comments
    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }
}
