<?php

namespace Scopefragger\Mappy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Scopefragger\Mappy\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AppController
 * @package Scopefragger\Mappy\Controllers
 */
class AppController extends Controller
{

    /**
     * @var string
     */
    protected $strip = '';

    /**
     * @var string
     */
    protected $enabled = '';

    /**
     * @var string
     */
    protected $disableAuthed = '';

    /**
     * @var array
     */
    protected $blacklist = [];

    /**
     * @var string
     */
    protected $currentUrl = '';

    /**
     * @var string
     */
    protected $compleateUrl = '';

    /**
     * AppController constructor.
     */
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
     * @return bool
     */
    public function validate()
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
    }

    /**
     * Outputs XML
     * -------------------------------
     * Outputs a structured,  formatted XML page based on
     * the URL's save in the database
     */
    public function output()
    {
        return $this->construct();
    }

    /**
     * Constructs URL for saving
     *
     * Runs the url against the users specified config rules,  cleans it up
     * and prepares it, and then compleates by saving the url into the DB
     *
     * @return void
     */
    public function constructUrl()
    {
        if (!$this->validate()) {
            return;
        }

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
        $this->saveUrl($url);
    }


    /**
     * Saves URL to the DB
     *
     * Saves the cleaned URL into the DB utilising the first or
     * create method,  preventing duplicate entry's
     *
     * @return void
     */
    public function saveUrl($url)
    {
        $urls = Urls::firstOrCreate(['url' => $url]);
        $urls->url = $url;
        $urls->save();
    }


    /**
     * @return string
     */
    public function construct()
    {
        $urls = Urls::all();
        $output = "";
        $domain = url('');
        if (!empty($urls)) {
            foreach ($urls as $row) {
                $output .= "    <url>\n    <loc>" . $domain . ($row->url) . "</loc>\n</url>\n";
            }
            $output = $this->wrapper($output);

        }
        return $output;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function wrapper($input)
    {
        $new = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
            . "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"
            . $input
            . "</urlset>";
        return Response::make($new, '200')->header('Content-Type', 'text/xml');

    }
}
