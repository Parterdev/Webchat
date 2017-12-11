<?php
$conexion = mysqli_connect("localhost","root","12345678","Webchat");
  if(!$conexion) {
    echo 'Error al conectar la base de datos.';
  }
  else {
    echo 'Conexion satisfactoria a la base de datos.';
  }
?>
