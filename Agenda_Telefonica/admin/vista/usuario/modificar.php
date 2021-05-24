<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar Telefono</title>
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
 
 $sql = "SELECT * FROM telefono where tele_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/modificar_tele.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <input type="hidden" id="codPer" name="codPer" value="<?php echo $row["tele_usu_codigo"] ?>" />
 <label for="numero">Numero (*)</label>
 <input type="text" id="numero" name="numero" value="<?php echo $row["tele_numero"]; ?>"
required placeholder="Ingrese el numero de Telefono ..." oninput="return validarTelefono(this)"/>
    <span id="mensajeTelefono" class="error"></span>

    <br><br>

<label for="tipo">Tipo Telefono (*)</label>
<select class="largos" id="tipo" name="tipo">
    <option>Convencional</option>
    <option>Celular</option>
</select>
<span id="mensajeTipo" class="error"></span>
<br><br>

<label for="operadora">Operadora Telefono (*)</label>
<select class="largos" id="operadora" name="operadora">
    <option>Movistar</option>
    <option>Claro</option>
    <option>CNT</option>
    <option>Tuenti</option>
    <option>ETAPA</option>
</select>
<span id="mensajeTipo" class="error"></span>
<br><br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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