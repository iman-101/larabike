@extends('layouts.master')
@section('log')
@section('titulo','Nueva Moto') 
@section('contenido')
             
              <form class="my-2 border p-5" method="POST" action="{{route('bikes.store')}}" enctype="multipart/form-data">
              
                 {{csrf_field()}}
                 <div class="form-group row">
                      <label for="inputMarca" class="col-sm-2 col-form-label">Marca</label>
                 
                        <input name="marca" type="text" class="up form-control col-sm-10" 
                        id="inputMarca" placeholder="Marca" maxlength="255" value="{{old('marca')}}" required>
                 </div>
              
                 <div class="form-group row">
                      <label for="inputmodelo" class="col-sm-2 col-form-label">Modelo</label>
                 
                        <input name="modelo" type="text" class="up form-control col-sm-10" 
                        id="inputModelo" placeholder="Modelo" maxlength="255" value="{{old('modelo')}}" required>
                 </div>
                 
                    <div class="form-group row">
                      <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
                 
                        <input name="precio" type="number" class="up form-control col-sm-10" 
                        id="inputPrecio" placeholder="Precio" maxlength="255" value="{{old('precio')}}"  required>
                 </div>
              
                <div class="form-group row">
                      <label for="inputkms" class="col-sm-2 col-form-label">Kms</label>
                 
                        <input name="kms" type="number" class="up form-control col-sm-10" 
                        id="inputKms" placeholder="Kms" value="{{old('kms')}}" required>
                 </div>
                 <div class="form-group row my-3 p-3 bg-light border">
                         <div class="form-check col-sm-6">
                            <input name="matriculada" type="checkbox" id="chkMatriculada"class="form-check-input" 
                             value="1"  {{empty(old('matriculada'))? "": "checked"}}>
                             
                           <label for="chkMatriculada" class="form-check-label">Matriculada</label>
                         </div>    
                     
                                       
                        <div class="form-check col-sm-6">
                          
                          <label for="inputMatricula" class="col-sm-2 form-label">Matricula</label>  
                          <input name="matricula" type="text" class="up form-control"
                           id="inputMatricula" maxLength="7" value="{{old('matricula')}}">
                     
                        </div>
                  </div>
                  
                 
                  <div class="form-group row p-3 my-3 border bg-light">
                       <label for="inputImagen" class="col-sm-2 col-form-label">Imagen</label>
                       <input name="imagen" type="file" class="form-control-file col-sm-10" id="inputImagen">
                       
                  </div>
                  
                  
                  
                      <div class="form-group row border p-3 my-3 bg-light">
                         <div class="form-check  col-sm-6">
                            <input type="checkbox" class="form-check-input" 
                             id="chkColor">
                             
                           <label class="form-check-label">Indicar el color</label>
                         </div>    
                     
                                       
                        <div class="form-check col-sm-6">
                          
                          <label for="inputColor" class="col-sm-2 form-label">Color</label>  
                          <input name="color" type="color" class="up form-control form-control-color"
                           id="inputColor" maxLength="7" value="{{old('color')?? '#FFFFFF'}}">
                     
                        </div>
                  </div>

                  
                 <div class="form-group row">
                     
                      <button type="submit" class="btn btn-success m-2 mt-5">Guardar</button>
                      <button type="reset" class="btn btn-secondary m-2 ">Borrar</button>
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
   @endsection
   @section('enlaces')
      @parent
      <a href="{{route('bikes.index')}}"  class="btn btn-primary m-2">Garaje</a>
      
   @endsection
      
      
      
      