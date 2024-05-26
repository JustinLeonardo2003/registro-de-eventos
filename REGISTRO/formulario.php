<?php
include "D:/Juegos/htdocs/REGISTRO/conexion/conexión.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["Nombre"]) && !empty($_POST["Apellidos"]) && !empty($_POST["Cedula"]) && !empty($_POST["Correo"]) && !empty($_POST["Telefono"]) && !empty($_POST["Fecha"])) {
        $evento = $_POST["Evento"];
        $nombre = $_POST["Nombre"];
        $apellidos = $_POST["Apellidos"];
        $cedula = $_POST["Cedula"];
        $correo = $_POST["Correo"];
        $telefono = $_POST["Telefono"];
        $fecha = $_POST["Fecha"];
        
        $sql = "INSERT INTO registro (Evento, Nombre, Apellido, Cedula, Correo, Telefono, Fecha) VALUES ('$evento', '$nombre', '$apellidos', '$cedula', '$correo', '$telefono', '$fecha')";

        if ($conexion->query($sql) === TRUE) {
            echo "<p class='text-success'>Registro exitoso</p>";
        } else {
            echo "<p class='text-danger'>Error al añadir persona: " . $conexion->error . "</p>";
        }
    } else {
        echo "<p class='text-danger'>Falta llenar algún campo.</p>";
    }
}
?>
