<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('CheckPermission');
    }
    public function index(){
		echo "Posts Listing";
    	die;
    }
}
