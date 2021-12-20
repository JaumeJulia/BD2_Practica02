<?php

include "../PHP/conexion.php";

$cosultaContracte = "SELECT dataFinal, idContracte, tipusContracte FROM contracte";

$contestacioContracte = mysqli_query($con, $cosultaContracte);

while($rowContracte = mysqli_fetch_assoc($contestacioContracte)) {

    $diaActual = date("Y-m-d");

    if ($rowContracte["dataFinal"] < $diaActual) {

        echo "Impresion de factura" . "<br>";

        $idContracte = $rowContracte["idContracte"];

        $consultaIdFacturas = "SELECT idFactura FROM factura";

        $contestacioFactura = mysqli_query($con, $consultaIdFacturas);

        $nuevaId = 1;

        while ($rowFactura = mysqli_fetch_array($contestacioFactura)) {

            $idActual = $rowFactura["idFactura"];

            if($nuevaId != $idActual){

                break;

            }

            $nuevaId = $nuevaId + 1;
        }

        if ($rowContracte["tipusContracte"] == "mensual") {

            $import = 15;

        }else {

            $import = 40;

        }
        
        $insertarFactura = "INSERT INTO factura VALUES ('".$nuevaId."','".$idContracte."','".$diaActual."','".$import."')";

        if (mysqli_query($con,$insertarFactura)) {

            echo "<script>
        alert('Factura creada con éxito');
        </script>";
        
        } else {
        
            echo "<script>
        alert('Error al crear la factura');
        </script>";
        
        }
    }

    echo $rowContracte["dataFinal"] . "<br>";
    echo $rowContracte["idContracte"] . "<br>";
    echo $rowContracte["tipusContracte"] . "<br>";
    echo "<br>";

}

mysqli_close($con);

?>