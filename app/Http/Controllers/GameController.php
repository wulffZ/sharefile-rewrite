<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function games()
    {
        return view('category.index', [
            'categoryItems' => (new GameResource(Game::with('user')->paginate(12)))->toArray(null), 'category' => 'games'
        ]);
    }
}
