<!DOCTYPE html>
<html>

<head>
   <link href="../../../css/estilos1.css" rel="stylesheet" />
   <meta charset="UTF-8">
   <title>Modificar datos de persona</title>
   <script lenguage="javascript" type="text/javascript" src="../../../js/validaciones_usuarios.js "></script>
   <style type="text/css">
      .error {
         color: red;
         font-size: 1.5em;
      }

      .bien {
         color: black;
         font-size: 2em;
      }
   </style>
</head>

<body>
<header class="enc1">
        <img class="logo" src="../../../images/LOGO UPS -01.png" alt="Logo UPS" />
        <img class="icono" src="../../../images/usuario.png" alt="Usuario" />
        <img class="icono" src="../../../images/charla.png" alt="Mensajes" />
        <img class="icono" src="../../../images/mas.png" alt="Mas" />

        <br><br><br><br>
    </header>
<h1>Modificar Datos Usuario</h1>
   <?php
   session_start();
   if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
      header("Location: /Agenda_Telefonica/public/vista/login.html");
   }
   ?>
   <?php
   $codigo = $_GET["codigo"];

   $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
   include '../../../config/conexionBD.php';
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
   ?>
         <form class="formu" id="formulario01" method="POST" action="../../controladores/usuario/modificar.php">

            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <input type="hidden" id="correo" name="correo" value="<?php echo $row["usu_correo"] ?>" />
            <input type="hidden" id="rol" name="rol" value="<?php echo $row["usu_rol"] ?>" />
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..." oninput="return validarCedula(this)" />
            <span id="mensajeCedula" class="error"></span>

            <br><br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
                                                                  ?>" required placeholder="Ingrese los dos nombres ..." onkeyup="return validarLetrasN(this)" onblur="validarDosNombres()" />
            <span id="mensajeNombres" class="error"></span>
            <br><br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
                                                                        ?>" required placeholder="Ingrese los dos apellidos ..." onkeyup="return validarLetrasA(this)" onblur="validarDosApellidos()" />
            <span id="mensajeApellidos" class="error"></span>
            <br><br>
            <label for="direccion">Direcci??n (*)</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                        ?>" required placeholder="Ingrese la direcci??n ..." />
            <span id="mensajeDireccion" class="error"></span>
            <br><br>

            <label for="fecha">Fecha Nacimiento (*)</label>
            <input class="largos" type="text" id="fecha" name="fecha" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese su fecha de nacimiento (yyyy-mm-dd)" onkeyup="return validarFecha(this)" />
            <span id="mensajeFechaNac" class="error"></span>
            <br><br>

            <input class="boton" type="submit" id="modificar" name="modificar" value="Modificar" />
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
        Byron Simon Vasquez Salda??a&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">bvasquezs@est.ups.edu.ec</a> &#8226;
        <a href=???0987815997???> 0987815997 </a><br>
        Jose Guillermo Quinde Delgado&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">jquinded@est.ups.edu.ec</a> &#8226;
        <a href=???0991352595???> 0991352595 </a>
        <br>?? Todos los derechos reservados<br>

        <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
        <br>

    </footer>
</body>

</html>