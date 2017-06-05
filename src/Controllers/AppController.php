<?php

namespace scopefragger\mappy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use scopefragger\mappy\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{

    protected $strip = '';
    protected $enabled = '';
    protected $disableAuthed = '';
    protected $blacklist = [];
    protected $currentUrl = '';
    protected $compleateUrl = '';

    public function __construct()
    {
        $this->strip = config('mappy.strip');
        $this->blacklist = config('mappy.blacklist');
        $this->enabled = config('mappy.enabled');
        $this->disableAuthed = config('mappy.disabled_authed');
        $this->currentUrl = \Request::getRequestUri();
        $this->compleateUrl = '';
    }

    /**
     * index();
     * -------------------------------
     * Core function ran on __boot();
     * Collates the URL based on the path provided by Laravel
     * Cleans URL based on rules provided in the config file
     */
    public function index()
    {

        /** Catch the plugin being disabled */
        if ($this->enabled == false) {
            return false;
        }

        /** Catch the plugin being disabled for logged in users */
        if (!empty($this->disableAuthed) && $this->disableAuthed == true) {
            if (Auth::check() == true) {
                return false;
            }
        }

        $url = $this->constructUrl();
        $this->saveUrl($url);
    }

    /**
     * output();
     * -------------------------------
     * Outputs a structured,  formatted XML page based on
     * the URL's save in the database
     */
    public function output()
    {
        return $this->construct();
    }

    /**
     * constructUrl()
     * -------------------------------
     * Constructs the for the index(); function
     * Utilises the rules as defined in th config.php
     * @return String/Bool $url
     */
    public function constructUrl()
    {
        $url = str_replace($this->strip, '', $this->currentUrl);
        $prePost = explode('?', $url);
        $url = $prePost[0];
        if (!empty($this->blacklist)) {
            foreach ($this->blacklist as $row) {
                if (strpos($url, $row) >= -1) {
                    return true;
                }
            }
        }
        return $url;
    }

    /**
     * saveUrl()
     * -------------------------------
     * Saves the cleaned url to the DB
     */
    public function saveUrl($url)
    {
        $urls = Urls::firstOrCreate(['url' => $url]);
        $urls->url = $url;
        $urls->save();
    }


    public function construct()
    {
        $urls = Urls::all();
        $output = "";
        $domain = config('mappy.domain');
        if (!empty($urls)) {
            foreach ($urls as $row) {
                $output .= "    <url>\n    <loc>" . $domain . ($row->url) . "</loc>\n</url>\n";
            }
            $output = $this->wrapper($output);

        }
        return $output;
    }

    public function wrapper($input)
    {
        $new = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
            . "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"
            . $input
            . "</urlset>";
        return Response::make($new, '200')->header('Content-Type', 'text/xml');

    }
}
