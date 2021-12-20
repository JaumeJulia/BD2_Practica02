<!DOCTYPE html>
<html>
<head>
    <title>Contratar</title>
    <style>
    table, th, td {
        border: 2px solid pink;
        background-color: #68b9da;
        
    }
    table.center{
        margin-left: auto;
        margin-right: auto;
    }
    .error {color: #FF0000;}
    </style>
<head>
<body>
    <?php $user= $_GET['uname'];
    echo '<center><a href="../PHP/Usuario.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>';
    echo '<center><H3>Contratos</H3></center><br>';
    $tipusContracteErr = "Este campo es obligatorio";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["tipusContracte"])) {
          $tipusContracteErr = "Es necesario marcar una opcion.";
        }
    }
    include "../PHP/conexion.php";

    $consultaContratoUsuario = 'SELECT contracte.suscrit, contracte.dataFinal FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario si existe
    $contrato = mysqli_query($con, $consultaContratoUsuario);
    if(mysqli_num_rows($contrato) > 0){
        $mostrar=mysqli_fetch_array($contrato);
        if($mostrar['suscrit'] == 1){
            $date = date_create_from_format('Y-m-d', date('Y-m-d'));
            $diff = date_diff($date,date_create($mostrar['dataFinal']));
            echo 'Su contrato sige vigente. Caduca en '.$diff->d. ' dias.';
        }else{
            ?>
            <form method="post" action ="actualizaContrato.php">
            Tipo de Contrato:
                <input type="radio" name="tipusContracte" value="mensual">Mensual
                <input type="radio" name="tipusContracte" value="trimestral">Trimestral
                <input type="hidden" name="idContracte" value="<?php echo $mostrar['idContracte'];?>">
                <span class="error">* <?php echo $tipusContracteErr;?></span>
                <br><br>
                <input type="submit" name="Aceptar" value="Aceptar"> 
            </form> 
            <?php
        }

    }else{
        ?>
            <form method="post" action ="creaContrato.php">
            Tipo de Contrato:
                <input type="radio" name="tipusContracte" value="mensual" <?php echo ($_SESSION['tipusContracte'] != "trimestral") ? 'checked="checked"' : ''; ?>>Mensual
                <input type="radio" name="tipusContracte" value="trimestral" <?php echo ($_SESSION['tipusContracte'] == "trimestral") ? 'checked="checked"' : ''; ?>>Trimestral
                <input type="hidden" name="usuari" value="<?php echo $user;?>">
                <span class="error">* <?php echo $tipusContracteErr;?></span>
                <br><br>
                <input type="submit" name="Aceptar" value="Aceptar"> 
            </form> 
            <?php
    }
        
?>
</body>
</html>