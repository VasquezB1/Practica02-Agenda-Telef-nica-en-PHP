<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista Usuarios Eliminados</title>

</head>

<body>  
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /Agenda_Telefonica/public/vista/login.html");
 }
?>
<center><h2>LISTA USUARIOS ELIMINADOS</h2></center>
    

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
                echo " <td>" . $row['usu_correo'] . "</td>";    
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

    
    </table>


</body>
<footer>
    <br>
    <a class="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
    <br>
    <br>
    <a class="Formulario" href="../../../admin/vista/admin/index.php">Volver</a>
    <br>
</footer>

</html>