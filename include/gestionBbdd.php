<?php
require_once "producto.php";

class GestionBBDD {

    public static function realizarConexion() {   
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=ferreteria","root", "123456");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }
        catch(Exception $e)
        {
          echo "Error al realizar la conexión: " . $e->getMessage();
        }    	
    }

    public static function productos() {
        $sql="select * from productos;";
        $conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
	    $arra_productos=array();
        while ($fila=$resultado->fetch()){
            $arra_productos[]= new Producto($fila);
        }
        $resultado->closeCursor();
		$conexion=null;
		return ($arra_productos);
    }

    public static function eliminarProducto($codigo) {
        $sql = "delete from productos where codigoarticulo = :n_codigo;";
        $conexion=self::realizarConexion();
        $resultado=$conexion->prepare($sql);
		$resultado->execute(array(":n_codigo"=>$codigo));
        $resultado->closeCursor();
		$conexion=null;
    }

}

?>