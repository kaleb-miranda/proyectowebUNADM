<?php
require("conexion.php");
session_start();
if (!isset($_SESSION["se_usuario"])) {
    // Si el tipo de usuario no es SE, se redirige a otra página
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

        <div class="rectangle-7">
            <div class="contenedor-texto">
                <p class="primero"><?php echo '<h2>!Bienvenido ' . $user["nombre"] . ' ' . $user["apellidoPaterno"] . ' ', $user["apellidoMaterno"] . ' Has ingresado como: ' . $user["tipoUsuario"] . '</h2>' ?></p>
                <p class="liderazgo">"Liderazgo a traves del conocimiento"</p>
            </div>
            <div class="logo2">
                <img src="img/MU-logo.jpg" alt="logo">
            </div>
        </div>

        <div class="rectangle-4"></div>
        <br>
        <br>


        <div class="centrados">
            <p class="quienes">¿Quienes somos?</p>
            <p class="institucion">"En nuestra institución, brindamos una formación de nivel mundial que prepara a nuestros estudiantes para el mercado laboral tanto a nivel nacional como internacional. Con 29 campus a su disposición, ofrecemos diversas opciones de programas de licenciatura, ingeniería, carreras ejecutivas y maestrías, permitiéndoles construir su futuro exitoso en una de las mejores universidades privadas de México."</p>
        </div>

        <div class="rectangle-4"></div>
        <br>
        <br>




        <div class="centrados">

            <p class="quienes">Conoce nuestro campus de CDMX</p>

        </div>

        <div class="images">
            <img src="img/campus1.jpg" alt="campus1">
            <img src="img/campus2.jpg" alt="campus2">
            <img src="img/campus3.jpeg" alt="campus3">
        </div>







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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </footer>
</body>

</html>