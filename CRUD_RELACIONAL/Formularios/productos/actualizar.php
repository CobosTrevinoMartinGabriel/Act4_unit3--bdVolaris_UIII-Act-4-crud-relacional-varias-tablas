<?php
include_once("../../config/conexion.php")
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>css/bootstrap.min.css">
</head>

<body>

    <!-- CODIGO DE NAVBAR RESPONSIVA -->
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url; ?>">
                    <img src="<?php echo base_url; ?>img/logo.png" alt="logo" height="55" width="115">
                </a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mi-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mi-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url; ?>">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url; ?>Formularios/productos/index.php">VUELOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url; ?>Formularios/categorias/index.php">AVIONES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url; ?>Formularios/marcas/index.php">PAQUETES</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- FIN CODIGO DE NAVBAR RESPONSIVA -->

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">ACTUALIZAR PRODUCTO</h5>
                        <form action="../../CRUDP/editarDatos.php" method="post">
                            <?php
                            include_once("../../config/conexion.php");

                            $sql = "SELECT * FROM tbl_vuelo WHERE idVuelo =" . $_REQUEST['Id'];
                            $resultado = $conexion->query($sql);

                            $row = $resultado->fetch_assoc();
                            ?>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['idVuelo'] ?>">

                            <!-- TRAER DATOS CATEGORIAS -->
                            <div class="mb-3">
                                <label for="categoriasU" class="form-label">Avion</label>
                                <select class="form-select form-select-lg" name="idAvion" id="idAvion">
                                    <option selected disabled>Seleccione un avion</option>
                                    <?php
                                    include_once("../../config/conexion.php");

                                    $sql1 = "SELECT * FROM tbl_avion WHERE idAvion=" . $row['idAvion'];
                                    $resultado1 = $conexion->query($sql1);
                                    $row1 = $resultado1->fetch_assoc();

                                    echo "<option selected value='" . $row1['idAvion'] . "'>" . $row1['idAvion'] . "</option>";

                                    $sql2 = "SELECT * FROM tbl_avion";
                                    $resultado2 = $conexion->query($sql2);

                                    while ($fila = $resultado2->fetch_array()) {
                                        if ($fila['idAvion'] !== $row1['idAvion']) {
                                            echo "<option value='" . $fila['idAvion'] . "'>" . $fila['idAvion'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="marcasU" class="form-label">Paquete</label>
                                <select class="form-select form-select-lg" name="idPaquete" id="idPaquete">
                                    <option selected disabled>Seleccione un paquete</option>
                                    <?php
                                    include_once("../../config/conexion.php");

                                    $sql3 = "SELECT * FROM tbl_paquete WHERE idPaquete=" . $row['idPaquete'];
                                    $resultado3 = $conexion->query($sql3);

                                    $row3 = $resultado3->fetch_assoc();

                                    echo "<option selected value='" . $row3['idPaquete'] . "'>".$row3['idPaquete'].":".$row3['nombreHotel']."</option>";

                                    $sql4 = "SELECT * FROM tbl_paquete";
                                    $resultado4 = $conexion->query($sql4);

                                    while ($fila = $resultado4->fetch_array()) {
                                        if ($fila['idPaquete'] !== $row3['idPaquete']) {
                                            echo "<option value='" . $fila['idPaquete'] . "'>".$fila['idPaquete'].":".$fila['nombreHotel']."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombreP" class="form-label">Fecha de salida</label>
                                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida" value="<?php echo $row['diaSalida']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionP" class="form-label">Asiento</label>
                                <input type="text" class="form-control" id="Asiento" name="Asiento" placeholder="5B" value="<?php echo $row['Asiento']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioP" class="form-label">Destino</label>
                                <input type="text" class="form-control" name="Destino" id="Destino" placeholder="Cancun,Mexico" value="<?php echo $row['Destino']?>" required>
                            </div>
                            <div class="text-center">
                                <a href="../productos/index.php" type="submit" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url; ?>js/bootstrap.min.js"></script>
    <script src="../../js/fontawesome.js"></script>

</body>

</html>