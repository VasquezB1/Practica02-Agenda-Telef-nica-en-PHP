<!DOCTYPE html>
<html>

<head>
<link href="../../../css/estilos1.css" rel="stylesheet" />
   <meta charset="UTF-8">
   <title>Cambio Contraseña persona</title>
   <script lenguage="javascript" type="text/javascript" src="../../../js/validaciones_usuarios.js "></script>
   <style type="text/css">
    .error {
      color: red;
      font-size: 20px;
    }

    .bien {
      color: black;
      font-size: 40px;
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
   <?php
   session_start();
   if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
      header("Location: /Agenda_Telefonica/public/vista/login.html");
   }
   ?>
   <?php
   $codigo = $_GET["codigo"];
   $codPer = $_GET["codPer"];
   ?>
   <form class="formu" id="formulario01" method="POST" action="../../controladores/admin/cambiar_contrasena.php">

      <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
      <input type="hidden" id="codPer" name="codPer" value="<?php echo $codPer ?>" />
      <label for="cedula">Contraseña Actual (*)</label>
      <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
      <br>
      <label for="cedula">Contraseña Nueva (*)</label>
      <input type="password" id="contrasena" name="contrasena" value="" required placeholder="Ingrese su contraseña nueva ..." onkeyup="return validarPassword(this)" onblur="validarCaracteres()" />
      <span id="mensajeContra" class="error"></span>
      <br>

      <input class="boton" type="submit" id="modificar" name="modificar" value="Modificar" />
      <input class="boton" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
   </form>
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