
<?php

/* Incluye la información del archivo conexion.php */
    include("conexion.php");

/* Se manda a llamar para ejecutar la funcion */
    $con = conectar();

/* Recibir informacion del formulario */
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_m = $_POST['apellido_m'];
    $apellido_p = $_POST['apellido_p'];
    $edad = $_POST['edad'];

    /* Contruimos la consulta para insertar la informacion a la bd */
    $sql = "INSERT INTO alumnos (matricula, nombre, apellido_p, apellido_m, edad)
    VALUES 
    ('$matricula','$nombre','$apellido_p','$apellido_m','$edad')";

/* Ejecutamos la consulta */
    $query = mysqli_query($con, $sql);

    /* Comprobamos si se inserto o no al alumno */
    if($query){
        header("Location: alumnos.php");
    }else{
        echo"Error al insertar al alumno";
    }
    
?>

