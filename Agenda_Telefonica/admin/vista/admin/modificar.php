<!DOCTYPE html>
<html>

<head>
<link href="../../../css/estilos1.css" rel="stylesheet" />
  <meta charset="UTF-8">
  <title>Modificar datos de la persona</title>
  <script lenguage="javascript" type="text/javascript" src="../../../js/validaciones_usuarios.js "></script>
  <style type="text/css">
    .error {
      color: red;
      font-size: 12px;
    }

    .bien {
      color: black;
      font-size: 12px;
    }
  </style>
</head>

<body>
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
      <form class="formu" id="formulario01" method="POST" action="../../controladores/admin/modificar.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <input type="hidden" id="codPer" name="codPer" value="<?php echo $codPer ?>" />
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
        <label for="direccion">Dirección (*)</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                  ?>" required placeholder="Ingrese la dirección ..." />
        <span id="mensajeDireccion" class="error"></span>
        <br><br>
        <label for="correo">Correo Electrónico (*)</label>
        <input class="largos" type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..." onkeyup="validarCorreo(this)" />
        <span id="mensajeCorreo" class="error"></span>
        <br><br>

        <label for="fecha">Fecha Nacimiento (*)</label>
        <input class="largos" type="text" id="fecha" name="fecha" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese su fecha de nacimiento (yyyy-mm-dd)" onkeyup="return validarFecha(this)" />
        <span id="mensajeFechaNac" class="error"></span>
        <br><br>

        <label for="rol">Rol Usuario (*)</label>

        <select class="select" id="rol" name="rol">
          <option>Admin</option>
          <option>User</option>
        </select>
        <span id="mensajerol" class="error"></span>
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
</body>

</html>