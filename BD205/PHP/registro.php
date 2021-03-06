<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="insertar_usuario.php" method="post">
  <div class="container">
    <h1>Registro</h1>
    <p>Introduce los datos</p>
    <hr>

    <label for="uname"><b>Nombre Usuario</b></label>
    <input type="text" placeholder="Introduce un nombre de usuario" name="uname" id="uname" required>

    <label for="name"><b>Nombre y Apellidos</b></label>
    <input type="text" placeholder="Introduce tu nombre" name="name" id="name" required>

    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Introduce una contraseña" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repetir Contraseña</b></label>
    <input type="password" placeholder="Repite la contraseña" name="psw-repeat" id="psw-repeat" required>

    <label for="number"><b>Edad</b></label>
    <input type="number" placeholder="Introduce tu edad" name="number" id="number" required>

    <button type="submit" class="registerbtn">Registrarse</button>
  </div>
  
  <div class="container signin">
    <p>¿Ya tienes cuenta? <a href="../index.html">Inicia Sesión</a></p>
  </div>
</form>

</body>
</html>