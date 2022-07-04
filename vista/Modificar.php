<?php 
    include '../includes/conexion.php';
    include '../script/Validar.php';

    $id = $_GET['txtId'];

    $cunsultarBusqueda = "SELECT id, nombre, descripcion FROM tareas WHERE id='$id'";
    $guardarBusqueda = $conecta->query($cunsultarBusqueda);

    $mostrarConsulta = $guardarBusqueda->fetch_array();

    if ( isset($_POST['btnModificar']) ) {
        $id = $_POST['txtId'];
        $nombre = $conecta->real_escape_string($_POST['txtNombre']);
        $descripcion = $conecta->real_escape_string($_POST['txtDescripcion']);

        $consultaActualizar = "UPDATE tareas SET nombre='$nombre', descripcion='$descripcion' WHERE id='$id'";
        $actualizar = $conecta->query($consultaActualizar);

        header("location:../index.php");
        $conecta->close();
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Lista de tareas - Modificar</title>
</head>
<body>
    <header>
        <h1>Lista de tareas</h1>
    </header>
    
    <br>
    <section class="contenedor">
        <div class="panelTareas">
            <form action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                <h2 class="textCenter">Modificar tarea</h2>
                <input type="hidden" name="txtId" id="txtId" value="<?php echo $mostrarConsulta['id'];?>">
                <br><label for="txtNombre">Nombre:</label>
                    <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" required value="<?php echo $mostrarConsulta['nombre'];?>"><br><br>
                    
                    <label for="txtDescripcion">Descripción</label><br>
                    <textarea name="txtDescripcion" id="txtDescripcion" cols="40" rows="5" placeholder="Ingrese una descripción de la tarea." required><?php echo $mostrarConsulta['descripcion']; ?></textarea><br>
                
                <br><input type="submit" id="btnModificar" name="btnModificar" value="Modificar tarea">
            </form>
        </div>
    </section>
</body>
</html>