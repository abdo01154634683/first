<?php

namespace App\Http\Controllers\Global;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Test2 extends Controller
{
    public function getData(){
        return Offer::get();
    }
    public function callView(){
        //array of data to view
        $data=[];
        $data['name']='abdo';
        $data['age']=28;
        // object of data to view
        $object=new \stdClass();
        $object->name='sayed';
        $object->age=40;
        return view('welcome',['data'=>['abdo','ahmed','abdo']]);
        //return view('front\sendDataToViewFromRout',$data,compact('object'));
    }
    public function callViewContainCondition(){
        $name=['name'=>'ahmed'];
        $info=['ahmed','sayed','hassan'];
        return view('front\sendDataToViewFromRout',compact('info'),$name);
    }
    public function redirectToLogin(){
       return redirect()->route('login');
    }
    public function print(){
        return 'print function';
    }
    public function callLanding(){
        return view('landinge');
    }
}
