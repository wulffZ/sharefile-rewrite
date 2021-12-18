<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    public $validationRules = [

    ];


    public static function showUpload($category)
    {
        if(Category::is_category($category) == false)
        {
            return redirect(route('index'));
        }

        return view('upload', ['category' => $category]);
    }

    public static function upload(Request $request, $category)
    {
        if(Category::is_category($category) == false)
        {
            return redirect(route('index'));
        }

        return $request;
    }
}
