<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    // Relación uno a muchos - Un usuario puede tener muchos comentarios
    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación uno a muchos - Una imagen puede tener muchos comentarios
    public function images(): BelongsTo {
        return $this->belongsTo(Image::class, 'id');
    }
}
