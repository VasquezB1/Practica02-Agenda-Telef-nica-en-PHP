<?php
 session_start();
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena') and usu_rol ='U'";

 $result = $conn->query($sql); 
 if ($result->num_rows > 0) { 
 $_SESSION['isLogged'] = TRUE;
 $per = $result->fetch_assoc();
 header("Location: ../../admin/vista/usuario/index.php?codigo=". $per['usu_codigo']);
 }else{  
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
    MD5('$contrasena') and usu_rol ='A'";
    
     $result = $conn->query($sql); 
     if ($result->num_rows > 0) { 
     $_SESSION['isLogged'] = TRUE;
     $per = $result->fetch_assoc();
     header("Location: ../../admin/vista/admin/index.php?codigo=". $per['usu_codigo']);
    }else{   
        header("Location: ../vista/login.html");
    }  
    
    }
 $conn->close();
