<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comics extends Model
{
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany(Tag::class, "comics_tags");
    }
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, "bookmarks");
    }
    protected $table = "comics";
    public $timestamps = false;
}

