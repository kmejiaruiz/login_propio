<?php
// php de cierre de sesion

session_start();
session_destroy();

header('location:../index.html');

?>
