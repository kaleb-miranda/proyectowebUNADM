<?php
    session_start();
    if (!isset($_SESSION['se_usuario'])) {
        header("Location: login.php");
        exit;
    }

    if (isset($_GET['id'])) {
        require("conexion.php");

        $id = $_GET['id'];

        $sql = "DELETE FROM inscripcion WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('se ha borrado correctamente!');
            window.location.href= 'consultar_SE.php';
            </script>";
        } else {
            echo "<p>No se encontró ninguna inscripción con el ID $id.</p>";
        }
    }
?>