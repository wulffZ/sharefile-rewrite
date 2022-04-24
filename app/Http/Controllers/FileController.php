<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FileController extends Controller
{
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

        switch($category) {
            case "video":
                self::handleVideo($request);
                break;
            case "game":
                self::handleGame($request);
                break;
            case "software":
                self::handleSoftware($request);
                break;
            case "music":
                self::handleMusic($request);
                break;
            case "other":
                self::handleOther($request);
                break;
        }
        return $request;
    }

    public static function handleVideo($request)
    {

    }

    public static function handleGame($request)
    {

    }

    public static function handleSoftware($request)
    {

    }

    public static function handleMusic($request)
    {

    }

    public static function handleOther($request)
    {

    }
}
