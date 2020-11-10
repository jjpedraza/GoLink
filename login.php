<?php 	require("config.php"); ?>
<?php 	require("components.php"); ?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tranparencia Go | Login</title>
        <script src="lib/jquery-3.3.1.js"></script> 	
        <link rel="stylesheet" href="estilo.css" />
        <link rel="stylesheet" href="lib/jquery.toast.min.css">
	<script type="text/javascript" src="lib/jquery.toast.min.js"></script>

    <style>
        body{
            background-color: <?php echo Preference("ColorDeFondo", "",""); ?>;
            background-image: url('https://source.unsplash.com/random/1920x1080/?www');
          
        }
        #Login {
            position:fixed;
            width:50%;
            top:25%;
            left:25%;
        }
    </style>

</head>


<body>

<form action='login.php' method='POST' id='Login' >
<h2>
<b>GoLink</b> | Identificate:
</h2>
	<label>Usuario: <input type='text' name='User'></label>
	<label>NIP: <input type='Password' name='Password'></label>
	<label><input type='submit' value='Entrar' class='btn btn-Primary' name='FormLogin'></label>
</form>

<?php
if (isset($_POST['FormLogin'])){
    require("config.php");
    $txtUser = $_POST['User']; if (ValidaVAR($txtUser)==TRUE){$txtUser = LimpiarVAR($txtUser);} else {$txtUser = "";}
    $txtNIP = $_POST['Password']; if (ValidaVAR($txtNIP)==TRUE){$txtNIP = LimpiarVAR($txtNIP);} else {$txtNIP = "";}
    
	$sql = "
    select  * from users where IdUser = '".$txtUser."'";    
    $rc= $conexion -> query($sql);
	if($f = $rc -> fetch_array())
	{                
        if ($f['NIP']==$txtNIP){

                Historia($f['IdUser'], "LOGIN", "Inicio de Sesion");
                $GoLink_IdUser = $f['IdUser'];	// variable de entorno      
                session_start();    
                $_SESSION['GoLink_IdUser']=$f['IdUser']; //session		
                echo '<script>window.location.href="index.php";</script>'; 
            

        } else {
            Toast("NIP Incorrecto",2,"");
        }
        
        
        
	} else {
        Toast("Usuario No Valido",2,"");
        
	}
}

?>

</body>
</html>