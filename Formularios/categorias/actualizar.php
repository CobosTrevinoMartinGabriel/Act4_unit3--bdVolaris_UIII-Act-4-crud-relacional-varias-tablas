<?php
require_once("../../config/conexion.php");
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>css/bootstrap.min.css">

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
                        <h5 class="card-title text-center">ACTUALIZAR AVION</h5>
                        <form action="<?php echo base_url; ?>CRUDC/editarDatos.php" method="post">
                            <?php
                            include_once("../../config/conexion.php");

                            $sql = "SELECT * FROM tbl_avion WHERE idAvion =" . $_REQUEST['Id'];
                            $resultado = $conexion->query($sql);

                            $row = $resultado->fetch_assoc();
                            ?>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['idAvion'] ?>">
                            <div class="mb-3">
                                <label for="nombreC" class="form-label">ID Vuelo</label>
                                <select name="idVuelo" id="idVuelo">
                                    <?php 
                                    $vuelos = mysqli_query($conexion,"SELECT idVuelo FROM tbl_vuelo");

                                    while ($vuelo = $vuelos->fetch_assoc()) {?>
                                        <option value="<?php echo $vuelo['idVuelo'] ?>"><?php echo $vuelo['idVuelo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Capacidad de combustible</label>
                                <input type="text" class="form-control" id="capacidadCombus" name="capacidadCombus" placeholder="323,200 litros" value="<?php echo $row['CapacidadCombus'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Emision de carbono</label>
                                <input type="text" class="form-control" id="emisionCarbono" name="emisionCarbono" placeholder="112 kg" value="<?php echo $row['emisionCarbono'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">nAsientos</label>
                                <input type="number" min="0" class="form-control" id="nAsientos" name="nAsientos" placeholder="292" value="<?php echo $row['nAsientos'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Aeropuerto actual</label>
                                <input type="text" class="form-control" id="aeropuertoActual" name="aeropuertoActual" placeholder="Aeropuerto Internacional de Monterrey." value="<?php echo $row['AeropuertoActual'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Velocidad</label>
                                <input type="text" class="form-control" id="Velocidad" name="Velocidad" placeholder="400km/h" value="<?php echo $row['Velocidad'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Tiene pantallas?</label>
                                <input type="number" min="0" max="1" class="form-control" id="Pantallas" name="Pantallas" placeholder="1"  value="<?php echo $row['Pantallas'] == 0? 0:$row['Pantallas'] ?>">
                            </div>
                            <div class="text-center">
                                <a href="../categorias/index.php" type="submit" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url; ?>js/bootstrap.min.js"></script>

</body>

</html>