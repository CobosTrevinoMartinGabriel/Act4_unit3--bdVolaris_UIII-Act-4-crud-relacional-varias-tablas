<?php

include "../config/conexion.php";


$idVuelo = intval($_POST['idVuelo']);
$idCliente = $_POST['idCliente'];
$Duracion = $_POST['duracion'];
$NombreHotel = $_POST['nombreHotel'];
$precio = $_POST['precio'];
$habit = $_POST['nHabitaciones'];
$travel = $_POST['nViajeros'];

$sql = "INSERT INTO tbl_paquete(idVuelo,idCliente,duracion,nombreHotel,Precio,nHabitaciones,nViajeros)
    VALUES ($idVuelo,$idCliente,'$Duracion','$NombreHotel',$precio,$habit,$travel )";

$resultado = mysqli_query($conexion, $sql);

if ($resultado == TRUE) {
    header("location:../Formularios/marcas/index.php");
} else {
    echo "Datos no insertados";
}
