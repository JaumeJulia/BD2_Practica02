<?php

$con = mysqli_connect("localhost","root","") or die("Localhost no disponible");

$db = mysqli_select_db($con,"BD205") or die("Base de dades no disponible");

?>
