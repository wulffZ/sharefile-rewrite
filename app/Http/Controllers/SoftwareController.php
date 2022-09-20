<?php

namespace App\Http\Controllers;

use App\Http\Resources\SoftwareResource;
use App\Models\Software;

class SoftwareController extends Controller
{
    public function software()
    {
        return view('category.index', [
            'categoryItems' => (new SoftwareResource(Software::with('user')->paginate(12)))->toArray(null), 'category' => 'software'
        ]);
    }
}
