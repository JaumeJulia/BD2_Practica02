<!DOCTYPE html>
<html>
    <body>
        
    <?php
        include "../PHP/conexion.php";
        $idContracte = $_POST['idContracte'];

        $consultaFacturas = 'SELECT idFactura FROM factura WHERE factura.idContracte = "'.$idContracte.'"'; //sacamos las facturas asociadas al contrato
        $facturas = mysqli_query($con, $consultaFacturas);

        while($mostrar=mysqli_fetch_array($facturas)){
            $eliminarFactura = 'DELETE FROM factura WHERE factura.idFactura = "'.$mostrar['idFactura'].'"';
            $resultado = mysqli_query($con,$consulta);
        }

        $consultaCatfav = 'SELECT * FROM catfav WHERE catfav.idContracte = "'.$idContracte.'"'; //sacamos las categorias favoritas asociadas al contrato
        $catfav = mysqli_query($con, $consultaCatfav);

        while($mostrar=mysqli_fetch_array($catfav)){
            $eliminarCatfav = 'DELETE FROM catfav WHERE catfav.idContracte = "'.$mostrar['idContracte'].'"';
            $resultado = mysqli_query($con,$consulta);
        }

        $consultaContfav = 'SELECT * FROM contfav WHERE contfav.idContracte = "'.$idContracte.'"'; //sacamos los contenidos favoritos asociados al contrato
        $contfav = mysqli_query($con, $consultaContfav);

        while($mostrar=mysqli_fetch_array($contfav)){
            $eliminarContfav = 'DELETE FROM contfav WHERE contfav.idContracte = "'.$mostrar['idContracte'].'"';
            $resultado = mysqli_query($con,$consulta);
        }

        $consulta = 'DELETE from contracte where contracte.idContracte = "'.$idContracte.'"';

        $resultado = mysqli_query($con,$consulta);
        include "VisualizarContratos.php";
    ?>
</body>
</html>