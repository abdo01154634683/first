<?php
namespace App\Http\Controllers\global;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class TestController extends Controller
{
    public function display(){
        echo 'hello every body';
    }
}
