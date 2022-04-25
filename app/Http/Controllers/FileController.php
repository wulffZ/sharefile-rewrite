<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use FFMpeg\Media\Frame;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    }

    public static function handleVideo($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required'
        ]);

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $request->file->getClientOriginalExtension();
        $thumbnail_uri = $uri. '.png';

        $video = $request->file;

        $size = $request->file->getSize();

        $video_path = Storage::putFileAs('videos', $video, $file_uri);
        self::saveThumbnailFromVideo($video_path, $thumbnail_uri);

        Video::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => $thumbnail_uri,
            'soft_delete' => false
        ]);
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

    private static function saveThumbnailFromVideo($video_path, $thumbnail_uri)
    {
        FFMpeg::open($video_path)
            ->getFrameFromSeconds(2)
            ->export()
            ->toDisk('public')
            ->save('thumbnails/'.$thumbnail_uri);
    }
}
