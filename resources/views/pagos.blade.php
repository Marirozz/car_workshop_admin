<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
               height: 80% !important;
                margin: 0;
            }

          
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                align-items: center;
                display: flex;
                justify-content: center;
                font-size: 54px;
            }

        </style>
    </head>
    <body>
        <h1 class="title">Pago por transferencia</h1> <br>

        <div class="flex-center position-ref  position-ref">
         
                <img style="width: 50%; heigh:30%" src="{{asset('img/pagos.png')}}" alt="Imagen registro de usuario">
            
            

         
        </div>
    </body>
</html>



    
