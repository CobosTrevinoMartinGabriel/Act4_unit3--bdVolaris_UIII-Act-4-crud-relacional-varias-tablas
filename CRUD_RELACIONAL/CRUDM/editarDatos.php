<?php

include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario de edición
    $id = $_POST['id'];
    $idVuelo = intval($_POST['idVuelo']);
    $idCliente = intval($_POST['idCliente']);
    $Duracion = $_POST['duracion'];
    $NombreHotel = $_POST['nombreHotel'];
    $precio = intval($_POST['precio']);
    $habit = intval($_POST['nHabitaciones']);
    $travel = intval($_POST['nViajeros']);

    // Actualizar los datos en la base de datos (debes proporcionar tus propias consultas)
    $consulta = "UPDATE tbl_paquete SET idVuelo = $idVuelo, idCliente = $idCliente, duracion = '$Duracion', nombreHotel = '$NombreHotel', Precio = $precio, nHabitaciones = $habit, nViajeros = $travel WHERE idPaquete=$id";

    if (mysqli_query($conexion, $consulta)) {
        // Redireccionar a alguna página después de la actualización exitosa
        header("location:../Formularios/marcas/index.php");
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
