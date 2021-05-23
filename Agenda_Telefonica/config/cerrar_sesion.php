<?php
 session_start(); 
 $_SESSION['isLogged'] = FALSE;
 session_destroy();
 header("Location: /Agenda_Telefonica/public/vista/login.html");
?>