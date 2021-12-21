<?php
if (!isset($_SESSION['user'])){
  session_start();
}
?>
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
        background-color:  pink ;
        border: 2px solid #ffff80;
        }
        button:hover{
            background-color:  #ffff80 ;

        }
        .button1{background-color:  red ; border: 2px solid black}
        .button1:hover{
            background-color:  black ;

        }
    </style>
    <div class="container">
<center><img src="../Images/Notflix.PNG" width="300"></center>
<br>
<?php

$usuario = $_SESSION['user'];

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
    <center><button type="submit" class="button" style="color: #4F35CD;" >Consultar Recomendados</button></center>
    </form>

    <form action="../BD243220819R/Visualizartabla.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Visualizar Facturas</button></center>
    </form>

    <form action="../BD243466710E/ConsultarContenidoCompleto.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Ver Contenido</button></center>
    </form>
    
    <form action="../BD243202285M/UsuarioModContraseña.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Modificar Contraseña</button></center>
    </form>



<?php
if($suscrit!=NULL && $suscrit['suscrit'] == 1){
  ?>
    <form action="../BD243466710E/ConsultarContenidoCatfav.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Ver Contenido de las Categorias Favoritas</button></center>
    </form>

    <form action="../BD243466710E/ConsultarContenidoFavorito.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Ver Contenido Favoritos</button></center>
    </form>

    <form action="../BD243481084K/Categoria/mostrar_categoria_favorita.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Administrar Categorias Favoritas</button></center>
    </form>

    <form action="../BD243481084K/Contenido/mostrar_contenido_favorito.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Administrar Contenido Favorito</button></center>
    </form>

    <form action="../BD243220819R/VisualizarMensajes.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Visualizar Mensajes No Leidos</button></center>
    </form>

    <form action="../BD243220819R/VisualizarTodoMensaje.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Visualizar Todos los Mensajes</button></center>
    </form>

    <?php
}
  ?>
  
    <form action="../BD243466710E/Contratar.php" method="get">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Administrar Contrato</button></center>
    </form>

    <form action="../PHP/identifica.php" >
    <div class="container">
    <center><button type="submit" class="button button1" style="color: white;" >Salir</button></center>
    </form>
  </div>
</body>
</html>