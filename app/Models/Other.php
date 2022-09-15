<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Other extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'size', 'file_uri' ,'soft_delete'];

    protected $table = 'other';

    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
