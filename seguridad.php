<?php
//AUTORIZACION PARA ADMINISTRADOR
session_start();	
if (isset($_SESSION['GoLink_IdUser'])){	
	$GoLink_IdUser = $_SESSION['GoLink_IdUser'];
} else {
		$_SESSION = array(); 
		session_destroy();		
		unset($GoLink_IdUser);
		header("location:login.php?info=Sesion Expirada");	
}

?>