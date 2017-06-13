<?php

namespace Scopefragger\Mappy\Services;

use Illuminate\Support\Facades\Response;
use Scopefragger\Mappy\Models\Urls;
use Illuminate\Support\Facades\Auth;

/**
 * Class MappyService
 *
 * Service is utilised by the MappyMiddleware to generate the urls based on the rules
 * provided in the Mappy config file.
 *
 * @package Scopefragger\Mappy\Controllers
 */
class MappyService
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
     *
     * Grabs the config values and sets them as local values
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
     * Runs validation against the url
     *
     * Validation is run against the url to ensure that the route can
     * be saved into the database based on the current global rules
     * and the rules for the individual user
     *
     * @return bool
     */
    public function validation()
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

        return true;
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
     * @return bool
     */
    public function construct()
    {

        if (!$this->validation()) {
            return false;
        }

        /** Executes the rules ourlined in the config */
        $url = str_replace($this->strip, '', $this->currentUrl);
        $prePost = explode('?', $url);
        $url = $prePost[0];
        if (!empty($this->blacklist)) {
            foreach ($this->blacklist as $row) {
                if (strpos($url, $row) >= -1) {
                    return false;
                }
            }
        }

        $this->save($url);
        return true;
    }


    /**
     * Saves URL to the DB
     *
     * Saves the cleaned URL into the DB utilising the first or
     * create method,  preventing duplicate entry's
     *
     * @param string
     * @return void
     */
    public function save($url)
    {
        $urls = Urls::firstOrCreate(['url' => $url]);
        $urls->url = $url;
        $urls->save();
    }


    /**
     * Build the wrapper for the XML output
     *
     * @param $input
     */
    public function wrapper($input)
    {
        $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"
                .   "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"
                        . $input
                . "</urlset>";
        return Response::make($output, '200')->header('Content-Type', 'text/xml');

    }
}
