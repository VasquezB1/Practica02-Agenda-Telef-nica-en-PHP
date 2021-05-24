<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $codPer= $_POST["codPer"];

 //Si voy a eliminar físicamente el registro de la tabla
$sql = "DELETE FROM telefono WHERE tele_codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 //$sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE
//usu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }
 echo "<a href='../../vista/usuario/index.php?codigo=".$codPer."'>Regresar</a>";
 $conn->close();

 ?>
</body>
</html>