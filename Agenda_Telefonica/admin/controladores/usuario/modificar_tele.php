<head>
 <meta charset="UTF-8">
 <title>Modificar Telefono </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
 $codPer = isset($_POST["codPer"]) ? trim($_POST["codPer"]) : null;
 $sql = "UPDATE telefono " .
 "SET tele_numero = '$numero', " .
 "tele_tipo = '$tipo', " .
 "tele_operadora = '$operadora', " .
 "tele_usu_codigo = '$codPer' " .
 "WHERE tele_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado el telefono correctamente!!!<br>";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='../../vista/usuario/index.php?codigo=".$codPer."'>Regresar</a>";
 $conn->close();
?>
</body>
</html>