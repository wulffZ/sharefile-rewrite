<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Music;
use App\Models\Other;
use App\Models\Software;
use App\Models\Video;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public static function upload($category)
    {
        return view('file.upload', ['category' => $category]);
    }

    public static function show($category, $id)
    {
        switch($category) {
            case "video":
                $file = Video::find($id);
                break;
            case "game":
                $file = Game::find($id);
                break;
            case "software":
                $file = Software::find($id);
                break;
            case "music":
                $file = Music::find($id);
                break;
            case "other":
                $file = Other::find($id);
                break;
        }

        return $file;
    }

    public static function uploadPost(Request $request, $category)
    {
        switch($category) {
            case "video":
                return self::handleVideo($request);
                break;
            case "game":
                return self::handleGame($request);
                break;
            case "software":
                return self::handleSoftware($request);
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

        $video = Video::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => $thumbnail_uri ?? null,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "video", "id" => $video->id])]);
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
            $thumbnail_uri = $uri . '.png';
            Storage::putFileAs('public/thumbnails', $request->thumbnail, $thumbnail_uri);
        }

        if ($request->filled('genres')) {
            $genres = explode(",", $request->genres);
            $genres = json_encode($genres);
        }

        $game = Game::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'developer' => $request->filled('developer') ? $request->developer : null,
            'genres' => $request->filled('genres') ? $genres : null,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => $request->has('thumbnail') ? $thumbnail_uri : null,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "game", "id" => $game->id])]);
    }

    public static function handleSoftware($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required',
        ]);

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.' . $request->file->extension();

        $software = $request->file;

        $size = $request->file->getSize();

        $software_path = Storage::putFileAs('files/software', $software, $file_uri);

        if ($request->has('thumbnail')) {
            $thumbnail_uri = $uri . '.png';
            Storage::putFileAs('public/thumbnails', $request->thumbnail, $thumbnail_uri);
        }

        if ($request->filled('types')) {
            $types = explode(",", $request->types);
            $types = json_encode($types);
        }

        $software = Software::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'developer' => $request->filled('developer') ? $request->developer : null,
            'types' => $request->filled('types') ? $types : null,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => $request->has('thumbnail') ? $thumbnail_uri : null,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "software", "id" => $software->id])]);
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
