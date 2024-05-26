<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Modificar Registro</h2>
        <?php
            include "D:/Juegos/htdocs/REGISTRO/conexion/conexión.php";

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = $conexion->query("SELECT * FROM registro WHERE id = $id");
                $datos = $sql->fetch_object();
            }

            if (isset($_POST['modificar'])) {
                $evento = $_POST["Evento"];
                $nombre = $_POST["Nombre"];
                $apellidos = $_POST["Apellidos"];
                $cedula = $_POST["Cedula"];
                $correo = $_POST["Correo"];
                $telefono = $_POST["Telefono"];
                $fecha = $_POST["Fecha"];
                
                $sql = "UPDATE registro SET Evento='$evento', Nombre='$nombre', Apellido='$apellidos', Cedula='$cedula', Correo='$correo', Telefono='$telefono', Fecha='$fecha' WHERE Id=$id";

                if ($conexion->query($sql) === TRUE) {
                    echo "<p class='text-success'>Registro modificado con éxito</p>";
                    header("Location: registros.php");
                } else {
                    echo "<p class='text-danger'>Error al modificar el registro: " . $conexion->error . "</p>";
                }
            }
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="evento">Evento</label>
                <input type="text" class="form-control" id="evento" name="Evento" value="<?= $datos->Evento ?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="Nombre" value="<?= $datos->Nombre ?>">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="Apellidos" value="<?= $datos->Apellido ?>">
            </div>
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="Cedula" value="<?= $datos->Cedula ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="Correo" value="<?= $datos->Correo ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="Telefono" value="<?= $datos->Telefono ?>">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha" name="Fecha" value="<?= $datos->Fecha ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="modificar">Modificar</button>
            <a href="registros.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
