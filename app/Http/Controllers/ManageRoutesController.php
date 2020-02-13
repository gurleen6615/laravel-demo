<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ManageRoutesController extends Controller
{
    //
    public function getAllControllers(){
    	$routes = Route::getRoutes()->getRoutes();
    	$controllers = array();
    	foreach ($routes as $route){
		    $action = $route->getAction();

		    if (array_key_exists('controller', $action))
		    {
		        // You can also use explode('@', $action['controller']); here
		        // to separate the class name from the method
		        $controllers[] = $action['controller'];
		    }
		}
    	return $controllers;
    }
}
