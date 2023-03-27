<?php

include ("conexion.php");

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellidoPaterno'];
$apellido_materno = $_POST['apellidoMaterno'];
$turno = $_POST['turno'];
$tipo_usuario = $_POST['tipoUsuario'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$recaptcha_token = $_POST['recaptcha_token'];
$secret_key = '6Lc82t8kAAAAALKfB9D5XzqceR7LsYRUIec9oKmK';

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_token");
$response = json_decode($response, true);

if ($response['success'] == true) {

  

if (empty($matricula) || empty($nombre) || empty($apellido_paterno) || empty($apellido_materno) || empty($turno) || empty($password) || empty($confirm_password)) {
  die("<script>alert('Error: todos los campos son obligatorios');
  window.location.href= 'registrate.php';
  </script>");
}


if (strlen($password) < 9 || !preg_match('/\d/', $password) || !preg_match('/[a-zA-Z]/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
  die("<script>alert('Error: la contraseña debe tener al menos 9 caracteres y debe incluir una combinación de letras, números y caracteres especiales');
  window.location.href= 'registrate.php';
  </script>");
}


if ($password !== $confirm_password) {
  die("<script>alert('Error: la contraseña no coincide con la confirmacion');
  window.location.href= 'registrate.php';
  </script>");
}


$sql = "SELECT * FROM usuarios WHERE matricula = :matricula";
$stmt = $db->prepare($sql);
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();


if ($stmt->rowCount() > 0) {
  die("<script>alert('El alumno ya se encuentra inscrito, porfavor ingrese otros datos');
  window.location.href= 'registrate.php';
  </script>");
}

$sql = "INSERT INTO usuarios (matricula, nombre, apellidoPaterno, apellidoMaterno, turno, tipoUsuario, password) VALUES (:matricula, :nombre, :apellidoPaterno, :apellidoMaterno, :turno, :tipoUsuario, :password)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidoPaterno', $apellido_paterno);
$stmt->bindParam(':apellidoMaterno', $apellido_materno);
$stmt->bindParam(':turno', $turno);
$stmt->bindParam(':tipoUsuario', $tipo_usuario);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt->bindParam(':password', $hashed_password);
$stmt->execute();
echo "<script>alert('El usuario ha sido registrado exitosamente');
window.location.href= 'registrate.php';
</script>";
    // El token de ReCaptcha es válido, procesa el formulario de registro
} else {

  echo "<script>alert('error');
window.location.href= 'registrate.php';
</script>";
    // El token de ReCaptcha no es válido, muestra un mensaje de error
}
