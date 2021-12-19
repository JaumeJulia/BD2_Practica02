<!DOCTYPE html>
<html>
<body>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}
    a:link {
  color: #68b9da;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: pink;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: #68b9da;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
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
        .button1 {background-color: white  ;border: 2px solid #68b9da;}
        .button2 {background-color: white  ;border: 2px solid pink;}
    </style>
<center><img src="../Images/Notflix.PNG" width="300"></center>
<br>
<?php

if(!array_key_exists('uname', $_POST)){
  $usuario = $_GET['uname'];
}else{
  $usuario = $_POST['uname'];
}
$consulta_r = '<a href="ConsultarRecomanats.php?uname='.$usuario.'" class="button button1"style="font-size:20px" >Consultar Recomendados</a>';
$visualizar_t = '<a href="Visualizartabla.php?uname='.$usuario.'" class="button button2"style="font-size:20px" >Visualizar Facturas</a>';
echo "<table align='center'>";
    echo "<tr><td>".$consulta_r. "</td></tr>";
    echo "<tr><td>".$visualizar_t."</td></tr>";

echo "</table>";
?>
</body>
</html>