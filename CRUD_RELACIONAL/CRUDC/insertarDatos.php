<?php

include "../config/conexion.php";


$idVuelo = intval($_POST['idVuelo']);
$capacidadCombus = $_POST['capacidadCombus'];
$emisionCarbono = $_POST['emisionCarbono'];
$nAsientos = $_POST['nAsientos'];
$aeropuertoActual = $_POST['aeropuertoActual'];
$Velocidad = $_POST['Velocidad'];
$Pantallas = $_POST['Pantallas'];

$sql = "INSERT INTO tbl_avion(idVuelo,CapacidadCombus,emisionCarbono,nAsientos,AeropuertoActual,Velocidad,Pantallas)
    VALUES ($idVuelo,'$capacidadCombus','$emisionCarbono',$nAsientos,'$aeropuertoActual','$Velocidad',$Pantallas )";

$resultado = mysqli_query($conexion, $sql);

if ($resultado == TRUE) {
    header("location:../Formularios/categorias/index.php");
} else {
    echo "Datos no insertados";
}
