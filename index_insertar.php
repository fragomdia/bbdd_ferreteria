<?php 
require_once "include/gestionBbdd.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>FERRETERÍA(borrar 1)(1)(El Clavo)</h1>
    </header>
    <div class="productos">
        <table>
            <tr class="cabecera">
                <td>Código artículo</td>
                <td>Sección</td>
                <td>Nombre artículo</td>
                <td>Fecha</td>
                <td>Origen</td>
                <td>Precio</td>
                <td></td>
            </tr>
            <?php
                try {
                    $array_de_productos = GestionBBDD::productos();
                    foreach ($array_de_productos as $pro) {
                        echo "<tr class='producto'>
                        <td>".$pro->getCodigoProducto()."</td>
                        <td>".$pro->getSeccionProducto()."</td>
                        <td>".$pro->getNombreProducto()."</td>
                        <td>".$pro->getFechaProducto()."</td>
                        <td>".$pro->getPaisProducto()."</td>
                        <td>".$pro->getPrecioProducto()."</td>";
                    }
                } catch (Exception $e) {
                    echo  "<br> ERROR" . $e->getMessage();
                }
            ?>
            <form action="" method="post">
                <tr class="producto2">
                    <td><input type="text" name="cod"></td>
                    <td><input type="text" name="seccion"></td>
                    <td><input type="text" name="nombre"></td>
                    <td><input type="text" name="fecha"></td>
                    <td><input type="text" name="pais"></td>
                    <td><input type="text" name="precio"></td>
                    <td><button type="submit">Insertar</button></td>
                </tr>
            </form>
        </table>
    </div>
</body>
</html>