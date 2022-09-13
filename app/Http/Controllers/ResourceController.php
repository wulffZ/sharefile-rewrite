<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function loadVideo($id): string
    {
        $video = Video::findOrFail($id);

        return Storage::temporaryUrl(
            $video->file_uri, now()->addMinutes(5)
        );
    }
}
