<?php

session_start();
if (!isset($_SESSION['se_usuario'])) {
  header('Location: index.php');
  exit();
}


require_once 'conexion.php';



$asignatura = $_POST['asignatura'];
$grupo = $_POST['grupo'];
$profesor = $_POST['profesor'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];
$estatus = $_POST['estatus'];


$matricula = $_SESSION['se_usuario'];


$stmt = $db->prepare('INSERT INTO inscripcion (matricula, asignatura, grupo, profesor, turno, semestre, estatus) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$matricula, $asignatura, $grupo, $profesor, $turno, $semestre, $estatus]);


echo "<script>alert('ha registrado la preinscripcion correctamente!');
    window.location.href= 'preinscribir_SE.php';
    </script>";
exit();
?>
