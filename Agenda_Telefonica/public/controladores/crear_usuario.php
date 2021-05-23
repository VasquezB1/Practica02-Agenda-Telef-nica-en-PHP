<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $rol = isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null;
    $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$correo', MD5('$contrasena'), '$fecha', 'N', null, null,'$rol')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }






    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

    ?>
</body>

</html>