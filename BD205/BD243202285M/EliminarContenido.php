<!DOCTYPE html>
<html>
    <body>
        
    <?php
        include "../PHP/conexion.php";
        $vid = $_POST['video'];

        $consultaContfav = 'SELECT * FROM contfav WHERE contfav.video = "'.$vid.'"'; //sacamos los contenidos favoritos asociados al contrato
        $contfav = mysqli_query($con, $consultaContfav);

        if(mysqli_num_rows($contfav) > 0){
            while($mostrar=mysqli_fetch_array($contfav)){
                $eliminarContfav = 'DELETE FROM contfav WHERE contfav.idContracte = "'.$mostrar['idContracte'].'"';
                $resultado = mysqli_query($con,$eliminarContfav);
            }
        }
        $missatge = 'SELECT * FROM missatge WHERE missatge.video = "'.$vid.'"'; //sacamos los contenidos favoritos asociados al contrato
        $miss = mysqli_query($con, $missatge);
        if(mysqli_num_rows($miss) > 0){
            while($mostrar=mysqli_fetch_array($miss)){
               $eliminarMissatge = 'DELETE FROM missatge WHERE missatge.nomUsuari = "'.$mostrar['nomUsuari'].'"';
               $resultado = mysqli_query($con,$eliminarMissatge);
            }
        }

        $recomanat = 'SELECT * FROM recomanat WHERE recomanat.video = "'.$vid.'"'; //sacamos los contenidos favoritos asociados al contrato
        $rec = mysqli_query($con, $recomanat);

        if(mysqli_num_rows($rec) > 0){
            while($mostrar=mysqli_fetch_array($rec)){
                $eliminarRec = 'DELETE FROM recomanat WHERE recomanat.video = "'.$mostrar['video'].'"';
                $resultado = mysqli_query($con,$eliminarRec);
            }
        }

      
        $consulta = 'DELETE FROM contingut WHERE contingut.video = "'.$vid.'"';
        $resultado = mysqli_query($con,$consulta);

        include "VisualizacionContenidos.php";
    ?>
</body>
</html>