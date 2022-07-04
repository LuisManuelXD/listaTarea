<?php
    include '../includes/conexion.php';

    $valorId = $_GET['txtId'];

    $consultaEliminar = "DELETE FROM tareas WHERE id='$valorId'";
    $guardarEliminacion = $conecta->query($consultaEliminar);

    echo "<script>alert('Se elimino con exito.');</script>";
    
    header("location:../index.php");
    $conecta->close();
?>