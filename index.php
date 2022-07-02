<?php
    error_reporting(0);
    include './includes/conexion.php';

    $consulta = "SELECT * FROM tareas";
    $guardar = $conecta->query($consulta);

    insertarDatos();

    if ( isset($_POST['btnGenerar']) ) {
        $nombre = $conecta->real_escape_string($_POST['txtNombre']);
        $descripcion = $conecta->real_escape_string($_POST['txtDescripcion']);
        $realizado = 0;

        $insertar = "INSERT INTO tareas (nombre, descripcion, realizado) VALUES 
                                ('$nombre', '$descripcion', '$realizado')";
        $guardarInsertar = $conecta->query($insertar);

        if ($guardarInsertar > 0) {
            echo "<script>alert('Se guardo con exito.');</script>";
            $guardar = $conecta->query($consulta);
        } else {
            echo "<script>alert('Error al guardar.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Lista de tareas</title>
</head>
<body>
    <header>
        <h1>Lista de tareas</h1>
    </header>

    <br>
    <section class="contenedor">
        <div class="panelTareas">
            <form action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                <h2 class="textCenter">Crear tarea</h2>
                <br><label for="txtNombre">Nombre:</label>
                <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" required><br><br>
                
                <label for="txtDescripcion">Descripción</label><br>
                <textarea name="txtDescripcion" id="txtDescripcion" cols="40" rows="5" placeholder="Ingrese una descripción de la tarea." required></textarea><br>
                
                <br><input type="submit" id="btnGenerar" name="btnGenerar" value="Generar tarea">
            </form>
        </div><br><br>

        <div class="panelTablaRealizar" id="">
            <table>
                <caption>
                    <h2 class="textCenter">Tareas por completar</h2>
                </caption>
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Realizada</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                        while ( $row = $guardar -> fetch_assoc() ) {
                    ?>
                    <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['nombre']; ?> </td>
                        <td> <?php echo $row['descripcion']; ?> </td>
                        <td> <input type="checkbox" name="cboxRealizado" id="cboxRealizado"> <?php echo $row['realizado']; ?> </td>
                        <td>
                            <a href="#">Editar</a>-
                            <a href="#">Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>
                            <a href="#">Editar</a>-
                            <a href="#">Borrar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><br><br>

        <div class="panelTablaFinalizado">
            <table>
                <caption>
                    <h2 class="textCenter">Tareas finalizadas</h2>
                </caption>
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Realizada</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Tarea1</td>
                        <td>Esta es una tarea pero por el momento solo se va a ver esta informacion</td>
                        <td>Finalizado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>