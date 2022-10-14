@php($pagina='portada')

@extends('layouts.master')
@section('titulo','Portada de LaraBikes') 
@section('contenido')
             
       <figure class="row mt-2 mb-2 col-10 offset-1">
           <img class="d-block w-100" 
           src="{{asset('img/bikes/bike0.png')}}" 
           alt="Moto de Canela en Akira" >
       
       </figure>
        
@endsection
@section('enlaces')
@endsection