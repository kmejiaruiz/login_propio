<?php

session_start();
$sesion = $_SESSION['usuario'];
if ($sesion == null || $sesion = "") {
    header("location:../index.html");
    die();
}


?>

<!-- documento en construccion -->



<!DOCTYPE html>
<html lang="en, es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
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



<a href="./logout.php"><button type="button">Salir</button></a>
</body>
</html>
