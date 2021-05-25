<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Telefono</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    //echo($codigo);
    $telefono = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;
    $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
    $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
    $sql = "INSERT INTO telefono VALUES (0, '$telefono', '$tipo', '$operadora','$codigo')";
    //echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamente!!!</p>";

    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }






    //cerrar la base de datos
    $conn->close();
    echo "<a  href='../admin/index.php?codigo=".$codigo."'>Regresar</a>";

    ?>
</body>

</html>