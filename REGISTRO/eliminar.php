<?php
include "D:/Juegos/htdocs/REGISTRO/conexion/conexión.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM registro WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: registros.php");
    } else {
        echo "<p class='text-danger'>Error al eliminar el registro: " . $conexion->error . "</p>";
    }
}
?>
