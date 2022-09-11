<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videos()
    {
        $videos = Video::paginate(16);
        return view('category.videos', ['videos' => $videos]);
    }
}
