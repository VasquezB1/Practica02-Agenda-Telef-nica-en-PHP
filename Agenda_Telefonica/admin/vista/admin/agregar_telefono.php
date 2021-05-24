<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agregar Telefonos</title>
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
    ?>
    <form id="formulario01" method="POST" action="../../controladores/admin/agregar_telefono.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="telefono">Telefono (*)</label>
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su telefono"
        oninput="return validarTelefono(this)" />
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



        <input type="submit" id="crear" name="crear" value="Crear" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>

</html>