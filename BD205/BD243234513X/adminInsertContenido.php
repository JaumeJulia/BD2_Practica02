<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $cat= $_POST['categoria'];

    $tit= $_POST['titulo'];

    $vid= $_POST['video'];

    $date= $_POST['fecha'];
      
}


include "../PHP/conexion.php";


$cat= $_POST['categoria'];

$tit= $_POST['titulo'];

$vid= $_POST['video'];

$date= $_POST['fecha'];

$edad=$_POST['edad'];
if($edad>18){
    $edad1='>18';
}else if($edad<9){
    $edad1='<9';
}else{
    $edad1='9-18';

}

$intrRec = "INSERT INTO recomanat VALUES ('".$edad1."','".$vid."')";
$resultado = mysqli_query($con,$intrRec);

$cadena = "INSERT INTO contingut VALUES ('".$cat."', '".$tit."', '".$vid."', '".$date."' )";

if (mysqli_query($con,$cadena)) {

$cadenase1="SELECT usuari.nomUsuari FROM usuari 
INNER JOIN (recomanat 
    INNER JOIN contingut ON recomanat.video=contingut.video)
ON usuari.tipusUsuari=recomanat.tipusUsuari
INNER JOIN (contracte 
    INNER JOIN catfav ON contracte.idContracte=catfav.idContracte)
ON usuari.nomUsuari=contracte.nomUsuari
WHERE catfav.categoria=contingut.categoria AND contingut.video='".$vid."'";

$resu = mysqli_query($con,$cadenase1);

if(!empty($resu) && mysqli_num_rows($resu) > 0){

while($mostrar=mysqli_fetch_array($resu)){


    $misid = "SELECT idMissatge FROM missatge ORDER BY idMissatge";

    $missat = mysqli_query($con, $misid);

    $nuevaId = 1;

    while ($idmis = mysqli_fetch_array($missat)) {
     
        $idActual = $idmis["idMissatge"];

        if($nuevaId == $idActual){
            $nuevaId = $nuevaId + 1;

        }else{
            break;

        }

        
    }
    $in ="INSERT INTO missatge VALUES('".$nuevaId."','".$mostrar['nomUsuari']."','".$vid."','Puede que te interese esto','FALSE' )";
    $res=mysqli_query($con,$in);
    
}
}
    echo "<script>
alert('Contenido creado');
window.location.href='../PHP/Admin.php';
</script>";

 
}else {

    echo "<script>
alert('Error al crear contenido');
window.location.href='../PHP/Admin.php';
</script>";

}

mysqli_close($con);

?>