<?php

include "../config/conexion.php";

$idAvion = $_POST['idAvion'];
$idPaquete = intval($_POST['idPaquete']);
$get = mysqli_query($conexion,"SELECT duracion,Precio FROM tbl_paquete WHERE idPaquete=$idPaquete");
$geto = array();
while ($row=mysqli_fetch_assoc($get)){
    $geto[] = $row;
}

$diaIda = $_POST['fechaSalida'];
$fechaInicial = new DateTime($diaIda);
$duracion = $geto[0]["duracion"];
$fechaFinal = date_add($fechaInicial,date_interval_create_from_date_string($duracion));
$fechaInicia2 = $fechaFinal ->format('Y-m-d');
// $fechaSuma = strtotime($diaIda.'+ $geto[0]["duracion"]');

$asiento = $_POST['Asiento'];
$precio = $geto[0]["Precio"]*0.25;
$destino = $_POST["Destino"];

$sql = "INSERT INTO tbl_vuelo(idAvion,idPaquete,diaSalida,diaRegreso,Asiento,Costo,Destino)
    VALUES ($idAvion,$idPaquete,'$diaIda','$fechaInicia2','$asiento',$precio,'$destino')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado == TRUE) {
    header("location:../Formularios/productos/index.php");
} else {
    echo "Datos no insertados";
}
