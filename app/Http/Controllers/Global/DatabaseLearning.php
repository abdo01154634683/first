<?php

namespace App\Http\Controllers\Global;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DatabaseLearning extends Controller
{
    public function __construct(){

    }
    public function create(){
        //model function to insert data to database where insert updated_at and created_at by default
       // Offer::create(['id'=>2,'name'=>'suger','price'=>'2$','details'=>'offer details']);
        return view('database.storeForm');
    }
    public function store(Request $request){
        //verify data
        $validator=Validator::make(
            //request to array
            $request->all(),[
                //associative array of rules
                'id'=>'required|unique:offers,id',
                'name'=>'required|max:70|unique:offers,name',
                'price'=>'required|numeric',
                'details'=>'required'
            ],
            //associative array of messages
            [
                //note __ == trans method
                'id.unique'=>trans('messages.id_unique'),
                'id.required'=>__('messages.id_required'),
                'name.unique'=>__('messages.name_unique'),
                'price.numeric'=>__('messages.price_numeric'),
                'details.required'=>__('messages.details_required')
            ]
        );
        if($validator->fails()){
            //return failer messages and to return first message use this sentax $validator->errors()->first();
            //return $validator->errors();
            //return to create form
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        //insert data into database
        Offer::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details
        ]);
        //the value returned in with function will store in session
        return redirect()->back()->with(['message'=>'creation done']);
    }
}
