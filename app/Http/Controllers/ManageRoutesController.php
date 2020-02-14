<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ManageRoutesController extends Controller{

	public function __construct(){
        $this->middleware('CheckPermission');
    }

    
    public function getAllControllers(){
    	$routes = Route::getRoutes()->getRoutes();
    	$controllers = array();
    	foreach ($routes as $key=>$route){
		    $action = $route->getAction();
		    if (array_key_exists('controller', $action)){
		        $c_array = explode('\\',$action['controller']);
		        if($c_array[0]=="App" && !in_array('Auth',$c_array) ){
		        	$end = explode("@", end($c_array));
		        	$controllers[$key]['controller'] = $end[0];
		        	$controllers[$key]['action'] = $end[1];
		        }
		    }
		}
    	return array_values($controllers);
    }
}
