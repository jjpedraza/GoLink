<?php

// .-'''-.                                        
// '   _    \  .---.                               
// /   /` '.   \ |   |.--.   _..._        .          
// .--./).   |     \  ' |   ||__| .'     '.    .'|          
// /.''\\ |   '      |  '|   |.--..   .-.   . .'  |          
// | |  | |\    \     / / |   ||  ||  '   '  |<    |          
// \`-' /  `.   ` ..' /  |   ||  ||  |   |  | |   | ____     
// /("'`      '-...-'`   |   ||  ||  |   |  | |   | \ .'     
// \ '---.               |   ||  ||  |   |  | |   |/  .      
// /'""'.\              |   ||__||  |   |  | |    /\  \     
// ||     ||             '---'    |  |   |  | |   |  \  \    
// \'. __//                       |  |   |  | '    \  \  \   
// `'---'                        '--'   '--''------'  '---' 
//
//
//

//DATOS PARA LA CONEXION
$dbhost = 'localhost';	
$dbuser = 'root';
$dbpass = ''; 
$dbname = 'golink';
$urlsite = 'localhost'; //<-- URL del sitio web, donde se alojaran los archivos; ejemplo https://MiSito.com/files



	if (function_exists('mysqli_connect')) {
	//mysqli está instalado
		//echo 'Si';
		
		$conexion = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
		//echo $conexion;
		$acentos = $conexion->query("SET NAMES 'utf8'"); // para los acentos
		global $conexion;
		}else{
			mensaje("ERROR: Hay un problema con la coneccion",'');


			// echo phpinfo();
			// echo "<h1 style='background-color:red;color:white;'>Hay un error al conectar con la base de datos (MySQLi)".var_dump(function_exists('mysqli_connect'))."</h1>";
		}


 	$fecha = date('Y-m-d');
	$hora =  date ("H:i:s");
	ini_set('max_execution_time', 0);	
	date_default_timezone_set('Mexico/General');
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');	
	global $urlsite;	
	$produccion=FALSE; global $produccion; // vpn



?>