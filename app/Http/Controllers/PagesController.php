<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('CheckPermission');
    }
    public function about_us(){
    	echo "About us";
    }
    public function contact_us(){
    	echo "Contact us";
    }
    public function privacy(){
    	echo "Privacy";
    }
    public function terms(){
    	echo "Terms";
    }
}
