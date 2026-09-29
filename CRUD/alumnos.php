
<?php
/* Incluye la información del archivo conexion.php */
include("conexion.php");

/* Se manda a llamar para ejecutar la funcion */
$con = conectar();

/* Dame todo lo que tengas en la tabla de alumnos */
$sql = "SELECT * FROM alumnos";

/*  */
$query = mysqli_query($con, $sql)

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Alumnos</title>
    <style>
        .contenedor{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="contenedor"">
        <div class="tabla">
            <h1>TABLA ALUMNOS</h1>
            <table>
                <th>
                    <tr>Matricula</tr>
                    <tr>Nombre</tr>
                    <tr>Apellido P</tr>
                    <tr>Apellido M</tr>
                    <tr>Edad</tr>
                </th>
            </table>
        </div>

        <div class="form">
            <h1>FORMULARIO</h1>
        </div>
    </div>
</body>
</html>