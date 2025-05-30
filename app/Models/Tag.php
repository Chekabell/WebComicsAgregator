<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    public function comics()
    {
        return $this->belongsToMany(Comics::class, "comics_tags");
    }
}
