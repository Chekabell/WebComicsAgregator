<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function comics()
    {
        return $this->belongsTo(Comics::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    protected $guarded = false;
    public $timestamps = true;
}
