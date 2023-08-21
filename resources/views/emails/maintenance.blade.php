
<html>
    <head>
        <title>hola</title>
    </head>
    <body>
        <h1>Bienvenido a <span style=" font-family: Georgia, 'Times New Roman', Times, serif; Color:rgb(4, 4, 219)">Talleres Lebron</span></h1>
            <h2> Ya es tiempo de tu mantenimiento programado de:  {{$maintenance->name}} para tu vehiculo</h2>>
            <h2>El costo total de tu Mantenimiento es {{$maintenance->cost}} pero si pahas ahora te hacemos un</h2>
            <h2 style="color: red"> Descuento del 10%</h2>
            <h2>Precio de oferta {{$maintenance->cost - ($maintenance->cost * 0.10)}}</h2>
    
    </body>
</html>