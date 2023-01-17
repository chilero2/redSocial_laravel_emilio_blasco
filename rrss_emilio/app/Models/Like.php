<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    // Relación muchos a uno - Una imagen puede tener muchos likes
    public function image(): BelongsTo {
        return $this->belongsTo(Image::class, 'id');
    }

    // Relación muchos a uno - Un usuario puede tener muchos likes
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'id');
    }
}
