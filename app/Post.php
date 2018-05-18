<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //saving
    //saved
    //updating
    //updated
    //deleting
    //deleted

    protected static function boot()
    {
        parent::boot();

        // static::saving(function ($post) {
        //     if (auth()->check()) {
        //         $post->user_id = auth()->id();
        //     }
        // });

        static::deleting(function ($post) {
            $post->tags()->sync([]);
        });
    }

    protected $guarded = [];

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
        // return $this->morphMany(Comment::class, 'commentable')->latest();
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tagsList()
    {
        return join(', ', $this->tags->pluck('name')->map(function ($tag) {
            return "<a href=''>#{$tag}</a>";
        })->toArray());
    }

    //getters - accessors
    // public function getTitleAttribute($title)
    // {
    //     return strtoupper($title);
    // }

    //setters - mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function setCoverAttribute($cover)
    {
        $this->attributes['cover'] = $cover->store('covers');
    }

    public function getCoverAttribute($cover)
    {
        return ($cover) ?? 'covers/default.jpg'; //null coalescen operator
    }
}
