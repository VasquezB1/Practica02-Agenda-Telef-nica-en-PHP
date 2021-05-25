<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <title>Eliminar datos de la persona</title>
   <link href="../../../css/estilos1.css" rel="stylesheet" />
</head>

<body>
<header class="enc1">
        <img class="logo" src="../../../images/LOGO UPS -01.png" alt="Logo UPS" />
        <img class="icono" src="../../../images/usuario.png" alt="Usuario" />
        <img class="icono" src="../../../images/charla.png" alt="Mensajes" />
        <img class="icono" src="../../../images/mas.png" alt="Mas" />

        <br><br><br><br>
    </header>
   <?php
   session_start();
   if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
      header("Location: /Agenda_Telefonica/public/vista/login.html");
   }
   ?>
   <?php

   $codigo = $_GET["codigo"];
   $codPer = $_GET["codPer"];
   $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

   include '../../../config/conexionBD.php';
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
   ?>
         <form class="formu" id="formulario01" method="POST" action="../../controladores/admin/eliminar.php">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <input type="hidden" id="codPer" name="codPer" value="<?php echo $codPer ?>" />
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
            <br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
                                                                  ?>" disabled />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
                                                                        ?>" disabled />
            <br>
            <label for="direccion">Dirección (*)</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                        ?>" disabled />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
                                                                                    $row["usu_fecha_nacimiento"]; ?>" disabled />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
            <br>
            <label for="rol">Rol (*)</label>
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" disabled />
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

<footer>
        Byron Simon Vasquez Saldaña&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">bvasquezs@est.ups.edu.ec</a> &#8226;
        <a href=”0987815997”> 0987815997 </a><br>
        Jose Guillermo Quinde Delgado&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">jquinded@est.ups.edu.ec</a> &#8226;
        <a href=”0991352595”> 0991352595 </a>
        <br>© Todos los derechos reservados<br>

        <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
        <br>

    </footer>
</body>

</html>