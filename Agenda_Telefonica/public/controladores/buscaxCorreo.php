<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $correo = $_GET['correo']; 
 $sqlPer = "SELECT usu_cedula,usu_nombres,usu_apellidos,usu_correo FROM usuario WHERE usu_correo='$correo'";
 $resultPe = $conn->query($sqlPer);
 
 if ($resultPe->num_rows > 0) {
        $rowP = $resultPe->fetch_assoc();              
         echo "<center><h3>USUARIO </h3></center>";
         echo "<p><b>CEDULA : </b>" . $rowP["usu_cedula"] . "</br></p>" ;
         echo "<p><b>NOMBRES: </b>" . $rowP['usu_nombres'] . "</br></p>" ;
         echo "<p><b>APELLIDOS: </b>" . $rowP['usu_apellidos'] . "</br></p>" ;
         echo "<p><b>CORREO: </b>" . $rowP['usu_correo'] . "</br></p>" ;


 } else {
     echo " No existe persona";
 }
 $sql = "SELECT tele_numero,tele_tipo,tele_operadora FROM usuario a , telefono b WHERE a.usu_eliminado = 'N' and a.usu_correo='$correo' AND a.usu_codigo=b.tele_usu_codigo"; 
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 
 <th>Telefono</th>
 <th>Tipo</th>
 <th>Operadora</th>
 <th></th>
 <th></th>
 <th></th> 
 </tr>";
 if ($result->num_rows > 0) { 
 while($row = $result->fetch_assoc()) {
 
 echo "<tr>";
 echo " <td>" . $row['tele_numero'] . "</td>";
 echo " <td>" . $row['tele_tipo'] . "</td>";
 echo " <td>" . $row['tele_operadora'] . "</td>";
 
 echo "</tr>"; 
 } 
 } else { 
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>"; 
 }
 echo "</table>";
 $conn->close();
