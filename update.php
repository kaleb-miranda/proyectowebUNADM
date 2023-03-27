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


$id = $_GET['id'];


$sql = "SELECT * FROM inscripcion WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$inscripcion = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$inscripcion) {
    echo "<p>No se encontró la inscripción con el ID $id</p>";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencia de aprendizaje</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header>
        <div class="logo">
            <img src="img/MU-logo.jpg" alt="logo">
        </div>


        <nav class="link-bar-3">
            <a href="./servicios_escolares.php" class="nav-link">Inicio</a>
            <a href="./preinscribir_SE.php" class="nav-link">Preinscribir Asignatura</a>
            <a href="./consultar_SE.php" class="nav-link">Consultar Inscripcion</a>
            <a href="salir.php" class="nav-link">Salir</a>

        </nav>


    </header>

    <div class="rectangle-4"></div>


    <main>

        <p class="primero"><?php echo '<h2>Usuario: ' . $user["nombre"] . ' ' . $user["apellidoPaterno"] . ' ', $user["apellidoMaterno"] . '</h2>' ?></p>

        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $inscripcion['id']; ?>">
            <label for="asignatura">Asignatura:</label>
            <input type="text" name="asignatura" value="<?php echo $inscripcion['asignatura']; ?>"><br>
            <label for="grupo">Grupo:</label>
            <input type="text" name="grupo" value="<?php echo $inscripcion['grupo']; ?>"><br>
            <label for="profesor">Profesor:</label>
            <input type="text" name="profesor" value="<?php echo $inscripcion['profesor']; ?>"><br>
            <label for="turno">Turno:</label>
            <input type="text" name="turno" value="<?php echo $inscripcion['turno']; ?>"><br>
            <label for="semestre">Semestre:</label>
            <input type="text" name="semestre" value="<?php echo $inscripcion['semestre']; ?>"><br>
            <label for="estatus">Estatus:</label>
            <input type="text" name="estatus" value="<?php echo $inscripcion['estatus']; ?>"><br>
            <input type="submit" value="Actualizar">
        </form>








    </main>

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
</body>

</html>