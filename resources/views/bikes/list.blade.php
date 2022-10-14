@extends('layouts.master')
@section('log')
@section('titulo','Lista de motos') 
@section('contenido')


           
           <div class="row">
              <div class="col-6 test-start">{{ $bikes->links() }} </div>
              @auth
            <div class="col-6 text-end">
            
                <p>Nueva moto <a href="{{route('bikes.create')}}" class="btn btn-success ml-2">+</a></p>
            </div>
            @endauth
            
            <form method="GET" action="{{route('bikes.search')}}" class="col-6 row"
            >
             
            
               <input name="marca" type="text" class="col form-control mr-2 mb-2"
               placeholder="marca" maxlength="16" requied value="{{empty($marca)? '' : $marca}}">
               
                <input name="modelo" type="text" class="col form-control mr-2 mb-2"
               placeholder="modelo" maxlength="16"  value="{{empty($modelo)? '' : $modelo}}">
              
               <button type="submit" class="col btn btn-primary mr-2 mb-2">Buscar</button>
               <a href="{{route('bikes.index')}}">
                  <button type="button" class="col btn btn-primary mb-2">Quitar filtro</button>
               
               </a>
            </form>
            
            
            
            <table class="table table-striped table-bordered">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Color</th>
                <th>Operaciones</th>
              </tr>
            
              @forelse($bikes as $bike)
              <tr>
                  <td>{{$bike->id}}</td>
                  <td class="text-center" style="max-width:80px">
                     <img class="rounded" style="max-width:80%"
                     
                     alt="Imagen de {{$bike->marca}} {{$bike->modelo}}"
                     titule="Image de {{$bike->marca}} {{$bike->modelo}}"
                     src="{{$bike->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$bike->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                  
                  
                  
                  </td>
                  <td>{{$bike->marca}}</td> 
                  <td>{{$bike->modelo}}</td>
                  <td>{{$bike->matricula}}</td>
                  <td style="background-color:{{$bike->color}}">{{$bike->color}}</td>
                    <td class="text-center">
                    
                       <a  href="{{route('bikes.show',$bike->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
                       </a>
                       @auth
                        <a  href="{{route('bikes.edit',$bike->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/update.png')}}"
                          alt="Modificar" title="Modificar">
                       </a>
                       
                        <a  href="{{route('bikes.delete',$bike->id)}}">
                         <img height="30" width="30" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                       
                       @endauth
                    </td>
                    </tr>
                      @if($loop->last)
                        <tr>
                            <td colspan="7">
                              Mostrando{{sizeof($bikes)}}
                               de {{$bikes->total()}}
                             </td>
                        </tr>
                          
                 
                      @endif
                      
               @empty
                 <tr>
                    <td colspan="4">No hay resultados que mostrar</td>
                   
                 </tr>
                     
                 @endforelse
             
            </table>
            <div class="btn-group" role="group" label="Links">
                <a href="{{url('/')}}" class="btn btn-primary mr-2">Inicio</a>
            </div>
           </div>
           
    @endsection
   @section('enlaces')
      @parent
      <a href="{{route('bikes.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection
