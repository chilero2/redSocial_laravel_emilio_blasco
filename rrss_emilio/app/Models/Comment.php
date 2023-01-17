<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    // Relación uno a muchos - Un usuario puede tener muchos comentarios
    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    // Relación uno a muchos - Una imagen puede tener muchos comentarios
    public function comments(): HasMany {
        return $this->hasMany(Image::class);
    }
}
