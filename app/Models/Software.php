<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'developer', 'types', 'size', 'file_uri', 'thumbnail_uri' ,'soft_delete'];

    use HasFactory;
}
