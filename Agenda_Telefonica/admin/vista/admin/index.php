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

</head>

<body>
    <h2>Buscar Información</h2>

    <header>
        <form onsubmit="return buscarPorCedula()">
            <input type="text" id="cedula" name="buscar" value="">
            <input type="button" id="buscar" name="buscar" value="Buscar cedula" onclick="buscarPorCedula()">
        </form>
        <br>
        <div id="informacion"><b>Datos de la persona</b></div><br>

    </header>

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
                echo " <td>" . $row['usu_correo'] . "</td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo " <td>" . $row['usu_rol'] . "</td>";
                echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";  
                echo " <td> <a href='agregar_telefono.php?codigo=" . $row['usu_codigo'] . "'>Agregar Telefono</a> </td>";       
                echo " <td> <a href='lista_tele.php?codigo=" . $row['usu_codigo'] . "'>Lista de Telefono</a> </td>";                         
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


</body>
<footer>
    <br>
    <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
    <br>
    <br>
    <a class="Formulario" href="../../../public/vista/crear_usuario.html">Crear Usuarios</a>
    <br>
</footer>

</html>