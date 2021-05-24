<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona</title>
 <script  lenguage ="javascript" type="text/javascript" src="../../../js/validaciones_usuarios.js "></script>
 <style type="text/css">
 .error {
 color: red;
 font-size: 12px;
 }
 .bien{
 color: black;
 font-size: 12px;
 }
</style>
</head>
<body>
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /Agenda_Telefonica/public/vista/login.html");
 }
?>   
 <?php
 $codigo = $_GET["codigo"];
 $codPer = $_GET["codPer"];
 ?>
 <form id="formulario01" method="POST" action="../../controladores/admin/cambiar_contrasena.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <input type="hidden" id="codPer" name="codPer" value="<?php echo $codPer ?>" />
 <label for="cedula">Contraseña Actual (*)</label>
 <input type="password" id="contrasena1" name="contrasena1" value="" required
placeholder="Ingrese su contraseña actual ..."/>
 <br>
 <label for="cedula">Contraseña Nueva (*)</label>
 <input type="password" id="contrasena" name="contrasena" value="" required
placeholder="Ingrese su contraseña nueva ..."onkeyup="return validarPassword(this)" onblur="validarCaracteres()"/>
<span id="mensajeContra" class="error"></span>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
</body>
</html>