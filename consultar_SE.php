<?php

require("conexion.php");

session_start();
if (!isset($_SESSION["se_usuario"])) {
    echo "<script>alert('Usuario no PERMITIDO');
  window.location.href= 'login.php';
  </script>";
    exit();
}



$stmt = $db->prepare("SELECT * FROM usuarios WHERE matricula = ?");
$stmt->execute([$_SESSION['se_usuario']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Evidencia de aprendizaje</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header>
        <div>
            <img src="img/MU-logo.jpg" width="70" height="70" class="d-inline-block align-top" alt="">
        </div>


        <nav class="navbar navbar-expand-lg navbar-light display-6" style="background-color: #FFFFFF;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active navbar-brand" href="./servicios_escolares.php">Inicio<span class="sr-only">(current)</span></a>
                    <a href="./preinscribir_SE.php" class="nav-item nav-link active navbar-brand">Preinscribir Asignatura</a>
                    <a href="./consultar_SE.php" class="nav-item nav-link active navbar-brand">Consultar Inscripcion</a>
                    <a href="salir.php" class="nav-item nav-link active navbar-brand">Salir</a>
                </div>
            </div>
        </nav>


    </header>

    <div class="rectangle-4"></div>


    <main>


        <div class="centrados">
            <p class="primero"><?php echo '<h2 class="centrados">Usuario:' . ' ' . $user["matricula"] . ' ' . 'Nombre: ' . $user["nombre"] . ' ', $user["apellidoPaterno"] . ' ' . $user["apellidoMaterno"] . '</h2>' ?></p>
        </div>

        <h1 class="centrados">Consulta de Inscripción</h1>
        <form method="POST" class="centrados">
            <label>Matrícula:</label>
            <input type="text" name="matricula" required>
            <br>
            <button type="submit">Consultar</button>
        </form>


        <?php
        if (isset($_POST['matricula'])) {

            require("conexion.php");

            $matricula = $_POST['matricula'];

            $sql = "SELECT * FROM inscripcion WHERE matricula = :matricula";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->execute();

            $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$inscripciones) {
                echo "<p class='centrados'>No se encontraron inscripciones para la matrícula $matricula</p>";
            } else {
                echo "<h1 class='centrados'>Inscripciones de la Matrícula $matricula</h1>";
                echo "<table border='1' class='table mx-auto'>
          <thead>
            <tr>
              <th>Asignatura</th>
              <th>Grupo</th>
              <th>Profesor</th>
              <th>Turno</th>
              <th>Semestre</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>";
                foreach ($inscripciones as $inscripcion) {
                    echo "<tr>
            <td>{$inscripcion['asignatura']}</td>
            <td>{$inscripcion['grupo']}</td>
            <td>{$inscripcion['profesor']}</td>
            <td>{$inscripcion['turno']}</td>
            <td>{$inscripcion['semestre']}</td>
            <td>{$inscripcion['estatus']}</td>
            <td>
            <a class='btn btn-warning' href='update.php?id={$inscripcion['id']}'>Editar</a>
            <a class='btn btn-danger' href='eliminar.php?id={$inscripcion['id']}' onclick='return confirm(\"¿Está seguro de que desea eliminar esta inscripción?\")'>Eliminar</a>
            
        </td>
          </tr>";
                }
                echo "</tbody></table>";
            }
        }
        ?>

    </main>

    <br>
    <br>
    <br>
    <br>


    <div class="container d-flex justify-content-center">
        <div class="card text-center" style="width: 18rem;">
            <img src="img/Servicios_Escolares.png" class="card-img-top" alt="Servicios escolares">
            <div class="card-body">
                <h5 class="card-title">Periodo de inscripción</h5>
                <p class="card-text">Del 1 de agosto al 15 de septiembre</p>
                <a href="#" class="btn btn-primary">Más información</a>
            </div>
        </div>
    </div>

    <br>


    <div class="rectangle-4"></div>


    <footer>
        <div class="contenedor-footer">
            <div class="columna">
                <img src="img/logos.webp" alt="redes">
            </div>

            <div class="columna">
                <img src="img/MU-logo.jpg" alt="logo">
                <p>Dirección: Av Lago de Guadalupe KM 3.5, Margarita Maza de Juárez, 52926 Cd López Mateos, Méx.</p>
            </div>

            <div class="columna">
                <p>copyright todos los derechos reservados</p>
            </div>

        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>