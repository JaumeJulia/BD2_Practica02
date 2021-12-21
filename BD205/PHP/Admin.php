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
        
        
      
    </style>
    <div class="container">
<center><img src="../Images/Notflix.PNG" width="300"></center>
<br>
<table align="center">
    <form action="../BD243202285M/InsercionUsuario.php" method="post">
    <div class="container">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Añadir Usuario</button></center>
    </form>

    <form action="../BD243202285M/InsercionContenido.php" method="post">
    <div class="container">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Añadir Contenido</button></center>
    </form>

    <form action="../BD243202285M/VisualizacionUsuarios.php" method="post">
    <div class="container">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Modificar Tabla Usuarios</button></center>
    </form>

    <form action="../BD243202285M/VisualizacionContenidos.php" method="post">
    <div class="container">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Modificar Tabla Contenidos</button></center>
    </form>

    <form action="../BD243466710E/VisualizarContratos.php" method="post">
    <div class="container">
    <center><button type="submit" class="button" style="color: #4F35CD;" >Modificar Tabla Contratos</button></center>
    </form>
  </div>
</table>
</body>
</html>