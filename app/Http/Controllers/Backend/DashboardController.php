<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){
    }
    
    private function config(){
        return [
            'js'=>[
                '/assets/js/plugins/flot/jquery.flot.js',
                '/assets/js/plugins/flot/jquery.flot.tooltip.min.js',
                '/assets/js/plugins/flot/jquery.flot.spline.js',
                '/assets/js/plugins/flot/jquery.flot.resize.js',
                '/assets/js/plugins/flot/jquery.flot.pie.js',
                '/assets/js/plugins/flot/jquery.flot.symbol.js',
                '/assets/js/plugins/flot/jquery.flot.time.js',
                '/assets/js/plugins/peity/jquery.peity.min.js',
                '/assets/js/demo/peity-demo.js',
                '/assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                '/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                '/assets/js/plugins/easypiechart/jquery.easypiechart.js',
                '/assets/js/plugins/sparkline/jquery.sparkline.min.js',
                '/assets/js/demo/sparkline-demo.js'
            ]
        ];
    }
    
    public function index(){

        // dd(config('app.locale'));
        $config = $this->config();
        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config'
        ));
    }
}
