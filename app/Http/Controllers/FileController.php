<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Game;
use App\Models\Music;
use App\Models\Other;
use App\Models\Software;
use App\Models\Video;

class FileController extends Controller
{
    public static function upload($category)
    {
        return view('file.upload', ['category' => $category]);
    }

    // Load views

    public static function show($category, $id)
    {
        switch($category) {
            case "videos":
                $categoryItem = Video::with('user')->find($id);
                break;
            case "games":
                $categoryItem = Game::with('user')->find($id);
                break;
            case "software":
                $categoryItem = Software::with('user')->find($id);
                break;
            case "music":
                $categoryItem = Music::with('user')->find($id);
                break;
            case "others":
                $categoryItem = Other::with('user')->find($id);
                break;

            default:
                $categoryItem = null;
        }


        $categoryItem->size = self::bytesToHuman($categoryItem->size);
        $categoryItem->temporaryUrl = Storage::temporaryUrl($categoryItem->file_uri, now()->addHour(2));

        return view('file.show', ['category' => $category, 'categoryItem' => $categoryItem]);
    }

    // Handle uploads

    public static function uploadPost(Request $request, $category)
    {
        switch($category) {
            case "video":
                return self::handleVideo($request);
            case "game":
                return self::handleGame($request);
            case "software":
                return self::handleSoftware($request);
            case "music":
                return self::handleMusic($request);
            case "other":
                return self::handleOther($request);
        }
    }

    public static function handleVideo($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required',
        ]);

        $video = $request->file('file');

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $video->getClientOriginalExtension();
        $thumbnail_uri = $uri. '.png';

        $size = $video->getSize();

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

        return response(["return_uri" => route("file.show", ["category" => "videos", "id" => $video->id])]);
    }

    public static function handleGame($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required'
        ]);

        $game = $request->file('file');

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $game->getClientOriginalExtension();
        $thumbnail_uri = $uri. '.png';

        $size = $game->getSize();

        Storage::putFileAs('files/games', $game, $file_uri);

        if (is_null($request->thumbnail) === false) {
            Storage::putFileAs('public/thumbnails', $request->thumbnail, $thumbnail_uri);
        }

        $game = Game::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'developer' => is_null($request->developer) ? null : $request->developer,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => is_null($request->thumbnail) ? null : $thumbnail_uri,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "games", "id" => $game->id])]);
    }

    public static function handleSoftware($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required',
        ]);

        $software = $request->file('file');

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $software->getClientOriginalExtension();
        $thumbnail_uri = $uri . '.png';

        $size = $software->getSize();

        Storage::putFileAs('files/software', $software, $file_uri);

       if (is_null($request->thumbnail) === false) {
            Storage::putFileAs('public/thumbnails', $request->thumbnail, $thumbnail_uri);
        }

        $software = Software::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'developer' => is_null($request->developer) ? null : $request->developer,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => is_null($request->thumbnail) ? null : $thumbnail_uri,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "software", "id" => $software->id])]);
    }

    public static function handleMusic($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'file' => 'required',
        ]);

        $music = $request->file('file');

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.' . $music->getClientOriginalExtension();
        $thumbnail_uri = $uri . '.png';

        $size = $music->getSize();

        Storage::putFileAs('files/music', $music, $file_uri);

        if (is_null($request->thumbnail) === false) {
            Storage::putFileAs('public/thumbnails', $request->thumbnail, $thumbnail_uri);
        }

        $music = Music::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'artist' => $request->artist,
            'size' => $size,
            'file_uri' => $file_uri,
            'thumbnail_uri' => is_null($request->thumbnail) ? null : $thumbnail_uri,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "music", "id" => $music->id])]);
    }

    public static function handleOther($request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            'file' => 'required',
        ]);

        $other = $request->file('file');

        $uri = auth()->id() . '_' . time();
        $file_uri = $uri . '.'. $other->getClientOriginalExtension();

        $size = $other->getSize();

        Storage::putFileAs('files/other', $other, $file_uri);

        $other = Other::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'size' => $size,
            'file_uri' => $file_uri,
            'soft_delete' => false
        ]);

        return response(["return_uri" => route("file.show", ["category" => "others", "id" => $other->id])]);
    }

    private static function bytesToHuman($bytes): string
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    private static function saveThumbnailFromVideo($video_path, $thumbnail_uri)
    {
        FFMpeg::open($video_path)
            ->getFrameFromSeconds(0.01)
            ->export()
            ->toDisk('public')
            ->save('thumbnails/'.$thumbnail_uri);
    }
}
