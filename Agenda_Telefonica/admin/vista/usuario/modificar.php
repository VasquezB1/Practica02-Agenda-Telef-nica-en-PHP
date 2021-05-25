<!DOCTYPE html>
<html>

<head>
    <link href="../../../css/estilos1.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Modificar Telefono</title>
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

    $sql = "SELECT * FROM telefono where tele_codigo=$codigo";
    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
    ?>
            <form class="formu" id="formulario01" method="POST" action="../../controladores/usuario/modificar_tele.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <input type="hidden" id="codPer" name="codPer" value="<?php echo $row["tele_usu_codigo"] ?>" />
                <label for="numero">Numero (*)</label>
                <input type="text" id="numero" name="numero" value="<?php echo $row["tele_numero"]; ?>" required placeholder="Ingrese el numero de Telefono ..." oninput="return validarTelefono(this)" />
                <span id="mensajeTelefono" class="error"></span>

                <br><br>

                <label for="tipo">Tipo Telefono (*)</label>
                <select class="select" id="tipo" name="tipo">
                    <option>Convencional</option>
                    <option>Celular</option>
                </select>
                <span id="mensajeTipo" class="error"></span>
                <br><br>

                <label for="operadora">Operadora Telefono (*)</label>
                <select class="select" id="operadora" name="operadora">
                    <option>Movistar</option>
                    <option>Claro</option>
                    <option>CNT</option>
                    <option>Tuenti</option>
                    <option>ETAPA</option>
                </select>
                <span id="mensajeTipo" class="error"></span>
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