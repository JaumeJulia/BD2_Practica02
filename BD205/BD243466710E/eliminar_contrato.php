<!DOCTYPE html>
<html>
    <body>
        
    <?php
        include "../../PHP/conexion.php";
        $idContracte = $_POST['idContracte'];
        $consultaFacturas = 'SELECT idFactura FROM factura WHERE factura.idContracte = "'.$idContracte.'"'; //sacamos las facturas asociadas al contrato
        $facturas = mysqli_query($con, $consultaFacturas);

        while($mostrar=mysqli_fetch_array($facturas)){
            $eliminarFactura = 'DELETE FROM factura WHERE factura.idFactura = "'.$mostrar['idFactura'].'"';
        }

        $arrayContracte = mysqli_fetch_array($contestacioContracte);
        $idContracte = $arrayContracte['idContracte'];

        $consulta = 'DELETE from CATFAV where CATFAV.idContracte = "'.$idContracte.'" AND CATFAV.categoria = "'.$eliminar.'"';

        $resultado = mysqli_query($con,$consulta);

        include "mostrar_categoria_favorita.php";

    ?>
</body>
</html>