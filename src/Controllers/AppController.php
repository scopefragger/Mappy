<?php

namespace Scopefragger\Mappy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Scopefragger\Mappy\Models\Urls;

class AppController extends Controller
{

    public function index(Request $request)
    {
        $current = $request->route()->getPath();
        $url = Urls::firstOrCreate(['url' => $current]);
        dd($url);
    }
}
