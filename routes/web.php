<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BikeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactoController;
use Illuminate\Http\Request;




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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[WelcomeController::class,'index'])->name('portada');



Route::delete('/bikes/purgue',[BikeController::class,'purgue'])
->name('bikes.purgue');


Route::get('/bikes/{bikes}/restore',[BikeController::class,'restore'])
->name('bikes.restore');

Route::resource('bikes',BikeController::class);

Route::get('bikes/{bike}/delete',[BikeController::class, 'delete'])
->name('bikes.delete');


Route::get('/contacto',[ContactoController::class, 'index'])
        ->name('contacto');

Route::post('/contacto',[ContactoController::class, 'send'])
        ->name('contacto.email');

//  Route::get('/ver/portada',[WelcomeController::class,'index']);
//  Route::get('/ver/portada',[WelcomeController::class,'index']);
//  Route::get('/ver/{bike}',[BikeController::class,'show']);
        


 Route::get('image',function(Request $request){
     
     return response()->download('img/bikes/bike0.png','CanedaBikes.png');
     
 });
 
     
     
 Route::match(['GET','POST'],'/bikes/search',[BikeController::class,'search'])
 ->name('bikes.search');
 
 
 Route::get('/prueba',function(Request $request){
     
     $respuesta = "PATH: ".$request->path()."<br>" ;
     $respuesta .= "URL: ".$request->url()."<br>" ;
     
     $respuesta .= "FULLURL: ".$request->fullUrl()."<br>" ;
     
     $respuesta .= "IP CLIENTE: ".$request->getClientIp()."<br>" ;
     return $respuesta;
 });
     
 Route::get('readme/download',function(Request $request){
             
             return response()->download(base_path('README.md'));
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes(['verify'=>true]);

 
       
Route::get('/chnk',function(){
    
    \App\Models\Shop::chunk(2,function($pedazo){
    
        foreach($pedazo as $tienda){
            echo $tienda->nombre."<br>";
            echo $tienda->poblacion."<br>";
            echo "------------------------------------<br>";
        }
    });
});















