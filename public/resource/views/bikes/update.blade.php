@extends('layouts.master')
@section('log')
@section('titulo',"Actualizacion  de la moto $bike->marca $bike->modelo ") 
@section('contenido')

           
                 <form class="my-2 border p-5" method="POST" action="{{route('bikes.update',$bike->id)}}" enctype="multipart/form-data">
              
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="PUT">
                 <div class="form-group row">
                      <label for="inputMarca" class="col-sm-2 col-form-label">Marca</label>
                 
                        <input name="marca" type="text" class="up form-control col-sm-10" 
                        id="inputMarca" placeholder="Marca" maxlength="255" value="{{$bike->marca}}" required>
                 </div>
              
                 <div class="form-group row">
                      <label for="inputmodelo" class="col-sm-2 col-form-label">Modelo</label>
                 
                        <input name="modelo" type="text" class="up form-control col-sm-10" 
                        id="inputModelo" placeholder="Modelo" maxlength="255" value="{{$bike->modelo}}" required>
                 </div>
                 
                    <div class="form-group row">
                      <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
                 
                        <input name="precio" type="number" class="up form-control col-sm-10" 
                        id="inputPrecio" placeholder="Precio" maxlength="255" value="{{$bike->precio}}" min="0" step="0.01" required>
                 </div>
              
                <div class="form-group row">
                      <label for="inputkms" class="col-sm-2 col-form-label">Kms</label>
                 
                        <input name="kms" type="number" class="up form-control col-sm-10" 
                        id="inputKms" placeholder="Kms" value="{{$bike->kms}}" required>
                 </div>
                  <div class="form-group row my-3">
                     <div class="form-check col-sm-6">
                        <input name="matriculada" type="checkbox" class="form-check-input" 
                         value="1" id="chkMatriculada"  {{$bike->matriculada? "checked": ""}}  >
                         
                       <label for="chkMatriculada" class="form-check-label">Matriculada</label>
                     </div> 
                     <div class="form-check col-sm-6">
                      
                        <label for="inputMatricula" class="col-sm-2 form-label">Matricula</label>  
                        <input name="matricula" type="text" class="up form-control"
                            id="inputMatricula" maxLength="7" value="{{$bike->matricula}}">
                  
                      </div>   
                 </div>
                 
                 
                 
                  <div class="form-group row border p-3 my-3 bg-light">
                     <div class="form-check  col-sm-6">
                        <input type="checkbox" class="form-check-input" 
                         id="chkColor"  {{$bike->color? 'checked' : ''}}>
                         
                       <label class="form-check-label">Indicar el color</label>
                     </div>    
                 
                                   
                    <div class="form-check col-sm-6">
                      
                      <label for="inputColor" class="col-sm-2 form-label">Color</label>  
                      <input name="color" type="color" class="up form-control form-control-color"
                       id="inputColor" value="{{$bike->color?? '#FFFFFF'}}">
                 
                 </div>
                  </div>
                <div class="form-group row">
                   <div class="col-sm-9">
                      <label for="inputImage" class="col-sm-2 col-form-label">
                      {{$bike->imagen? 'Sustituir': 'Añadir'}} imagen
                      </label>
                 
                        <input name="imagen" type="file" class="form-control-file" 
                        id="inputImagen" >
                        
                        @if($bike->imagen)
                        <div class="form-check my-3">
                             <input name="eliminarimagen" type="checkbox" class="form-check-input" 
                        id="inputEliminar"  >
                        
                        <label for="inputEliminar" class="form-check-label">Eliminar imagen</label>
                        </div>
                        <script>
                           inputEliminar.onchange = function(){
                              inputImagen.disabled = this.checked;
                           }
                        </script>
                        @endif
                    </div>
                    <div class="col-sm-3">
                       <label>Imagen actual:</label>
                      <img class="rounded img-thumbnail my-3"
                         alt="Imagen de {{$bike->marca}} {{$bike->modelo}}"
                           title="Imagen de {{$bike->marca}} {{$bike->modelo}}"
                           src="{{$bike->imagen? asset('storage/'.config('filesystems.bikesImageDir')).'/'.$bike->imagen:
                          asset('storage/'.config('filesystems.bikesImageDir')).'/default.png'}}">
                    </div>
                 </div>
                 
                 
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Guardar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Restablecer</button>
                 </div>
              </form>
             <script>
              
                 inputMatricula.disabled =!chkMatriculada.checked;
                 
                 chkMatriculada.onchange=function(){
                     inputMatricula.disabled = !chkMatriculada.checked;
                 }
                 
                 inputColor.disabled =!chkColor.checked;
                 
                 chkColor.onchange=function(){
                     inputColor.disabled = !chkColor.checked;
                 }
              
              </script>
           
           <div class="text-end my-3">
              <div class="btn-group mx-2">
                 <a class="mx-2" href="{{route('bikes.show',$bike->id)}}">
                 <img height="50" width="50" src="{{asset('img/buttons/show.png')}}"
                    alt="Detalles" title="Detalles">
                 </a>
                 
                  <a class="mx-2" href="{{route('bikes.delete',$bike->id)}}">
                 <img height="50" width="50" src="{{asset('img/buttons/delete.png')}}"
                    alt="Borrar" title="Borrar">
                 </a>
              </div>
           
           </div>
         
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('bikes.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection