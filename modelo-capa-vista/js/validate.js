//Función para validar el formulario de registro en HTML
//Expresiones regulares

function validar() {
    var names, surnames, name_user, password, email_adress, gender, expression; //Expresiones regulares
    names = document.getElementById('namesUser').value; //Se guardará el valor que se almacena en la variable nombre.
    surnames = document.getElementById('surnames').value;
    name_user = document.getElementById('nameUser').value;
    password = document.getElementById('passwordUserId').value;
    email_adress = document.getElementById('emailUser').value;
    gender = document.getElementById('genderId').value;

    expression =  /\w+@\w+\.+[a-z]/; //Expresión regular para correo electronico

    if(names === "" || surnames === "" || name_user === "" || password === "" || email_adress === "" || gender ==="") {
      alert("Todos los campos son obligatorios");
      return false;
    }
    else if(names.length>50 || surnames.length>50) {
      alert("Se ha superado el límite de caracteres permitidos");
      return false;
    }
    else if(name_user.length>50 || password.length>50) {
      alert("Se ha superado el límite de caracteres permitidos");
      return false;
    }
    else if(email_adress.length>50) {
      alert("Se ha superado el límite de caracteres permitidos");
      return false;
    }
    else if(!expression.test(email_adress)) {
      alert("El correo no es válido");
      return false;
    }
    else if(gender.length>10) {
      alert("Se ha superado el límite de caracteres permitidos");
      return false;
    }

}
