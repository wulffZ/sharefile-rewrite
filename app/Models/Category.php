<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function is_category($category)
    {
        if(Category::where('name', $category)->exists() == false)
        {
            return false;
        }

        return true;
    }
}
