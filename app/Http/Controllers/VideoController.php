<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videos()
    {
        $videos = Video::with('user')->paginate(16);

//        return $videos;

        return view('category.videos', ['videos' => $videos]);
    }
}
