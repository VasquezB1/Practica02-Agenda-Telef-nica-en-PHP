<!DOCTYPE html>
<html>

<head>
    <link href="../../../css/indexadmin.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <script src="../../../js/buscarCedula.js" type="text/javascript"></script>

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
    <h2>DATOS TELEFONO</h2>


    <table style="width:100%">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Tipo</th>
            <th>Operadora</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT usu_cedula,usu_nombres,usu_apellidos,tele_numero,tele_tipo,tele_operadora FROM telefono a, usuario b WHERE a.tele_usu_codigo='$codigo' AND b.usu_codigo='$codigo'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td> <a href=tel:+593" . $row['tele_numero'] . ">" . $row['tele_numero'] . "</a></td>";
                //Hola
                echo " <td>" . $row['tele_tipo'] . "</td>";
                echo " <td>" . $row['tele_operadora'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen telefonos registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>

        <a class="volver" href="../../../admin/vista/admin/index.php">Volver</a>
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