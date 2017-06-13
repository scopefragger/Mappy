<?php
namespace Scopefragger\Mappy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Scopefragger\Mappy\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Scopefragger\Mappy\Services\MappyService;

/**
 * Class AppController
 * @package Scopefragger\Mappy\Controllers
 */
class MappyController extends Controller
{

    /**
     * Outputs XML
     * -------------------------------
     * Outputs a structured,  formatted XML page based on
     * the URL's save in the database
     */
    public function sitemap()
    {
        $mappy = new MappyService();
        return $mappy->construct();
    }
}