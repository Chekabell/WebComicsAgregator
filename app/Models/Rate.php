<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;
    public function rates(): BelongsTo
    {
        return $this->belongsTo(Comics::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
