<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Video;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public static function showUpload($category)
    {
        return view('upload', ['category' => $category]);
    }

    public static function upload(Request $request, $category)
    {
        switch($category) {
            case "video":
                return self::handleVideo($request);
                break;
            case "game":
                return self::handleGame($request);
                break;
            case "software":
                self::handleSoftware($request);
                break;
            case "music":
                return self::handleMusic($request);
                break;
            case "other":
                return self::handleOther($request);
                break;
        }
    }

    public static function handleVideo($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required'
        ]);

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $request->file->extension();
        $thumbnail_uri = $uri. '.png';

        $video = $request->file;

        $size = $request->file->getSize();

        $video_path = Storage::putFileAs('files/videos', $video, $file_uri);
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

        return reponse(["return_uri" => "uri"]);
    }

    public static function handleGame($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required',
        ]);

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.' . $request->file->extension();

        $game = $request->file;

        $size = $request->file->getSize();

        $game_path = Storage::putFileAs('files/games', $game, $file_uri);

        if ($request->has('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $thumbnail_uri = $uri . '.png';
            self::saveThumbnailFromVideo($game_path, $thumbnail_uri);
        }

        $game = Game::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => $thumbnail_uri,
            'soft_delete' => false
        ]);

        return response(["redirect_uri" => "uri"]);
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
