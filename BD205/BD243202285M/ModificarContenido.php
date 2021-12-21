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
        $vid = $_POST['video'];
        $vid1 = (String)$vid;
        $selCont = 'SELECT * FROM contingut WHERE contingut.video = "'.$vid.'"'; 
        $cont =mysqli_query($con, $selCont);
        $mostrar=mysqli_fetch_array($cont);
?>
<form action="adminInsertContenido.php" method="post">
  <div class="container">
  <center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>
    <?php echo "$vid1";?>
    <h2><center>Modificacion Contenido: <?php echo $mostrar['titol']?></center></h2>
    <hr>

    <label for="categoria"><b>Categoria</b></label>
    <input type="text" placeholder=<?php echo $mostrar['categoria']?> name="categoria" id="categoria" required>

    <label for="titulo"><b>Titulo</b></label>
    <input type="text" placeholder="Introduce el titulo" name="titulo" id="titulo" required>

    <label for="video"><b>Video</b></label>
    <input type="text" placeholder="Añade la URL del contenido" name="video" id="video" required>

    <label for="fecha"><b>Fecha</b></label>
    <input type="text" placeholder="Introduce la fecha de introduccion (yyyy-mm-dd) " name="fecha" id="fecha" required>
    <button type="submit" class="button button1" style="color: #68b9da;" >Añadir Contenido</button>
    
  </div>

</form>

</body>
</html>