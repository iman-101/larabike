@extends('layouts.master')





@section('contenido')


     
    
          <div class="alert alert-danger">
           
    
                    @if (session('resent'))
                        
                            {{ __('A fresh verification link has been sent to your email address.') }}
                     
                    @endif

                    Antes de continuar, por favor confirme su correo electronico con el enlace de verificatión que le fue enviado.Si no ha recibido el correo electronico 
                    ,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Haga click aquí</button>.
                    </form>
      
          </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi perfil</div>

                <div class="card-body">
                <table class="table  table-borderless" >
                  <tr>
                     <th scope="row">Id :</th>
                     <td> {{Auth::user()->id}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Nombre :</th>
                     <td> {{Auth::user()->name}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Email :</th>
                     <td> {{Auth::user()->email}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Nacimiento :</th>
                     <td> {{Auth::user()->nacimiento}}</td>
                  </tr>
                 <tr>
                     <th scope="row">Poblacion :</th>
                     <td> {{Auth::user()->poblacion}}</td>
                  </tr>
                   <tr>
                     <th scope="row">Nacimiento :</th>
                     <td> {{Auth::user()->cp}}</td>
                  </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


