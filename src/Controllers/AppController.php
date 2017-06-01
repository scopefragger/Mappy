<?php

namespace scopefragger\mappy\Controllers;

use App\Http\Controllers\Controller;
use scopefragger\mappy\Models\Urls;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {
        $current = \Request::getRequestUri();
        $url = Urls::firstOrCreate(['url' => $current]);
        $url->url = $current;
        $url->save();
    }

    public function output()
    {
        return $this->construct();
    }

    public function construct()
    {
        $urls = Urls::all();
        $output = "";
        foreach ($urls as $row) {
            $output .= "<url><loc>" . url($row->url) . "</loc></url>\n";
        }
        $output = $this->wrapper($output);
        return $output;
    }

    public function wrapper($input)
    {
        $new = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
            . "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"
            . $input
            . "</urlset>";
        return $new;
    }
}
