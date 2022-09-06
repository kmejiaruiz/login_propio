




<!DOCTYPE html>
<html lang="en, es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
</head>

<body>


<div class="wrapper">
    <div class="loader"></div>
</div>

    <style>
        .wrapper {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background-color: #000;
            display: grid;
            place-items: center;
            transition: opacity .25s, visibility 1s;
        }

        /* .fade {
            opacity: 0;
            visibility: hidden;
        } */

        .loader {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background:
                radial-gradient(farthest-side, #FFFFFF 94%, #0000) top/8px 8px no-repeat,
                conic-gradient(#0000 30%, #FFFFFF);
            -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 8px), #000 0);
            animation: s3 .8s infinite linear;
        }

        @keyframes s3 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        $(window).load(function () {
            $(".loader").fadeOut("slow");
            $(".wrapper").fadeOut("slow");
        }); 
    </script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(45deg, #16537e, #000000);
            height: 100vh;
        }

        .error {
            /* margin-left: auto;
            margin-right: auto; */
            width: auto;
            border-radius: 10px;
            background-color: red;
            /* height: 45px; */
            height: 50px;
            padding: 0px 15px 0px 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            display: grid;
            place-items: center;
        }

        /* .error_text {
            margin: 10px;
        } */
        .container{
            position: fixed;
            inset: 0;
            display: grid;
            place-items: center;
        }
    </style>

    <style>
        .success {
            /* margin-left: auto;
            margin-right: auto; */
            width: auto;
            border-radius: 10px;
            background-color: #2EFE2E;
            height: 45px;
            padding: 0px 15px 0px 15px;
            /* height: 50px; */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            display: grid;
            place-items: center;
        }

        /* .success_text {
            margin: 10px;
        } */
        .container-h{
            position: fixed;
            inset: 0;
            display: grid;
            place-items: center;
        }
    </style>

    
</body>

</html>



<?php

$usuario = $_POST['usuario'];
$pass = $_POST['password'];

session_start();

$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect('localhost:3310', 'root', '', 'users');

$consultar = "SELECT*FROM usuarios where usuario = '$usuario' and password = '$pass'";
$resultado = mysqli_query($conexion, $consultar);

$filas = mysqli_num_rows($resultado);
// Condicional IF de abajo ubicado para ser redirigido a index.html en caso de no haber registrado o introducido un nombre de usuario.
// Probablemente esto cambie en futuros cambios en este codigo de php.
$sesion = $_SESSION['usuario'];
if ($sesion == null || $sesion == "") {
    header("location:../index.html");
    die();
}


if ($filas) {
    // header('location:./home.php');
    ?>
    <div class="container-h">
        <div class="success">
            <div class="success_text">
                Exito en la solicitud, espere <span id="counter"></span> segundos porfavor.
            </div>
        </div>
    </div>
<!-- Script para redirigir al usuario a la pagina de home.php luego de n segundos en caso de que se haya introducido un usuario correcto o existente en la base de datos -->

    <script>
        "use strict";

        let temp = 1;

        function temporizador() {
            document.getElementById('counter').innerHTML = temp;

            if (temp <= 0 || temp === 0) {
                window.location = './home.php';
            } else{
                temp -= 1;
                setTimeout(temporizador, 1e3);
            }
        }
        temporizador();

    </script>

    <?php
}
else {
    // header('location: ../index.html')
?>
<div class="container">
    <div class="error">
        <div class="error_text">Correo o contrasena incorrecto(s), se redirigira a la pagina de inicio en
            <span id="contador"></span>
        </div>
    </div>
</div>
<!-- Script para redirigir al usuario a la pagina de index.html luego de n segundos en caso de que se haya introducido un usuario incorrecto o inexistente en la base de datos -->
<script>
    "use strict";
    let cuenta_atras = 2;

    function reloj() {
        document.getElementById('contador').innerHTML = cuenta_atras;


        if (cuenta_atras <= 0 || cuenta_atras === 0) {
            window.location = '../index.html'
           
        } else {
            cuenta_atras -= 1;
            setTimeout(reloj, 1e3);
        }
        
    }
    reloj();



// Script de abajo obsoleto (reemplazado por la funcion reloj)

    // let time = setTimeout(function () {
    //     window.location = '../index.html'
    // }, 3000);
</script>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
