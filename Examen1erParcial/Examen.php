
<?php/*
    include("conexion.php");
    $con = conectar();
    $sql = "SELECT * FROM libros";
    $query = misqli_query($con, $sql);*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN 1ER PARCIAL AW</title>
</head>
<style>
    body{
        text-align: center;
    }
    .contenedor{
        padding: 20px;
    }
    .r{
        border: 2px solid black;
    }
    
</style>
<body>
    <h2 style = "background-color: grey; border: 2px solid black">EXAMEN 1ER PARCIAL</h2> 

    <div class="contenedor" style = "background-color: grey; ">
        <div class = "formTabla" style = "display: grid; grid-template-columns: 50% 50%; ">
            <div class = "formulario" style = "border: 2px solid black; ">
                <h3>FORMULARIO</h3>
                <ul>
                    <li>Titulo</li>
                    <li>Autor</li>
                    <li>Paginas</li>
                    <li>Precio</li>
                </ul>
            </div>

            <div class = "tabla" style = "border: 2px solid black;">
                <table border = "1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITULO</th>
                            <th>AUTOR</th>
                            <th>PAG</th>
                            <th>PRECIO</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        

        <div class = "practicas" style = "border: 2px solid black; display: grid; grid-template-columns: repeat(3, 1fr); background-color: red">
            <div class="r">
                <h3>R1 - Introducción a Git y GitHub</h3>
                <a href="docs/AWHtmlSCSSS">URL</a>
            </div>

            <div class="r">
                <h3>R2 - HTML + CSS + Box Model</h3>
                <a href="">URL</a>
            </div>

            <div class="r">
                <h3>Flex y Grid</h3>
                <a href="">URL</a>
            </div>
        </div>

        <div class ="experiencia" style = "border: 2px solid black; display: flex; background-color: yellow">
            <div class="foto" style="width: 120px; padding:30px 50px 30px ; border-radius: 50%;">
                <img src="img/stelle.jpg" alt="Imagen">
            </div>
            <div class="informacion">
                <h3>JENNYFER SANTOS TREJO</h3>
                <p>Considero mi experiencia como buena, 
                    he aprendido varias cosas acerca de 
                    mi carrera y he hecho varios amigos 
                    aunque aveces me suelo estresar con
                    algunas cosas en general me ha ido bien.
                </p>
            </div>
        </div>
    </div>

</body>
</html>
