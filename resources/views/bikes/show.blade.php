@extends('layouts.master')
@section('log')
@section('titulo',"Detalles de la moto $bike->marca $bike->modelo ") 
@section('contenido')


           
                <table class="table table-striped table-bordered">
              <tr>
                <td>ID</td>
                <td>{{$bike->id}}</td>
             </tr>
             <tr>
                <td>Modelo</td>
                <td>{{$bike->marca}}</td>
              </tr>
              <tr>
              
                  <td>Precio</td>
                  <td>{{$bike->precio}}</td>
              </tr>
                <tr>
              
                  <td>Kms</td>
                  <td>{{$bike->kms}}</td>
              </tr>
                <tr>
              
                  <td>Matriculada</td>
                  <td>{{$bike->matriculada? 'SI' : 'NO'}}</td>
               
              </tr>
             
              @if($bike->matriculada)
               <tr>
                  <td>Matricula</td>
                  <td>{{$bike->matricula}}</td>
               </tr>
               @endif
               
               @if($bike->color)
                 <td>Color</td>
                 <td  style="background-color:{{$bike->color}}">{{$bike->color}}</td>
               @endif
              <tr>
                <td>Imagen</td>
                 <td>
                    <img class="rounded" style="max-width:400px"
                    
                    alt="Imagen de {{$bike->marca}} {{$bike->modelo}}"
                    title="Imagen de {{$bike->marca}} {{$bike->modelo}}"
                    src="{{$bike->imagen? 
                     asset('storage/'.config('filesystems.bikesImageDir')).'/'.$bike->imagen:
                        asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                 
                 </td>
              
              
              </tr>
              
             </table>
              <div class="text-end my-3">
                    <div class="btn-group mx-2">
                    
                       <a  href="{{route('bikes.show',$bike->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/show.png')}}"
                          alt="Ver detalles" title="Ver detalles">
                       </a>
                       
                        <a  href="{{route('bikes.edit',$bike->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/update.png')}}"
                          alt="Modificar" title="Modificar">
                       </a>
                       
                        <a  href="{{route('bikes.delete',$bike->id)}}">
                         <img height="20" width="20" src="{{asset('img/buttons/delete.png')}}"
                          alt="Borrar" title="Borrar">
                       </a>
                   </div>
             </div>
           
           

                @endsection
   @section('enlaces')
      @parent
      <a href="{{route('bikes.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection
