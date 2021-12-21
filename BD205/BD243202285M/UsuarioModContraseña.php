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
        $user = $_GET['uname'];
        $selCont = 'SELECT * FROM usuari WHERE usuari.nomUsuari = "'.$user.'"'; 
        $cont =mysqli_query($con, $selCont);
        $mostrar=mysqli_fetch_array($cont);
        echo '<center><a href="../PHP/Usuario.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>';

?>
<form action="userDataUpdate.php" method="post">
  <div class="container">
    <h2><center>Usuario <?php echo $mostrar['nomUsuari']?></center></h2>
    <hr>
    <label for="user"><b></b></label>
    <input type="hidden" name="user" id="user" value=<?php echo $mostrar['nomUsuari']?> required>
    <b><?php echo "Contraseña Actual: ".$mostrar['contrasenya']."  "?> </b>

    <label for="contr"><b><br>Nueva Contraseña</br></b></label>
    <input type="text" placeholder="Inserta nueva contraseña" name="contr" id="contr" required>

    <button type="submit" class="button button1" style="color: #68b9da;" >Modificar Contraseña</button>
    
  </div>

</form>

</body>
</html>