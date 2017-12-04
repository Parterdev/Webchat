<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        $array[] = new DatosConexion("pruebasITSY","172.16.0.9","ignug","prueba","12345678");
        //local/servidor/base de datos/usuario/contraseña
        $array[] = new DatosConexion("local","localhost","ignug","prueba","12345678");
        return $array;
    }
}
