<?php
require_once("config.php");
require_once("components.php");
require("seguridad.php");

$FileDescripcion =$_POST['FileDescripcion'];
$FileNombre = $_POST['FileNombre'];
$NFile =  NFile();


if ( 0 < $_FILES['archivo']['error'] ) {
    echo 'Error: ' . $_FILES['archivo']['error'] . '<br>';
}
else {
    $archivofinal = 'files/'.$NFile.".zip";
    // move_uploaded_file($_FILES['file']['tmp_name'], 'wowslider/' . $_FILES['file']['name']);
    move_uploaded_file($_FILES['archivo']['tmp_name'], $archivofinal);    
    $msg =  "<b><img src='icon/ok.png' style='width:20px;'>Archivo subido con exito ";
    
    //agregar el registro
    $sql = "INSERT INTO TransparenciaGo(IdFile, FileNombre, IdUser, fecha, hora, FileDescripcion)
    VALUES ('".$NFile."', '".$FileNombre."', '".$GoLink_IdUser."', '".$fecha."','".$hora."', '".$FileDescripcion."')";
    
    if ($conexion->query($sql) == TRUE){
        $msg = $msg." y guardado.</b>";
        // mensaje($msg,"atencionp.php?sl=");
    }
    
    Historia($f['IdUser'], "FILES", "subio el archivo ".$FileNombre." con IdFile ".$NFile);
    toast($msg,1,"");

}

?>