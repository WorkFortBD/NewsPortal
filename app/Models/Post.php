<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * comments
     *
     * @return array returns the comments list of the post
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
