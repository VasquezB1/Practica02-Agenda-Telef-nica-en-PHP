<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /Agenda_Telefonica/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios-ADMINISTRADOR</title>
    <script src="../../../js/buscarCedula.js" type="text/javascript"></script>
    <link href="../../../css/indexadmin.css" rel="stylesheet" />
</head>

<body>
    <header class="enc1">
        <img class="logo" src="../../../images/LOGO UPS -01.png" alt="Logo UPS" />
        <div class="buscar" id="searchform">

        </div>
        <img class="icono" src="../../../images/usuario.png" alt="Usuario" />
        <img class="icono" src="../../../images/charla.png" alt="Mensajes" />
        <img class="icono" src="../../../images/mas.png" alt="Mas" />

        <br><br><br><br>
    </header>
    <center>
        <h1>GESTION DE USUARIOS---CONTROL ADMINISTRATIVO</h1>
    </center>
    <?php
    $cod = $_GET["codigo"];
    ?>

    <header class="tabla">
        <nav>
            <ul>
                <li><a href="listar_usu_activos.php?codigo=<?php echo $cod ?>">Listar Usuarios Activos</a></li>
                <li><a href="listar_usu_eliminados.php?codigo=<?php echo $cod ?>">Listar Usuarios Eliminados</a> </li>
                <li><a href="../../../public/vista/buscar_cedula.html">Buscar Usuario por Cedula</a></li>                
                <li><a href="../../../public/vista/crear_usuario.html">Crear Usuario</a></li>
            </ul>
        </nav>
    </header>

    <?php
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $sql = "SELECT usu_cedula,usu_nombres,usu_apellidos FROM usuario WHERE usu_codigo='$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>USUARIO LOGUEADO</h3>";
        echo "<p><b>CEDULA : </b>" . $row["usu_cedula"] . "</br></p>";
        echo "<p><b>NOMBRES: </b>" . $row['usu_nombres'] . "</br></p>";
        echo "<p><b>APELLIDOS: </b>" . $row['usu_apellidos'] . "</br></p>";
    } else {
        echo " No existe persona";
    }

    $conn->close();
    ?>
    <center>
        <h2>Usuarios Registrados</h2>
    </center>
    <table style="width:100%">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Rol</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td> <a href=mailto:" . $row['usu_correo'] . ">" . $row['usu_correo'] . "</a></td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo " <td>" . $row['usu_rol'] . "</td>";
                echo " <td> <a href='agregar_telefono.php?codigo=" . $row['usu_codigo'] . "&codPer=" . $codigo . "'>Agregar Telefono</a> </td>";
                echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "&codPer=" . $codigo . "'>Eliminar</a> </td>";
                echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "&codPer=" . $codigo . "'>Modificar</a> </td>";
                echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "&codPer=" . $codigo . "'>Cambiar contraseña</a> </td>";
                echo " <td> <a href='lista_tele.php?codigo=" . $row['usu_codigo'] . "'>Lista de Telefonos</a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
    <footer >
        Byron Simon Vasquez Saldaña&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">bvasquezs@est.ups.edu.ec</a> &#8226;
        <a href=”0987815997”>  0987815997 </a><br>
        Jose Guillermo Quinde Delgado&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">jquinded@est.ups.edu.ec</a> &#8226;
        <a href=”0991352595”>  0991352595 </a>
        <br>© Todos los derechos reservados<br>        
        
    <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
    <br>

    </footer>

</body>

</html>