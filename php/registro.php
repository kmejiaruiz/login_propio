<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espere</title>
</head>
<body>
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
            padding: 0 15px 0 15px;
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

$conexion = mysqli_connect("localhost:3310", "root", "", "users");

if (isset($_POST['register'])) {
    if (strlen($_POST['email-register']) >= 1 && 
        strlen($_POST['usu-register']) >= 1 &&
        strlen($_POST['pass-register'] >= 1)
        ) {
        $email = trim($_POST['email-register']);
        $usuario = trim($_POST['usu-register']);
        $pass = trim($_POST['pass-register']);
        
        $consultar = "INSERT INTO usuarios(email, usuario, password) VALUES ('$email', '$usuario','$pass')";
            //Evita el introducir un usuario repetido


        $verificar = mysqli_query($conexion, "Select * from usuarios where email = '$email'");
        $validar = mysqli_query($conexion, "Select * from usuarios where usuario = '$usuario'");

        if (mysqli_num_rows($validar) > 0 || mysqli_num_rows($verificar) > 0) {
            ?>
            <div class="container">
                <div class="error">
                    <div class="error_text"><strong>Este usuario o correo ya esta registrado</strong>, se redirigira a la pagina de inicio en
                        <span id="reloj"></span>
                    </div>
                </div>
            </div>
            <script>
                "use strict";

                let tiempo = 2;

                function clock() {
                    document.getElementById("reloj").innerHTML = tiempo;

                    if (tiempo <= 0 || tiempo === 0) {
                        window.location = '../index.html';
                    } else {
                        tiempo -= 1;
                        setTimeout(clock, 1e3);
                    }
                }
                clock();
                </script>
                <?php
            die();
        }







        $resultado = mysqli_query($conexion, $consultar);
        if ($resultado) {
            
            ?>
            <div class="container-h">
                <div class="success">
                    <div class="success_text">
                        Registro finalizado con &eacute;xito, espere <span id="reloj"></span> segundos porfavor.
                    </div>
                </div>
            </div>

            <script>
                "use strict";

                let tiempo = 2;

                function clock() {
                    document.getElementById("reloj").innerHTML = tiempo;

                    if (tiempo <= 0 || tiempo === 0) {
                        window.location = '../index.html';
                    } else {
                        tiempo -= 1;
                        setTimeout(clock, 1e3);
                    }
                }
                clock();

            </script>
            <!-- <script>
                alert(`Felicidades, te has inscrito correctamente!.`);
                location.href = "../index.html";
            </script> -->

            
            <?php
        } else{
            ?>
            <div class="container">
                <div class="error">
                    <div class="error_text">Algo ha salido mal, se redirigira a la pagina de inicio en
                        <span id="reloj"></span>
                    </div>
                </div>
            </div>
            <script>
                "use strict";

                let tiempo = 2;

                function clock() {
                    document.getElementById("reloj").innerHTML = tiempo;

                    if (tiempo <= 0 || tiempo === 0) {
                        window.location = '../index.html';
                    } else {
                        tiempo -= 1;
                        setTimeout(clock, 1e3);
                    }
                }
                clock();

            </script>
            <!-- <script>
                alert("Algo ha salido mal, intente de nuevo mas tarde.");
                location.href = "../index.html";
            </script> -->
            <?php
        }

    } else{
        ?>


        <div class="container">
            <div class="error">
                <div class="error_text">Es de caracter obligatorio llenar todos los campos, se redirigira a la pagina de inicio en
                    <span id="reloj"></span>
                </div>
            </div>
        </div>
        <script>
                "use strict";

                let tiempo = 2;

                function clock() {
                    document.getElementById("reloj").innerHTML = tiempo;

                    if (tiempo <= 0 || tiempo === 0) {
                        window.location = '../index.html';
                    } else {
                        tiempo -= 1;
                        setTimeout(clock, 1e3);
                    }
                }
                clock();

            </script>

        <!-- <script>
            alert("Complete los campos para continuar.");
            location.href = "../index.html";
        </script> -->

        
        <?php
    }
}
// header('/index.html');
?>

