<!DOCTYPE html>
<html>
    <body>
        
    <?php
        include "../PHP/conexion.php";
        $user = $_POST['nomUsuari'];

        $idContracte ='SELECT idContracte FROM contracte WHERE contracte.idContracte="'.$user.'"';

        $consultaFacturas = 'SELECT idFactura FROM factura WHERE factura.idContracte = "'.$idContracte.'"'; //sacamos las facturas asociadas al contrato
        $facturas = mysqli_query($con, $consultaFacturas);
        if($facturas){
            while($mostrar=mysqli_fetch_array($facturas)){
               $eliminarFactura = 'DELETE FROM factura WHERE factura.idFactura = "'.$mostrar['idFactura'].'"';
               $resultado = mysqli_query($con,$eliminarFactura);
            }
        }
        $consultaCatfav = 'SELECT * FROM catfav WHERE catfav.idContracte = "'.$idContracte.'"'; //sacamos las categorias favoritas asociadas al contrato
        $catfav = mysqli_query($con, $consultaCatfav);
        if($catfav){
            while($mostrar=mysqli_fetch_array($catfav)){
                $eliminarCatfav = 'DELETE FROM catfav WHERE catfav.idContracte = "'.$mostrar['idContracte'].'"';
                $resultado = mysqli_query($con,$eliminarCatfav);
            }
        }
        $consultaContfav = 'SELECT * FROM contfav WHERE contfav.idContracte = "'.$idContracte.'"'; //sacamos los contenidos favoritos asociados al contrato
        $contfav = mysqli_query($con, $consultaContfav);

        if($contfav){
            while($mostrar=mysqli_fetch_array($contfav)){
                $eliminarContfav = 'DELETE FROM contfav WHERE contfav.idContracte = "'.$mostrar['idContracte'].'"';
                $resultado = mysqli_query($con,$eliminarContfav);
            }
        }
        $consultaCont = 'SELECT * FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos los contenidos favoritos asociados al contrato
        $cont = mysqli_query($con, $consultaCont);

        if($cont){
            while($mostrar=mysqli_fetch_array($cont)){
                $eliminarCont = 'DELETE FROM contracte WHERE contracte.idContracte = "'.$mostrar['idContracte'].'"';
                $resultado = mysqli_query($con,$eliminarCont);
            }
        }
        $consulta = 'DELETE from contracte where contracte.idContracte = "'.$idContracte.'"';
        $resultado = mysqli_query($con,$consulta);

        $missatge = 'SELECT * FROM missatge WHERE missatge.nomUsuari = "'.$user.'"'; //sacamos los contenidos favoritos asociados al contrato
        $miss = mysqli_query($con, $missatge);
        if($miss){
        while($mostrar=mysqli_fetch_array($miss)){
            $eliminarMissatge = 'DELETE FROM missatge WHERE missatge.nomUsuari = "'.$mostrar['nomUsuari'].'"';
            $resultado = mysqli_query($con,$eliminarMissatge);
        }
        }
        $consulta = 'DELETE from usuari where usuari.nomUsuari = "'.$user.'"';
        $resultado = mysqli_query($con,$consulta);

        include "VisualizacionUsuarios.php";
    ?>
</body>
</html>