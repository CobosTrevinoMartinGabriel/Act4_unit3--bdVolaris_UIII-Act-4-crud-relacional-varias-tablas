<?php

include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario de edición
    $id = $_POST['id'];
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

    // Actualizar los datos en la base de datos (debes proporcionar tus propias consultas)
    $consulta = "UPDATE tbl_vuelo SET idAvion = $idAvion, idPaquete = $idPaquete, diaSalida = '$diaIda',diaRegreso = '$fechaInicia2', Asiento = '$asiento',Costo = $precio,Destino = '$destino' WHERE idVuelo = $id";

    if (mysqli_query($conexion, $consulta)) {
        // Redireccionar a alguna página después de la actualización exitosa
        header("location:../Formularios/productos/index.php");
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
