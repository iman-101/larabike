<?php

namespace App\Http\Controllers;




use App\Models\Bike;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\BikeRequest;
use App\Http\Requests\BikeUpdateRequest;


class BikeController extends Controller
{
    
    
    public function __construct(){
        
//         $this->middleware('auth')->except('index','show','search');
        // $this->middleware('verified')->except('index','show','search');
        
        $this->middleware('verified')->only('create');
        $this->middleware('password.confirm')->only('destroy');
        
    }
    public function index()
    {
      //  $bikes = Bike::orderBy('id','DESC')->paginate(config('pagination.bikes',10));
        $bikes = Bike::orderBy('id','DESC')->paginate(10);
        //$total = Bike::count();
        
      //  return view('bikes.list',['bikes'=>$bikes,'total'=>$total]);
        return view('bikes.list',['bikes'=>$bikes]);
    }

   
    public function create()
    {
        return view('bikes.create');
    }

   
    public function store(BikeRequest $request)
    {
    
        
//         $bike = Bike::create($request->all());

        $datos =$request->only(['marca','modelo','precio',
                              'kms','matriculada','matricula','color']);
        
        $datos +=['imagen'=> NULL];
        
        if($request->hasFile('imagen')){
            
            $ruta = $request->file('imagen')->store(config('filesystems.bikesImageDir'));
        
            $datos['imagen'] = pathinfo($ruta, PATHINFO_BASENAME);
        
        }
        
        
        $datos['user_id'] = $request->user()->id;
        
        $bike = Bike::create($datos);
        
        return redirect()
              ->route('bikes.show',$bike->id)
               ->with('success',"Moto $bike->marca $bike->modelo añadida satisfactoriamente")
               ->cookie('lastInsertId',$bike->id,0);
    
    
    }


    public function show(Bike $bike)
    {
     //   $bike =Bike::findOrFail($id);
        return view('bikes.show',['bike'=>$bike]);
    }

    
    public function edit(Request $request,Bike $bike)
    {
       // $bike = Bike::findOrFail($id);
        if($request->user()->cant('update', $bike)){
            
            abort(401, 'No puedes borrar una moto que no es tuya');
        }
        
        return view('bikes.update',['bike'=>$bike]);
    }

   
    public function update(BikeUpdateRequest $request, Bike $bike)
    {
        if($request->user()->cant('update', $bike)){
            
            abort(401, 'No puedes borrar una moto que no es tuya');
        }
        
     
       //  $bike =Bike::findOrFail($id);
       //    $bike->update($request->all()+['matriculada'=>0]);
      
       //     Cookie::queue('lastUpdateID',$bike->id,0);
       //     Cookie::queue('lastUpdateDate',now(),0);

        $datos= $request->only('marca','modelo','kms','precio');
        
        $datos['matriculada']= $request->has('matriculada') ? 1: 0;
        $datos['matricula']= $request->has('matriculada') ?$request->input('matricula') : NULL;
        $datos['color']= $request->input('color')?? NULL;
        
        if($request->hasFile('imagen')){
            
            if($bike->imagen)
                $aBorrar = config('filesystems.bikesImageDir').'/'.$bike->imagen;
      
            
            $imagenNueva=$request->file('imagen')->store(config('filesystems.bikesImageDir'));
        
          $datos['imagen'] =pathinfo($imagenNueva, PATHINFO_BASENAME);
        }
        
        if($request->filled('eliminarimagen') && $bike->imagen){
            $datos['iamgen']=NULL;
            $aBorrar=config('filesystems.bikesImageDir').'/'.$bike->imagen;
        }
        
        //si todo va bien
        
        if($bike->update($datos)){
            if(isset($aBorrar))
                Storage::delete($aBorrar);
        }else{
            if(isset($imagenNueva))
                Storage::delete($imagenNueva);
        }
        
        return back()->with('success',"Moto $bike->marca $bike->modelo actualizada");
    }
    public function delete(Request $request, Bike $bike){
        
     //   $bike = Bike::findOrFail($id);
        if($request->user()->cant('delete', $bike)){
            
            abort(401, 'No puedes borrar una moto que no es tuya');
        }
        return view('bikes.delete',['bike'=>$bike]);
    }
  
    public function destroy(Request $request,Bike $bike)
    {
//         $bike = Bike::findOrFail($id);
//         $bike->delete();
        if($request->user()->cant('delete', $bike)){
            
            abort(401, 'No puedes borrar una moto que no es tuya');
        }
      
        if($bike->delete() && $bike->imagen){
            Storage::delete(config('filesystems.bikesImageDir').'/'.$bike->imagen);
        }
        
        return redirect('/bikes')
        ->with('success',"Moto $bike->marca $bike->modelo eleminada");
    }
    
    public function search(Request $request){
        
        $request->validate([
            
            'marca'=>'max:16',
            'modelo'=>'max:16',
          
        ]);
        
        $marca=$request->input('marca','');
        $modelo=$request->input('modelo','');
        
        $bikes= Bike::where('marca','like',"%$marca%")
                      ->where('modelo','like',"%$modelo")
                      ->paginate(config('paginator.bikes'))
                      ->appends(['marca'=>$marca,'modelo'=>$modelo]);
        
                      return view('bikes.list',['bikes'=>$bikes,'marca'=>$marca,'modelo'=>$modelo]);
    }
    
}
