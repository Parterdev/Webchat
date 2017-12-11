<?php
$user=$_POST['user'];
$password=$_POST['password'];

$conexion = mysqli_connect("localhost","root","","webchat");
  if(!$conexion) {
    echo 'Error al conectar la base de datos.';
  }

 ?>
