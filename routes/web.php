<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//the view call from controller not from route but write it in route to explain

Route::get('/', function () {
    return view('welcome');
});
Route::get('get',function(){
    return "hello in get route";
});
//route parameters
//required parameter varName in function paranthes the same name use in inside function but exist in route not must the same in function parenthes
route::get('test1/{num}',function($n){
    return $n;
});
//optional parameter
//$num=null  default value set if no value passed
route::get('test2/{par?}',function($num=null){
   if($num==null)
      return 'no value passed';
   else
       return $num;
});
//route name
//use name of route when write route in link not use it replace route
route::get('name',function(){
   return 'route name';
})->name('a');
//route namespace must be capital
//all route in this group will access any controllers inside this namespace folder
//Global is folder name that contain controllers that routes in this namespace can access its controllers only
route::namespace('Global')->group(function(){
    route::get('print','TestController@display');
});
route::namespace('Global')->group(function(){

});
//route prefix
/*
->route prefix vs namespace
->>prefix mean that more than route have the same prefix and used with group
->>namespace mean than more than route access controller in the same directory
 */
//this is the first approach of write prefix
route::prefix('user')->group(function(){
   route::get('show',function(){
        return 'hello every body';
   });
   route::get('thank',function(){
       return 'thank to allah';
   });
});
//this is the second approach of write prefix and is the best because useful with middleware
route::group(['prefix'=>'user'],function(){
    route::get('print',function(){
        return 'prefix inside group';
    });
});
//route that call redirectToLogin function
route::get('redirect','Global\Test2@redirectToLogin');
//route group with namespace and prefix and middleware
route::group(['namespace'=>'Global','prefix'=>'users','middleware'=>'auth'],function(){
    route::get('print','test2@print');
});
//middleware with one route
//auth is middleware in laravel that check if you log in if not will direct to log in page that you must crate it
route::get('print_middleware',function(){
    return 'middleware';
})->middleware('auth');

//middleware with group and prefix and this approach is the best
route::group(['prefix'=>'user','middleware'=>'auth'],function(){
    route::get('print',function(){
        return 'prefix inside group';
    });
});
///////
route::get('show','middlewareController@show3');
//login route must create name of it
route::get('login',function(){
   return 'must be login';
})->name('login');

//route resource and controller resource
/*
 * notes
 * to call index function write in browser new
 * to call create function write in browser new/create
 * to call edit function  write in browser new/required parameter/edit
 * to call show function write in browser new/required parameter
 */
route::resource('new','News');

//route to call controller test2 that contain function that call view
route::get('call','Global\Test2@callView');
//route call view and send one variable
route::get('print',function(){
    return view('welcome')->with('num',300);
});
//route call view and send array of variable
route::get('print_array',function(){
    //if you want print $data in view will throw not found exception but can print by using $keyName
    $data=['name'=>'ahmed','age'=>20,'salary'=>'2000$'];
    return view('front\sendDataToViewFromRout')->with($data);
});
//another way route call view and send array of variable
route::get('printVarOfArray',function(){
    $data=['name'=>'abdo','age'=>22];
    $message=['hello'=>'mohamed'];
    //returned format from compact function {'name':{'name':'abdo','age':22},'message':{'hello':'mohamed'}}
    return view('front\sendDataToViewFromRout', compact('data','message'));
});
//route call controller and controller send data to view
route::get('callController','Global\Test2@callView');
//route call function in controller
route::get('if_statement','Global\Test2@callViewContainCondition');

route::get('testing','Global\TestController@display');
//landing page route
route::get('landing','global\Test2@callLanding');
//database learning routes
route::group(['prefix'=>'offer'],function(){
    route::get('create','Global\DatabaseLearning@create');
    route::post('store','Global\DatabaseLearning@store');
});
//set when make "php artisan ui vue --auth" and contain reset and login and register verify password routes
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//database learning
route::group(['prefix'=>'offers'],function(){
    //the first route that write in url browser and that call controller methode that call view form
   route::get('insert','Global\DBLearning@callView') ;
   //the route that form request direct on it
   route::post('store','Global\DBLearning@store');
});

//mcamara learning
//note that group that contain mcamara prefix and middleware must not inside another group as throw not found route
//LaravelLocalization::setLocale() this code that get prefix if ar or en or any language
//'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] this middleware that set ar prefix or en  when delete from url"make redirect"
route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    route::group(['prefix'=>'offers'],function(){
        route::get('insert','Global\DBLearning@callView');
        route::post('store','Global\DBLearning@store');
    }) ;
});

