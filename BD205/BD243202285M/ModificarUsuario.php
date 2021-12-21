<?php 
if (!isset($_SESSION['user'])){
    session_start();
}
?>
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
<?php
        include "../PHP/conexion.php";
        $user = $_POST['nomUsuari'];
        $selCont = 'SELECT * FROM usuari WHERE usuari.nomUsuari = "'.$user.'"'; 
        $cont =mysqli_query($con, $selCont);
        $mostrar=mysqli_fetch_array($cont);
?>
<form action="adminUpdateUsuario.php" method="post">
  <div class="container">
  <center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>
    <h2><center>Modificacion Usuario: <?php echo $mostrar['nomUsuari']?></center></h2>
    <hr>
    <label for="user"><b></b></label>
    <input type="hidden" name="user" id="user" value=<?php echo $mostrar['nomUsuari']?> required>

    <label for="tipo"><b>Tipo de Usuario</b></label>
    <input type="text" placeholder="Inserta el tipo de Usuario (>18,9-18,<9)" name="tipo" id="tipo" required>

    <label for="admin"><b>Admin</b></label>
    <input type="checkbox"  name="admin" id="admin" >

    <button type="submit" class="button button1" style="color: #68b9da;" >Modificar Usuario</button>
    
  </div>

</form>

</body>
</html>