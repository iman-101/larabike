<!DOCTYPE html>
<html lang="es">
    <head>
         <meta charset="UTF-8">
        <style>
          *{
             font-family: arial, verdana , helvetica;
          }
          header,main,footer{
              border:solid 1px #ddd;
              padding:15px;
              margin:10px;
          
          }
           header, footer{
              background-color:#eee;
           
           }
          header{disply:flex;}
          header figure{flex:1 }
          header h1{flex:4}
          .cursiva{
          font-style:italic}
          
          @php
            include 'css/bootstrap.min.css';
          @endphp
        </style>
  
    </head>
    <body class="container p-3">
        <header class="container bg-fluid m-2">
           <figure class="img-fluid m-2">
              <img src="{{asset('img/logos/logo.png')}}" alt="logo" width="50" height="50">
           </figure>
        
        <h1>{{config('app.name')}} </h1>
        </header>
        <main>
           <h2>Mensaje recibido : {{$mensaje->asunto}}</h2>
           <p class="cursiva">De {{$mensaje->email}} &lt;{{$mensaje->email}}&gt;</p>
           <p>{{$mensaje->mensaje}}</p>
        </main> 
         <footer class="page-footer font-small p-4 bg-light">
            <p>Aplication creada por como ejemplo de clase.
            Desarrollada haciendo uso de <b>Larabel</b> y <b>Bootstrap</b>
            </p>
         
         
         </footer>
    
    
    
    </body>
 </html>