<?php
include_once("../../config/conexion.php")
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>
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
                        <h5 class="card-title text-center">REGISTRAR VUELO</h5>
                        <form action="../../CRUDP/insertarDatos.php" method="POST">
                            <div class="mb-3">
                                <label for="categoriasP" class="form-label">Paquete</label>
                                <select class="form-select form-select-lg" name="idPaquete" id="idPaquete" required>
                                    <option selected disabled>Seleccione un paquete</option>
                                    <?php
                                    include "../../config/conexion.php";

                                    $sql = $conexion->query("SELECT * FROM tbl_paquete");
                                    while ($resultado = $sql->fetch_assoc()) {
                                        echo "<option value='".$resultado['idPaquete']."'>".$resultado['idPaquete'].":". $resultado['nombreHotel'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="marcasP" class="form-label">Avion</label>
                                <select class="form-select form-select-lg" name="idAvion" id="idAvion" required>
                                    <option selected disabled>Seleccione un avion</option>
                                    <?php
                                    include "../../config/conexion.php";

                                    $sql = $conexion->query("SELECT * FROM tbl_avion");
                                    while ($resultado = $sql->fetch_assoc()) {
                                        echo "<option value='" . $resultado['idAvion'] . "'>" . $resultado['idAvion'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombreP" class="form-label">Fecha de salida</label>
                                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionP" class="form-label">Asiento</label>
                                <input type="text" class="form-control" id="Asiento" name="Asiento" placeholder="5B" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioP" class="form-label">Destino</label>
                                <input type="text" class="form-control" name="Destino" id="Destino" placeholder="Cancun,Mexico" required>
                            </div>
                            <div class="text-center">
                                <a href="../productos/index.php" type="submit" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/fontawesome.js"></script>

</body>

</html>