<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "bdtareas";

    $conecta = mysqli_connect($servidor, $usuario, $password, $bd);

    if ($conecta -> connect_error) {
        die("Error en la conexion de la base de datos." . $conecta -> connect_error);
    } /*else {
        echo "Conectado a la bd";
    }*/
?>