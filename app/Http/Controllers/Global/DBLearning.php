<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DBLearning extends Controller
{
    //function that insert constant data in database
    public function insertInDB(){
        Offer::create(
            [
                'name'=>'جزمه',
                'price'=>'20',
                'details'=>'روعه'
            ]
        );
    }

    //function that call form view
    public function callView(){
        return view('database.storeForm');
    }
    //function that take form data to store data in database table
    public function store(Request $request){
        //validate data before insert in database
        /*
             * make() method take array of data that get from request and array of rule and array of messages
             * to convert request to array use all method
         */
        $rules=[
            'offer_name'=>'required|max:11|unique:offers,name',
            'offer_price'=>'required|numeric',
            'offer_details'=>'required'
        ];
        $messages=[
          'offer_name.required'=> __('messages.offer_name_required'),
          'offer_name.unique'=> __('messages.offer_name_unique'),
          'offer_name.max'=> __('messages.offer_name_max'),
          'offer_price.numeric'=> __('messages.offer_price_numeric'),
          'offer_price.required'=> __('messages.offer_price_required'),
            'offer_details.required'=> __('messages.offer_details_required')
        ];

        $validator=Validator::make(
            $request->all(),$rules,$messages
        );
        //if statement check if input field violated the rules
        if($validator->fails()){
            //to return the first error message return $validator->errors()->first();
           // return $validator->errors(); //return all error messages
            //return where come it from 'return to form that come from it and with validator and array of data'
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        //insert data in database
        Offer::create([
            //offer_name is input field name
           'name'=>$request->offer_name,
            //offer_price is input field name
           'price'=>$request->offer_price,
            //offer_details is input field name
           'details'=>$request->offer_details
        ]);
        //return to previous page 'and the previous in this case is storeForm view'
        return redirect()->back()->with(['success'=>__('messages.success')]);
    }
}
