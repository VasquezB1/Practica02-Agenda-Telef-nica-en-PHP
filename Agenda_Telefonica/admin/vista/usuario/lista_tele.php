<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <script src="../../../js/buscarCedula.js" type="text/javascript"></script>

</head>

<body>  
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
        $sql = "SELECT usu_cedula,usu_nombres,usu_apellidos,tele_numero,tele_tipo,tele_operadora FROM telefono a, usuario b WHERE a.usu_tele_registro='$codigo' AND b.usu_codigo='$codigo'";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['tele_numero'] . "</td>";
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

    
    </table>


</body>
<footer>
    <br>
    <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
    <br>
    <br>
    <a class="Formulario" href="../../../admin/vista/usuario/index.php">Volver</a>
    <br>
</footer>

</html>