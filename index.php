<?php
include("seguridad.php");
require("components.php");
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparencia Go</title>
    <script src="lib/jquery-3.3.1.js"></script> 	
	<link rel="stylesheet" href="estilo.css" />
	<link rel="stylesheet" href="lib/jquery.toast.min.css">
	<script type="text/javascript" src="lib/jquery.toast.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="lib/datatables.min.css"/> 
	<script type="text/javascript" src="lib/datatables.min.js"></script> -->
	
    <!-- DATATABLE -->
    <script src="lib/datatables.min.js"></script>
    <!-- <script src="lib/jquery.dataTables.min.js"></script> -->
    <script src="lib/dataTables.fixedColumns.min.js"></script>    
    <script src="lib/dataTables.buttons.min.js"></script>    
    <script src="lib/jszip.min.js"></script>    
    <script src="lib/pdfmake.min.js"></script>    
    <script src="lib/vfs_fonts.js"></script>    
    <script src="lib/buttons.html5.min.js"></script>    
    <!-- <script src="lib/datetime.js"></script>     -->
    
    <link rel="stylesheet" href="lib/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="lib/buttons.dataTables.min.css">    
	<script src="lib/jquery.modalpdz.js"></script> <link rel="stylesheet" href="lib/jquery.modalcsspdz.css" />

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    




	<style>

	</style>
</head>
<body>
    <div id='BarraMenu'>
		<table style='width:100%;'>
			
			<tr>
			<td align=left><img src='img/logo.png' style='width:100px;'></td>
				<td width=50px>
				<?php 
				echo "<img src='icon/user_blanco.png' style='width:32px;'> <b style='color:white;'>".$GoLink_IdUser."</b>";		
				
				
				?>
				</td>
				

				
			</tr>

		</table>
		
	
	</div>
	

	<div id='FileList' style='margin-top:80px; margin-left:0px;padding:0px;'>
		<?php

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];

// echo "https://" . $host . $url;
// echo $url;
$pos = strpos($url, "/",1);
// echo "<br> Posicion: ".$pos;

$urlLimpia = substr($url, 0, $pos);
// echo "<br>URL Limpia: ".$urlLimpia;
$URLWebsite = "https://".$host."".$urlLimpia;
// echo $URLWebsite;
echo "<input type='hidden' id='URLWebsite' value='".$URLWebsite."'>";

				$QueryD="
				select 
				Descripcion as Archivo,
				Link as Hipervinculo,
				fecha, hora, IdUser
				from files order by fecha DESC, hora DESC
				";
				DynamicTable_MySQL($QueryD, "Resultados", "MiTabla", "", 0, "");

				$QueryD="
				select 
				Descripcion as Archivo,
				Link as Hipervinculo				
				from files order by fecha DESC, hora DESC
				";
				DynamicTable_MySQL($QueryD, "Resultados2", "MiTabla2", "", 0, "");
		?>

		</div>



	<div id='Mas'>
		<button class='btn btn-Primary'>
			<a href='#Archivos'  rel='MyModal:open'> <img src='icon/mas2.png' style='width:30px'></a>
		</button>

	</div>

	<div class='MyModal' id='Archivos'>
		
		<form method='POST' enctype='multipart/form-data' id='FormSubir' style='width:100%; background-color:transparent;'>
		<b style='color:black;'>Subir Archivos:</b><br>
		<div style='color:black;'>
		<span>Seleccione el archivo (.ZIP) <input type='file' name='archivo' accept=".zip" id='archivo' required></span>
		<span>Descripcion:<br> <textarea name='FileDescripcion' style='width:100%;' required></textarea></span><br>
		<center><input type='submit' class='btn btn-Primary' value='Subir'></center>
		</div>

		</form>

	</div>


	
<div id="preloader" style='background-color:white; color:#4E4E4E; opacity: 0.9; display:none;'>

<div id="loader">
		
		<img src="img/ajax-loader.gif" class='cargando_img' style='width:800px'><br>
		   <span style='
		   color: rgba(0,0,0,0.7);
		margin: 0px;
		margin-top: 0px;
		margin-left: 0px;
		padding: 0px;
		font-size: 8pt;
		margin-top: -200px;
		position: absolute;
		margin-left: -80px;
		font-size: 11pt;
		   '><cite>Cargando</cite><br><b> Espera por favor...</b></span>
</div>
</div>

<script>
$("#FormSubir").on("submit", function(e){
            // alert('Click');
			var filename = $('#archivo').val();
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("FormSubir"));                
			formData.append("nitavu", "<?php echo $GoLink_IdUser; ?>");
			formData.append("FileNombre", filename);
            

            $.ajax({
                url: "data_subir.php",
                type: "post",
                dataType: "html",
                data: formData,             
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#preloader').show();
                },
                success:function(data){
                    console.log(data);
					$('#preloader').hide();
					location.reload();
                    $('#R').html(data);
                }
            });
        
        });



function Copiar(element) {
       
       var $temp = $("<input>");       
       $("body").append($temp);       	   
	   url = $('#URLWebsite').val();
	   efinal = url + '/files/' + element + '.zip'
	   console.log(efinal);

       $temp.val(efinal).select();       
       document.execCommand("copy");
	   $.toast('Hipervinculo Copiado ');  
       $temp.remove();
   }
</script>

<?php
echo "<div id='Salir'><a  href='logout.php' class='btn btn-Warning'>Salir</a></div></span>";

?>
		
<div id='R' style='display:none;'></div>

</body>
</html>
