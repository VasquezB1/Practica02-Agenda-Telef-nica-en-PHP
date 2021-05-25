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
    <title>Gestión de usuario-USUARIO</title>
    <script src="../../../js/buscarCedula.js" type="text/javascript"></script>

</head>

<body>
<center><h1>GESTION DE USUARIO---CONTROL USUARIO</h1></center>
<?php
    $cod=$_GET["codigo"];
    ?>
    <center><h3>LISTAR</h3></center>
    <nav>
      <a href="listar_telefonos_cel.php?codigo=<?php echo $cod?>">Listar Telefonos Celulares</a>
      <a href="listar_telefonos_con.php?codigo=<?php echo $cod?>">Listar Telefonos Convecionales</a>
      </nav>  
      
      <center><h3>GESTION</h3></center>
    <nav>
    <a href="../../../public/vista/buscar_cedula.html">Buscar Usuario por Cedula</a>
      <a href="agregar_telefono.php?codigo=<?php echo $cod?>">Agregar Telefono</a>
      <a href="modificar_usu.php?codigo=<?php echo $cod?>">Modificar Datos</a>
      <a href="cambiar_contrasena.php?codigo=<?php echo $cod?>">Cambiar Contraseña</a>
</nav>
 
   
    <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT usu_cedula,usu_nombres,usu_apellidos FROM usuario WHERE usu_codigo='$codigo'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();              
                echo "<center><h3>USUARIO LOGUEADO</h3></center>";
                echo "<p><b>CEDULA : </b>" . $row["usu_cedula"] . "</br></p>" ;
                echo "<p><b>NOMBRES: </b>" . $row['usu_nombres'] . "</br></p>" ;
                echo "<p><b>APELLIDOS: </b>" . $row['usu_apellidos'] . "</br></p>" ;


        } else {
            echo " No existe persona";
        }
        
        $conn->close();
        ?>
        <center><h2>Telefonos del Usuario</h2></center>
    <table style="width:100%">
        <tr>
            <th>Numero</th>
            <th>Tipo</th>
            <th>Operadora</th>

        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM telefono WHERE tele_usu_codigo='$codigo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td> <a href=tel:+593".$row['tele_numero'].">".$row['tele_numero']."</a></td>"; 
                echo " <td>" . $row['tele_tipo'] . "</td>";
                echo " <td>" . $row['tele_operadora'] . "</td>";
                echo " <td> <a href='eliminar.php?codigo=" . $row['tele_codigo'] . "'>Eliminar</a> </td>";
                echo " <td> <a href='modificar.php?codigo=" . $row['tele_codigo'] . "'>Modificar</a> </td>";                        
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen numeros de telefono del usuario </td>";
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
    <br>
</footer>

</html>