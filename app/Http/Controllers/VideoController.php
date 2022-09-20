<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Models\Video;

class VideoController extends Controller
{
    public function videos()
    {
        return view('category.index', [
            'categoryItems' => (new VideoResource(Video::with('user')->paginate(12)))->toArray(null), 'category' => 'videos'
        ]);
    }
}
