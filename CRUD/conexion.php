
<?php
/* Creacion de una funcion */
/* Funcion -> Nloque de codigo que podemos llamar  cuando lo necesitemos  */
function conectar(){
    /* Informacion del servidor */
    $host="localhost";
    $user="root";
    $pass="26102007ch";

    /*Base de datos */
    $db = "aw_crud"; 

    /* Funcion de PHP que permite conectar a MySql */
    $con=mysqli_connect($host,$user,$pass);

    /* Con esto nosotros les estamos diciendo que BD vamos a utilizar, pasamos la informacion de con y db */
    mysqli_select_db($con, $db);

    return $con;
}

?>

