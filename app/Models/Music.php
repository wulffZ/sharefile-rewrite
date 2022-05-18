<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['user_id', 'title', 'artist', 'genres', 'size', 'file_uri', 'thumbnail_uri' ,'soft_delete'];

    use HasFactory;
}
