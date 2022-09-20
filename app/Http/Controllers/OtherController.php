<?php

namespace App\Http\Controllers;

use App\Http\Resources\OtherResource;
use App\Models\Other;

class OtherController extends Controller
{
    public function other()
    {
        return view('category.index', [
            'categoryItems' => (new OtherResource(Other::with('user')->paginate(12)))->toArray(null), 'category' => 'other'
        ]);
    }
}
