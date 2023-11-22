<?php

include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario de edición
    $id = $_POST['id'];
    $idVuelo = intval($_POST['idVuelo']);
    $capacidadCombus = $_POST['capacidadCombus'];
    $emisionCarbono = $_POST['emisionCarbono'];
    $nAsientos = $_POST['nAsientos'];
    $aeropuertoActual = $_POST['aeropuertoActual'];
    $Velocidad = $_POST['Velocidad'];
    $Pantallas = $_POST['Pantallas'];

    // Actualizar los datos en la base de datos (debes proporcionar tus propias consultas)
    $consulta = "UPDATE tbl_avion SET idVuelo = $idVuelo, CapacidadCombus = '$capacidadCombus', emisionCarbono = '$emisionCarbono', nAsientos = $nAsientos, AeropuertoActual = '$aeropuertoActual', Velocidad = '$Velocidad', Pantallas = '$Pantallas' WHERE idAvion='$id'";

    if (mysqli_query($conexion, $consulta)) {
        // Redireccionar a alguna página después de la actualización exitosa
        header("location:../Formularios/categorias/index.php");
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
