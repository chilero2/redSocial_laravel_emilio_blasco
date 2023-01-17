<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    protected $table= 'images';

//    Relación uno a muchos - Una imagen puede tener más de un comentario
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

//    Relación uno a muchos - Una imagen puede tener más de un like
    public function likes(): HasMany {
        return $this->hasMany(Like::class);
    }

//    Relación muchos a uno - Un usuario puede crear muchas imágenes
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
