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
                    <a class="nav-item nav-link active navbar-brand" href="./index.php">Inicio<span class="sr-only">(current)</span></a>
                    <a href="./registrate.php" class="nav-item nav-link active navbar-brand">Registrate</a>
                    <a href="./login.php" class="nav-item nav-link active navbar-brand">Iniciar sesion</a>
                </div>
            </div>
        </nav>

    </header>


    <div class="rectangle-4"></div>
    <br>


    <main>


        <form class="row g-3 centrados" action="procesar.php" method="POST">
            <div class="col-md-6">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
            </div>
            <div class="col-md-6">
                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required>
            </div>
            <div class="col-md-6">
                <label for="turno" class="form-label">Turno:</label>
                <select class="form-select" id="turno" name="turno">
                    <option value="matutino">Matutino</option>
                    <option value="vespertino">Vespertino</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tipoUsuario" class="form-label">Tipo de usuario:</label>
                <select class="form-select" id="tipoUsuario" name="tipoUsuario">
                    <option value="AL" selected>Alumno</option>
                    <option value="SE">Servicios Escolares</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="confirm_password" class="form-label">Confirmar contraseña:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

        </form>

    </main>

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

    <script src="https://www.google.com/recaptcha/api.js?render=6Lc82t8kAAAAAHg0aeURn6jvXx0AJr2qijU4xGan"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc82t8kAAAAAHg0aeURn6jvXx0AJr2qijU4xGan', {
                action: 'registro'
            }).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>




</body>

</html>