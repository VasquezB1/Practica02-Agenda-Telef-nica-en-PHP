<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista Usuarios Eliminados</title>
    <link href="../../../css/indexadmin.css" rel="stylesheet" />
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
    <center>
        <h2>LISTA USUARIOS ELIMINADOS</h2>
    </center>


    <table style="width:100%">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Fecha Nacimiento</th>
            <th>Correo</th>
            <th>Rol</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='S'";
        $result = $conn->query($sql);
    

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo " <td> <a href=mailto:" . $row['usu_correo'] . ">" . $row['usu_correo'] . "</a></td>";
                echo " <td>" . $row['usu_rol'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registrados </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>

        <a class="volver" href="../../../admin/vista/admin/index.php?codigo=<?php echo $codigo ?>">Volver</a>
        <br><br>
    </table>

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