<!DOCTYPE html>
<html>

<head>
    <link href="../../../css/estilos1.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Agregar Telefonos</title>
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
    <h1>Agregar Teléfonos</h1>
    <?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: /Agenda_Telefonica/public/vista/login.html");
    }
    ?>
    <?php
    $codigo = $_GET["codigo"];
    ?>
    <form class="formu" id="formulario01" method="POST" action="../../controladores/usuario/agregar_telefono.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="telefono">Telefono (*)</label>
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su telefono" onkeyup="return validarTelefono(this)" />
        <span id="mensajeTelefono" class="error"></span>
        <br><br>

        <label for="tipo">Tipo Telefono (*)</label>
        <select class="select" id="tipo" name="tipo">
            <option> </option>
            <option>Convencional</option>
            <option>Celular</option>
        </select>
        <span id="mensajeTipo" class="error"></span>
        <br><br>

        <label for="operadora">Operadora Telefono (*)</label>
        <select class="select" id="operadora" name="operadora">
            <option> </option>
            <option>Movistar</option>
            <option>Claro</option>
            <option>CNT</option>
            <option>Tuenti</option>
            <option>ETAPA</option>
        </select>
        <span id="mensajeTipo" class="error"></span>
        <br><br>



        <input class="boton" type="submit" id="crear" name="crear" value="Crear" />
        <input class="boton" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>

</html>