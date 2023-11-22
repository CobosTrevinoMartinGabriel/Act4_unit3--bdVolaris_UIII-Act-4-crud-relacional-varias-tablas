<?php
require_once("../../config/conexion.php");
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>
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
                        <h5 class="card-title text-center">REGISTRAR PAQUETE</h5>
                        <form action="<?php echo base_url; ?>CRUDM/insertarDatos.php" method="POST">
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
                                <label for="estadoC" class="form-label">ID Cliente</label>
                                <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="312">
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Duracion</label>
                                <input type="text" class="form-control" id="duracion" name="duracion" placeholder="3 days" >
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Nombre del hotel</label>
                                <input type="text" class="form-control" id="nombreHotel" name="nombreHotel" placeholder="Mayan Palace" >
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="15000" >
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Numero de habitaciones</label>
                                <input type="number" class="form-control" id="nHabitaciones" name="nHabitaciones" placeholder="4" >
                            </div>
                            <div class="mb-3">
                                <label for="estadoC" class="form-label">Numero de viajeros</label>
                                <input type="number" class="form-control" id="nViajeros" name="nViajeros" placeholder="8" min="0">
                            </div>
                            <div class="text-center">
                                <a href="<?php echo base_url; ?>Formularios/categorias/index.php" type="submit" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
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