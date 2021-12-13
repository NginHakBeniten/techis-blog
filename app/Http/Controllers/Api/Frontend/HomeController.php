<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(Request $request, $tag = null, $article = null)
    {
        $pathInfo = explode('/', $request->getPathInfo());


        dd($request);

        $method    = $request->getMethod();
        $pathInfo  = $request->getPathInfo();
        $routeName = app()->router->namedRoutes;

        // $request->is('admin/');

        switch($routeName) {
            case 'index':
                return 1;
            case 'tag.index':
                return 2;
        }

        dd($routeName);
        // $metaData = [

        // ]

        // if (isset($pathInfo['2']) && !empty($pathInfo['2'])) {
            
        // }

        return view('frontend.app');
    }
}
