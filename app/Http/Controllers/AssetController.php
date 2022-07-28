<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {

        $results = Asset::select('*')
            ->where('user_id', '=', auth()->user()->id)
            ->paginate(20);
        return view("assets.index", ["assets" => $results]);
    }
}