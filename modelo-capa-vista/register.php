<?php
//Recibimos datos y los almacenamos en las siguientes variabes

include 'connect.php';
$names = $_POST['namesUser'];
$surnames = $_POST['surnames'];
$name_user = $_POST['nameUser'];
$password = $_POST['passwordUserId']; //Recibe los datos de la variable nombre a traves del metodo POST
$email_adress = $_POST['emailUser'];
$gender = $_POST['genderId'];

//Consultas
$insertar = "INSERT INTO UserAccount(namesUser, surnames, nameUser, passwordUserId, emailUser, genderId) VALUES ('$names','$surnames', '$name_user',
'$password', '$email_adress', '$gender')" ;

//Consulta para buscar un registro que coincida con una repetición de nombre de usuario
$verificar_user = mysqli_query($conexion, "SELECT * FROM useraccount WHERE nameUser = '$name_user'");
if (mysqli_num_rows($verificar_user) > 0) {
  echo '<script>
  alert("El usuario ya se encuentra registrado");
  window.history.go(-1);  //Función para regresar a la página de registro
  </script>';
  exit;
}

//Consulta para buscar un registro que coincida con una repitición de correo electronico
$verificar_email = mysqli_query($conexion, "SELECT * FROM useraccount WHERE emailUser = '$email_adress'");
if (mysqli_num_rows($verificar_email) > 0) {
  echo '<script>
  alert("El correo electrónico ya se encuentra registrado");
  window.history.go(-1);
  </script>';
  exit;
}

//Ejecutar Consultas
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
  echo 'Error al registrarse';
} else {
  echo 'Usuario registrado satisfactoriamente';
}

//Cerrar la conexion
mysqli_close($conexion);
?>
