

<?php 


$GoLink_IdUser="";
 //Crear sesión
 session_start();
 //Vaciar sesión
 $_SESSION = array();



 //Destruir Sesión
 session_destroy();

 if(isset($_COOKIE[session_name()])) { 
    setcookie(session_name(), '', time() - 42000, '/'); 
  } 
  

 //Redireccionar a login.php

header("location:login.php");

?>