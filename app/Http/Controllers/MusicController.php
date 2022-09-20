<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;
use App\Models\Music;


class MusicController extends Controller
{
    public function music()
    {
        return view('category.index', [
            'categoryItems' => (new MusicResource(Music::with('user')->paginate(12)))->toArray(null), 'category' => 'music'
        ]);
    }
}
