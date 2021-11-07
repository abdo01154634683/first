<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class middlewareController extends Controller
{
    public function __construct(){
        //make middleware on all controller except show1 and show2
        $this->middleware('auth')->except('show2','show1');
    }
    public function show1(){
        return 'show1';
    }
    public function show2(){
        return 'show2';
    }
    public function show3(){
        return 'show3';
    }
}
