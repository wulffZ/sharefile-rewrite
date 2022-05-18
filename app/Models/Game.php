<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'developer', 'genres', 'size', 'file_uri', 'thumbnail_uri' ,'soft_delete'];

    use HasFactory;
}
