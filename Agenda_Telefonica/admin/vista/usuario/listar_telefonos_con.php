<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista Telefonos Convencionales</title>

</head>

<body>  
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /Agenda_Telefonica/public/vista/login.html");
 }
?>
<center><h2>LISTA TELEFONOS CONVENCIONALES</h2></center>
    

    <table style="width:100%">
        <tr>
            <th>Numero</th>
            <th>Operadora</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigo=$_GET["codigo"];
        $sql = "SELECT * FROM telefono WHERE tele_usu_codigo=$codigo AND tele_tipo='CONVENCIONAL' ";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
  
            while ($row = $result->fetch_assoc()) {               
                echo "<tr>";
                echo " <td>" . $row["tele_numero"] . "</td>";
                echo " <td>" . $row['tele_operadora'] . "</td>";                              
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen telefonos registrados </td>";
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
    <a class="Formulario" href="../../../admin/vista/usuario/index.php?codigo=<?php echo $codigo?>">Volver</a>
    <br>
</footer>

</html>