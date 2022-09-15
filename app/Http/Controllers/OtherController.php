<?php

namespace App\Http\Controllers;

use App\Http\Resources\OtherResource;
use App\Models\Other;

class OtherController extends Controller
{
    public function other()
    {
        return view('category.other', [
            'other' => (new OtherResource(Other::with('user')->paginate(12)))->toArray(null)
        ]);
    }
}
