<?php 
require_once "include/gestionBbdd.php";
if (isset($_POST['borrar']) && isset($_POST['codigos'])) {
    foreach ($_POST['codigos'] as $cod) {
        GestionBBDD::eliminarProducto($cod);
    }
}
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
                <td>
                    <form action='index_checkbox.php' method='post'>
                        <button type='submit' name='borrar'>Borrar</button>
                </td>
            </tr>
            <?php
                try {
                    $array_de_productos = GestionBBDD::productos();
                    foreach ($array_de_productos as $pro) {
                        echo "<tr class='producto2'>
                        <td>".$pro->getCodigoProducto()."</td>
                        <td>".$pro->getSeccionProducto()."</td>
                        <td>".$pro->getNombreProducto()."</td>
                        <td>".$pro->getFechaProducto()."</td>
                        <td>".$pro->getPaisProducto()."</td>
                        <td>".$pro->getPrecioProducto()."</td>
                        <td><input type='checkbox' name='codigos[]' value='".$pro->getCodigoProducto()."'></td>
                        </tr>";
                    }
                } catch (Exception $e) {
                    echo  "<br> ERROR" . $e->getMessage();
                }
            ?>
            </form>
        </table>
    </div>
</body>
</html>