<?php


$conexion = mysqli_connect("localhost:3310", "root", "", "users");

if (isset($_POST['users'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['pass']) >=1 ) {
        $usuario = trim($_POST['usuario']);
        $pass = trim($_POST['password']);
        
        $consultar = "INSERT INTO usuarios(usuario, password) VALUES ('$usuario','$pass')";
        $resultado = mysqli_connect($conexion, $consultar);
        if ($resultado) {
            
        }
    }
}
?>
//  Este codigo esta en construccion () se incluira cuando este completo

