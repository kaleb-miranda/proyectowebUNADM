<?php

session_start();

require("conexion.php");

$matricula = $_POST['matricula'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE matricula = :matricula";
$stmt = $db->prepare($sql);
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
  echo "<script>alert('Usuario no encontrado');
  window.location.href= 'login.php';
  </script>";
} else {
  if (password_verify($password, $usuario['password'])) {
    if ($usuario['tipoUsuario'] == 'SE') {
      $_SESSION['se_usuario'] = $usuario['matricula'];
      header("Location: servicios_escolares.php");
    } else if ($usuario['tipoUsuario'] == 'AL') {
      $_SESSION['usuario'] = $usuario['matricula'];
      header("Location: panel_usuario.php");
    }
  } else {
    echo "<script>alert('Contraseña incorrecta');
    window.location.href= 'login.php';
    </script>";
  }
}


?>