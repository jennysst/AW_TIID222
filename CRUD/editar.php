
<?php

    include("conexion.php");

    $con = conectar();


    

        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido_m = $_POST['apellido_m'];
        $apellido_p = $_POST['apellido_p'];
        $edad = $_POST['edad'];

        $sql = "UPDATE alumnos SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_m = '$apellido_m', edad = '$edad' WHERE matricula = '$matricula'";
        $query = mysqli_query($con, $sql);

        if($query){
            header("Location: alumnos.php");
        }else{
            echo"Error al insertar al alumno";
        }
    
?>
  <!--
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>EDITAR ALUMNO</h1>


        <div class="form">
            <h1>FORMULARIO</h1>
            <form action="editar.php" method="POST">
                <div style="display:flex; gap:10px;">
                    <input type="text" 
                    class="form-control" 
                    name="matricula" 
                    placeholder="Matricula">

                    <input type="text" 
                    class="form-control" 
                    name="nombre" 
                    placeholder="Nombre">

                    <input type="text" 
                    class="form-control" 
                    name="apellido_p" 
                    placeholder="Apellido Paterno">

                    <input type="text" 
                    class="form-control" 
                    name="apellido_m" 
                    placeholder="Apellido Materno">

                    <input type="text" 
                    class="form-control" 
                    name="edad" 
                    placeholder="Edad">

                    <button type = "submit" name="editar">Editar</button>
                </div>
            </form>
        </div>

</body>
</html>
-->