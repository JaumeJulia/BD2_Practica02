<!DOCTYPE html>
<html>
<body>
<style>
        body {font-family: Arial, Helvetica, sans-serif;
        background-color: pink;
    }
    form {border: 3px solid #f1f1f1;}
    .container {
     padding: 16px;
     background-color: #99d8ea;
    }
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
        .button1 {background-color:  pink ;border: 2px solid #ffff80;}
    </style>
    <div class="container">
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
?>

<table align="center">
  <div class="container">

    <form action="../BD243220819R/ConsultarRecomanats.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Consultar Recomendados</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

    <form action="../BD243220819R/Visualizartabla.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Visualizar Facturas</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

    <form action="../BD243466710E/ConsultarContenidoCompleto.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Ver Contenidos</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

<?php
if($suscrit!=NULL && $suscrit['suscrit'] == 1){
  ?>
    <form action="../BD243466710E/ConsultarContenidoCatfav.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Ver Contenidos de las Categorias Favoritas</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

    <form action="../BD243466710E/ConsultarContenidoFavorito.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Ver Contenidos Favoritos</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>
    <?php
}
  ?>
  <form action="../BD243481084K/Categoria/mostrar_categoria_favorita.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Administrar Categorias Favoritas</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

    <form action="../BD243481084K/Contenido/mostrar_contenido_favorito.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Administrar Contenido Favorito</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>

    <form action="../BD243466710E/Contratar.php" method="get">
    <center><button type="submit" class="button button1" style="color: #68b9da;" >Administrar Contrato</button></center>
    <input type="hidden" name="uname" value="<?php echo $usuario?>">
    </form>
  </div>
</body>
</html>