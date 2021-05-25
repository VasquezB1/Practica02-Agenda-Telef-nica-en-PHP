<!DOCTYPE html>
<html>

<head>
<link href="../../../css/estilos1.css" rel="stylesheet" />
   <meta charset="UTF-8">
   <title>Eliminar datos de persona</title>
</head>

<body>
<h1>Eliminar Datos Usuario</h1>
   <?php
   session_start();
   if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
      header("Location: /Agenda_Telefonica/public/vista/login.html");
   }
   ?>
   <?php

   $codigo = $_GET["codigo"];
   $sql = "SELECT * FROM telefono where tele_codigo=$codigo";

   include '../../../config/conexionBD.php';
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
   ?>
         <form class="formu" id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <input type="hidden" id="codPer" name="codPer" value="<?php echo $row["tele_usu_codigo"] ?>" />
            <label for="numero">Numero (*)</label>
            <input type="text" id="numero" name="numero" value="<?php echo $row["tele_numero"]; ?>" disabled />
            <br>
            <label for="tipo">Tipo (*)</label>
            <input type="text" id="tipo" name="tipo" value="<?php echo $row["tele_tipo"];
                                                            ?>" disabled />
            <br>
            <label for="operadora">Operadora (*)</label>
            <input type="text" id="operadora" name="operadora" value="<?php echo $row["tele_operadora"];
                                                                        ?>" disabled />
            <br>

            <input class="boton" type="submit" id="eliminar" name="eliminar" value="Eliminar" />
            <input class="boton" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
         </form>
   <?php
      }
   } else {
      echo "<p>Ha ocurrido un error inesperado !</p>";
      echo "<p>" . mysqli_error($conn) . "</p>";
   }
   $conn->close();
   ?>
</body>

</html>