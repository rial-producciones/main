<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Roberto Roberto Rial Producciones - Roberto Rial Producciones - Roberto Rial Producciones</title>
<meta name="title" content="Roberto Roberto Rial Producciones - Roberto Rial Producciones - Roberto Rial Producciones">
<meta name="description" content="Pistas Profesionales, Karaoke, Composiciones, Orquestaciones y Arreglos musicales de temas propios e inéditos">
<meta name="keywords" content="pistas para cantar,tango,tangos,TANGO,pistas,playbacks,orquestaciones,arreglos musicales,composiciones,copias de cd,opera karaoke, pistas de opera,karaoke,midi,midis,duplicaciones de cd">
<meta name="URL" content="http://www.rialproducciones.com.ar/">
<meta name="language" content="espanol">
<meta name="author" content="Rial Producciones">
<meta name="copyright" content="Rial Producciones">
<meta name="robots" content="ALL">
<meta name="revisit-after" content="15 days">
<meta name="reply-to" content="rialproducciones@speedy.com.ar">
<meta name="document-class" content="Published">
<meta name="document-rights" content="Private">
<meta name="document-type" content="Public">
<meta name="document-rating" content="General">
<meta name="document-distribution" content="Global">
<meta name="document-state" content="Dynamic">

</SCRIPT>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
.cajas_form.caja_promocion_form label{ font-size:16px!important;}
</style>
<link href="../site.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include "../n_paises.php"; ?>
<?php include "../inc_top.php"; ?>
<div id="contenedorsite">
  
<div id="cuerpo">
<?php include "../inc_menu.php"; ?>
    <div align="center" class="text_Intro_new">
      <h1>Cont&aacute;ctenos</h1>
      <p>&nbsp;</p>
      <div>
        <div class="caja-info-form" style="margin:auto; height:190px!important;">
        <form id="form1" name="form1" method="post" action="">
          <h2>&nbsp;</h2>
          <?php
	
$nombre=$_POST['nombre'];
$email=$_POST['correo'];
$motivo=$_POST['motivo'];

require_once('../class.phpmailer.php'); 
$mail=new PHPMailer();
$mail->Mailer="smtp";
$mail->Helo = "mail.bocos.com.ar";
$mail->CharSet = "UTF-8";
$mail->IsSMTP(); 
$mail->Host       = "mail.bocos.com.ar"; 
/*$mail->SMTPDebug  = 2;          */           
$mail->SMTPAuth=true;            
$mail->Host="mail.bocos.com.ar"; 
$mail->Port=25;     
$mail->Username = "paulo@bocos.com.ar";
$mail->Password = "bushi1234"; 
$mail->FromName = "Rial Producciones";
$mail->From     = "webmaster@rialproducciones.com"; 
$mail->Subject  = "Consulta via web";    
$mail->AddAddress("webmaster@rialproducciones.com");
$mail->AddBCC ("info@paulobocos.com.ar"); 
$mail->Timeout=60;
$mail->IsHTML(true);
$mail->WordWrap = 50;
$mail->AddEmbeddedImage('newsletter/logo_pie.gif', 'logo_pie', 'newsletter/logo_pie.gif');
$mail->AddEmbeddedImage('newsletter/separador.gif', 'separador', 'newsletter/separador.gif');
$mail->AddEmbeddedImage('newsletter/h_contacto.jpg', 'h_contacto', 'newsletter/h_contacto.jpg');
	/* Plantilla Motivo no clave */
$template = file_get_contents('tango_de_mi_vida.html','r');
$display = str_replace("{nombre}",$_POST['nombre'],$template);
$display = str_replace("{email}",$_POST['email'],$display);
$display = str_replace("{telefono}",$_POST['telefono'],$display);
$display = str_replace("{provincia}",$_POST['provincia'],$display);
$display = str_replace("{pais}",$_POST['pais'],$display);
$display = str_replace("{motivo}",$_POST['motivo'],$display);
$display = str_replace("{pedido}",$_POST['pedido'],$display);

    /* Imagenes */

$mail->Body = $display;
    /* Envio del mensaje */

if(!$mail->Send()) {  
echo 'no se puede enviar.';  
echo 'Mail error: ' . $mail->ErrorInfo;  
}
else
 {  
  echo utf8_decode('<div class=text-form><h2>Su consulta fue enviado correctamente</h2> <br> <h3>A la brevedad le responderemos.<br><br> Recuerde revisar también su bandeja de correo no deseado o spam. <br><br>Muchas Gracias</h3></div>');  
 }
?>
        </form>
 
      </div>
        <p><br />
          <br />
        </p>

        <p><br />
          <br />
          <br />
          Tel<span class="Estilo3">&eacute;onos: (+54 11) 4658-9489 ( l&iacute;neas rotativas ) de Lunes a Viernes de 9 a 18 hs.</span><br />
        </p>
        <p><br />
        </p>
<h2></h2>
        <p>Coronel Toscano 887 - Villa Sarmiento&nbsp;(&nbsp;Ramos Mej&iacute;a )</p>
        <p>C&oacute;digo Postal 1706.
          <br />
        </p>
        <p>&nbsp;</p>
        <h1>Como Llegar</h1>
        <p>&nbsp;</p>
        <p>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="418" height="376">
            <param name="movie" value="file:///C|/xampp/htdocs/imagenes/mapa.swf" />
            <param name="quality" value="high" />
            <embed src="file:///C|/xampp/htdocs/imagenes/mapa.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="418" height="376"></embed>
          </object>
        </p>
      </div>
      <div style="margin-top:20px">
        <iframe width="420" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;hl=es&amp;geocode=&amp;q=887+Toscano,+buenos+aires,+argentina&amp;sll=37.0625,-95.677068&amp;sspn=34.671324,56.25&amp;ie=UTF8&amp;s=AARTsJrsSIGw7BOJVoxEapbh1oaNJQ-5UQ&amp;ll=-34.639687,-58.577771&amp;spn=0.006179,0.00912&amp;z=16&amp;iwloc=addr&amp;output=embed"></iframe>
        <br />
      <small><a href="http://maps.google.com/maps?f=q&amp;hl=es&amp;geocode=&amp;q=887+Toscano,+buenos+aires,+argentina&amp;sll=37.0625,-95.677068&amp;sspn=34.671324,56.25&amp;ie=UTF8&amp;ll=-34.639687,-58.577771&amp;spn=0.006179,0.00912&amp;z=16&amp;iwloc=addr&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa m&aacute;s grande</a></small>      </div>
      <div>
        <ul>
          <li></li>
        </ul>
      </div>
      <p>&nbsp;</p>

    </div>
</div>
</div>
  <?php include "../inc_pie.php"; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2525189-2");
pageTracker._initData();
pageTracker._trackPageview();
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>
</body>
</html>
