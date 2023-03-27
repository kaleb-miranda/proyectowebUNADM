<?php
require("conexion.php");

session_start();
if (!isset($_SESSION['se_usuario'])) {
    header("Location: login.php");
    exit;
}


$id = $_POST['id'];
$asignatura = $_POST['asignatura'];
$grupo = $_POST['grupo'];
$profesor = $_POST['profesor'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];
$estatus = $_POST['estatus'];


$sql = "UPDATE inscripcion SET asignatura = :asignatura, grupo = :grupo, profesor = :profesor, turno = :turno, semestre = :semestre, estatus = :estatus WHERE id = :id";
$stmt = $db->prepare($sql);


$stmt->bindParam(':asignatura', $asignatura);
$stmt->bindParam(':grupo', $grupo);
$stmt->bindParam(':profesor', $profesor);
$stmt->bindParam(':turno', $turno);
$stmt->bindParam(':semestre', $semestre);
$stmt->bindParam(':estatus', $estatus);
$stmt->bindParam(':id', $id);


if ($stmt->execute()) {
    echo "<script>alert('El registro ha sido actualizado correctamente');
    window.location.href= 'consultar_SE.php';
    </script>";
} else {
    echo "<script>alert('Ha ocurrido un error al actualizar el registro');
    window.location.href= 'consultar_SE.php';
    </script>";
}
?>
