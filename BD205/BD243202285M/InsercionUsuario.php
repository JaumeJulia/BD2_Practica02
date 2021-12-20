<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: pink;
}

* {
  box-sizing: border-box;
}
button {
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border:none;
        border-radius: 8px;
        cursor: pointer;
        width: 20%;
        }
.button1 {background-color: pink  ;border: 2px solid #99d8ea;}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: #99d8ea;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #ffff80;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: pink;
  text-align: center;
}
</style>
</head>
<body>

<form action="adminInsertUsuario.php" method="post">
  <div class="container">
  <center><a href="../PHP/Admin.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>
    <h2><center>Creacion de Usuario</center></h2>
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
    <button type="submit" class="button button1" style="color: #68b9da;" >Añadir Usuario</button>
    
  </div>

</form>

</body>
</html>