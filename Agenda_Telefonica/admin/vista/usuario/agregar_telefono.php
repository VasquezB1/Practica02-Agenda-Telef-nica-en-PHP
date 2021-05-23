<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agregar Telefonos</title>
</head>

<body>
    <?php
    $codigo = $_GET["codigo"];
    ?>
    <form id="formulario01" method="POST" action="../../controladores/usuario/agregar_telefono.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="telefono">Telefono (*)</label>
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su telefono"
            onkeyup="return validarTelefono(this)" />
        <span id="mensajeTele" class="error"></span>
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