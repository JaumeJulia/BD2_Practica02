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
        .button3 {background-color: white  ;border: 2px solid #ffff80;}
    </style>
<center><img src="../Images/Notflix.PNG" width="300"></center>
<br>
<?php

if(!array_key_exists('uname', $_POST)){
  $usuario = $_GET['uname'];
}else{
  $usuario = $_POST['uname'];
}

include "conexion.php";
$sql_contrato="SELECT contracte.suscrit FROM contracte WHERE contracte.nomUsuari='".$usuario."'";
$suscrit=mysqli_query($con,$sql_contrato);
if(!empty($suscrit) && mysqli_num_rows($suscrit) > 0){
    $suscrit=mysqli_fetch_array($suscrit);
}else{
  $suscrit=NULL;
}

$consulta_recomendados = '<a href="../BD243220819R/ConsultarRecomanats.php?uname='.$usuario.'" class="button button1"style="font-size:20px" >Consultar Recomendados</a>';
$visualizar_facturas = '<a href="../BD243220819R/Visualizartabla.php?uname='.$usuario.'" class="button button2"style="font-size:20px" >Visualizar Facturas</a>';
$consultar_contenido_completo = '<a href="../BD243466710E/ConsultarContenidoCompleto.php?uname='.$usuario.'" class="button button3"style="font-size:20px" >Ver Contenidos</a>';

if($suscrit!=NULL && $suscrit['suscrit'] == 1){
  $consultar_contenido_catfav = '<a href="../BD243466710E/ConsultarContenidoCatfav.php?uname='.$usuario.'" class="button button3"style="font-size:20px" >Ver Contenidos de las Categorias Favoritas</a>';
  $consultar_contenido_contfav = '<a href="../BD243466710E/ConsultarContenidoFavorito.php?uname='.$usuario.'" class="button button3"style="font-size:20px" >Ver Contenidos Favoritos</a>';  
}

$consultar_categorias_favoritas = '<a href="../BD243481084K/Categoria/mostrar_categoria_favorita.php?uname='.$usuario.'" class="button button1"style="font-size:20px" >Administrar Categorias Favoritas</a>';
$consultar_contenidos_favoritos = '<a href="../BD243481084K/Contenido/mostrar_contenido_favorito.php?uname='.$usuario.'" class="button button3"style="font-size:20px" >Administrar Contenido Favorito</a>';
$contratar = '<a href="../BD243466710E/Contratar.php?uname='.$usuario.'" class="button button3"style="font-size:20px" >Administrar Contrato</a>';

echo "<table align='center'>";
    echo "<tr><td>".$consulta_recomendados. "</td></tr>";
    echo "<tr><td>".$visualizar_facturas."</td></tr>";
    echo "<tr><td>".$consultar_contenido_completo."</td></tr>";
    if($suscrit!=NULL && $suscrit['suscrit'] == 1){
      echo "<tr><td>".$consultar_contenido_catfav."</td></tr>";
      echo "<tr><td>".$consultar_contenido_contfav."</td></tr>";
    }
    echo "<tr><td>".$consultar_categorias_favoritas."</td></tr>";
    echo "<tr><td>".$consultar_contenidos_favoritos."</td></tr>";
    echo "<tr><td>".$contratar."</td></tr>";
echo "</table>";
?>
</body>
</html>