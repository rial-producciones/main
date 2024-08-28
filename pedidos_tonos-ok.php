<?
session_start(); // inicio sesiones.
$artista=$_GET["artista"];
$tema=$_GET["tema"];
$idtono=$_GET["id"];

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

?>
<?php function error_handler($errno, $errstr, $errfile, $errline, $errctx) {
    //echo $errstr;
}
set_error_handler("error_handler");
error_reporting(E_ALL);  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?php if ($_GET['idBtn']==1){?>
Pistas de Tango, pistas de Tango y m�s pistas de Tangos ! Karaoke de Tango - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes
<?php } ?>
<?php if ($_GET['idBtn']==2){?>
Pistas de Folklore, pistas de Folklore y m�s pistas de Folklore ! Karaoke de Folklore - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes
<?php } ?>
<?php if ($_GET['idBtn']==3){?>
Pistas de Opera, pistas de Opera y m�s pistas de Opera ! Karaoke de Opera - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
<?php if ($_GET['idBtn']==4){?>
Pistas de Comedias Musicales, pistas de Comedias Musicales y m�s pistas de Comedias Musicales ! Karaoke de Comedias Musicales - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
<?php if ($_GET['idBtn']==5){?>
Pistas , pistas y m�s pistas ! Karaoke - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
</title>

<meta name="title" content="Pistas, pistas y m�s pistas ! - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes" />
<meta name="description" content="Desde 1978 produciendo Pistas Profesionales para Cantantes,con instrumentos reales y coros. Env�os a todo el mundo" />
<meta name="keywords" content="tango,tangos,pistas,playback,karaokes profesionales,duplicaciones,cd,grabaciones,mastering,discos,compactos,logos,empresas,productora,discografica,estudio,grabacion,alta,tecnologia,mastering,avanzada,arreglos,composiciones,arte,dise�o,laminas,cd,produccion,cantantes,bandas,eventos" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="URL" content="http://www.rialproducciones.com.ar/" />
<meta name="language" content="espanol" />
<meta name="author" content="Rial Producciones" />
<meta name="copyright" content="Rial Producciones" />
<meta name="robots" content="ALL" />
<meta name="revisit-after" content="15 days" />
<meta name="reply-to" content="rialproducciones@speedy.com.ar" />
<meta name="document-class" content="Published" />
<meta name="document-type" content="Public" />
<meta name="document-rating" content="General" />
<meta name="document-distribution" content="Global" />
<meta name="document-state" content="Dynamic" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="INDEX, FOLLOW, ARCHIVE" />
<meta name="GOOGLEBOT" content="INDEX, FOLLOW, ARCHIVE" />
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<style type="text/css">
label.valid {
	width: 24px;
	height: 24px;
	background: url(boots/assets/img/valid.png) center center no-repeat;
	display: inline-block;
	text-indent: -9999px;
}
label.error {
	font-weight: bold;
	color: red;
	padding: 2px 8px;
	margin-top: 2px;
}
input, textarea{ width:90%;}
	pre {
		font-size: 0.90em;
		font-family: monospace;
	}
	pre + pre {
		background: #ff9;
		padding: 1em;
	}
	
	pre {
  word-break: break-all; /* webkit */
  word-wrap: break-word;
  white-space: pre;
  white-space: -moz-pre-wrap; /* fennec */
  white-space: pre-wrap;
  white-space: pre\9; /* IE7+ */
}
p{ font-size:12px;}
.text-demo{ color:#FFF;}
.container-fluid {
    padding-right: 15px;
    padding-left: 50px;
    margin-right: auto;
    margin-left: auto;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="site.css" rel="stylesheet" type="text/css" />
<link href="dev_master.css" type="text/css" rel="stylesheet" media="all" />
</head>
<body>
<?php include "inc_top.php"; ?>
<div id="contenedorsite">

<div id="cuerpo" style="min-height:400px;">
	  <div style="width:750px; margin:auto;">
	    <table width="735" border="0" cellspacing="0" cellpadding="0" >
			<?php
				if (!empty($_GET['id_rubro'])) {
				?>
			<!--<tr>
					<td width="754" height="30"><div class="logoArtesanal" id="imgArtesanal<?=$_GET['id_rubro'];?>" ></div></td>
				</tr>-->
			<?php
				}
				?>
	    </table>
<div class="container-fluid">


 <div class="row">
  <div class="col-xs-8 col-md-8">

<?php		  
require_once('class.phpmailer.php'); 
$mail = new PHPMailer(true); 
$mail->CharSet = "UTF-8";
$mail->IsSMTP(); 
/*$mail->SMTPDebug  = 2;          */           
$mail->SMTPAuth   = false;               
$mail->Host       = 'localhost'; 
//$mail->Username   = "contactos@rialproducciones.com";
//$mail->Password   = "Pomodoro1yes";
$mail->Port       = 25;     
$mail->FromName = "Roberto Rial Producciones";
$mail->From     = ("contactos@rialproducciones.com"); 
$mail->Subject  = "Pedido de Demos";    
$mail->AddAddress ("contactos@rialproducciones.com");
$mail->AddAddress ($_POST["email"]);
//$mail->AddBCC("contactos@rialproducciones.com"); 
$mail->IsHTML(true);
$mail->WordWrap = 50;
$mail->AddEmbeddedImage('newsletter/logo_pie.gif', 'logo_pie', 'newsletter/logo_pie.gif');
$mail->AddEmbeddedImage('newsletter/separador.gif', 'separador', 'newsletter/separador.gif');
$mail->AddEmbeddedImage('newsletter/h_contacto.jpg', 'h_contacto', 'newsletter/h_contacto.jpg');
    /* Plantilla */
$template = file_get_contents('newsletter/pedido_demo.html','r');
$display = str_replace("{name}",$_POST['name'],$template);
$display = str_replace("{email}",$_POST['email'],$display);
$display = str_replace("{telefono}",$_POST['telefono'],$display);
$display = str_replace("{pais}",$_POST['pais'],$display);
$display = str_replace("{address}",$_POST['address'],$display);
$display = str_replace("{coment}",$_POST['coment'],$display);

    /* Imagenes */
$mail->Body = $display;
    /* Envio del mensaje */
 
if(!$mail->Send()) {  
echo 'no se puede enviar.';  
echo 'Mail error: ' . $mail->ErrorInfo;  
}
else 
{  
  echo "<div style='color:#FF6'>Su pedido fue enviado con �xito! <br> Tiempo de Entrega: m�nimo 15 minutos - m�ximo 24 hs.</div>";


}		  
 ?>
   
  <?php 
if(empty($_SESSION['demo'][$idtono])){echo "";}
 echo "</br>";
foreach($_SESSION["demo"] as $k => $v)
{
	echo "<p class='text-demo'>"."Artista:".utf8_encode($v["artista"])." - Tema:".utf8_encode($v["tema"]);
	echo "</p>";
	echo "<br>";
	
}
?>
</div>

</div>
    <!-- .span --> 
  </div>
  <!-- .row -->
  
<!-- .container --> 




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script src="boots/assets/js/jquery.validate.js"></script> 

<script>
$(document).ready(function(){

		$('#registration-form').validate({
	    rules: {
	       name: {
	        required: true,
	       required: true
	      },
		 			  
	      email: {
	        required: true,
	        email: true
	      },
		  
	     
		   address: {
	      	minlength: 5,
	        required: true
	      },
		  
		  agree: "Campo Obligatorio"
		  
	    },
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });

}); // end document.ready
</script>
<script>
		addEventListener('load', prettyPrint, false);
		$(document).ready(function(){
		$('pre').addClass('prettyprint linenums');
			});
		</script>
	    <div style="clear:both"></div>
	</div>
  </div>
</div>
<?php include "inc_pie.php"; ?>
<div id="contenido"></div>


<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2525189-3");
	pageTracker._initData();
	pageTracker._trackPageview();
</script>
<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-2525189-2");
	pageTracker._initData();
	pageTracker._trackPageview();
</script>
</body>
</html>