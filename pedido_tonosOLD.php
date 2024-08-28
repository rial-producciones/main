<!--<SCRIPT LANGUAGE='javascript'>try { if (top == self) {top.location.href='karaoke-pistas-musicales-playbacks.php'; } } catch(er) { } </SCRIPT>
--><?
session_start(); // inicio sesiones.
$artista=$_GET["artista"];
$tema=$_GET["tema"];
$idtono=$_GET["id"];
if(empty($_SESSION['demo'][$idtono]))
{

}
else
{}
;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Documento sin t&iacute;tulo</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<style type="text/css">
label.valid {
	width: 24px;
	height: 24px;
	background: url(boots/assets/img/valid.png) center center no-repeat;
	display: inline-block;
	text-indent: -9999px;
}
.control-label{ color:#FFF; font-size:12px;}
label.error {
	font-weight: bold;
	color: red;
	padding: 2px 8px;
	margin-top: 2px;
}
input, textarea{ width:100%; border:#666 1px solid}
	pre {
		
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
body{ background-color:#000; }
#address{ display:none!important; visibility:hidden!important;}
.container-fluid {
    padding-right: 15px;
    padding-left: 50px;
    margin-right: auto;
    margin-left: auto;
}
.Estilo2 {color: #FFF; font-size: 14px; }
</style>
</head>

<body>

<div class="container-fluid">
<h1 class="" style="color:#FF6; font-size:27px;">Solicitud de demos gratis</h1>
<p class="" style="color:#FF6; font-size:27px;">&nbsp;</p>
<div class="row">
  <div class="col-md-5">
         <form id="registration-form" class="form-horizontal" action="pedidos_tonos-ok.php" method="post" enctype="multipart/form-data">
       
          <div class="form-control-group">
            <label for="name" class="Estilo2">Nombre y Apellido</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="name" id="name">
            </div>
          </div>
         <div class="form-control-group">
            <label for="email" class="Estilo2">Email</label>
          <div class="controls">
              <input type="text" class="input-xlarge" name="email" id="email">
            </div>
          </div>
          
             <div class="form-control-group">
            <label for="email" class="Estilo2">Tel&eacute;fono</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="telefono" id="telefono">
            </div>
          </div>
          
          
           <div class="form-control-group">
            <label for="email" class="Estilo2">Pa&iacute;s de residencia</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="pais" id="pais">
            </div>
          </div>
          
          
           <div class="form-control-group">
            <label class="control-label" for="message"></label>
            <div class="controls">
            <pres>
              <textarea name="address" cols="" rows="7" class="input-xlarge pre" id="address">
<?php if(empty($_SESSION['demo'][$idtono]) && isset($_GET['artista']) && isset($_GET['tema']))
{
$_SESSION['demo'][$idtono] = array('artista' => $artista , 'tema' => $tema);

}else if(!empty($_SESSION['demo'][$idtono])){

} foreach($_SESSION["demo"] as $k => $v){echo "Artista:".utf8_encode($v["artista"])." Tema:".$v["tema"];echo "\n";}?></textarea>
              </pre>
            </div>
          </div>
          
          <div class="form-control-group">
            <label for="message" class="Estilo2">Comentarios</label>
            <div class="controls">
              <textarea name="coment" cols="" rows="7" class="input-xlarge" id="coment"></textarea>        
            </div>
          </div>
          </br>
          <div class="form-actions">
           <button type="submit" onClick="javascript:history.back()" class="btn btn-danger btn-large"></button>
           <button type="submit" class="btn btn-success btn-large"&nbsp;>&nbsp;&nbsp;Enviar Solicitud&nbsp;&nbsp;</button>

          </div>
  
      </form>
    </div>
    
 <div style="color:#FFF; font-size:12px;">
   <h2><span class="form-group"><br>
     Tiempo de Entrega: m&iacute;nimo 15 minutos - m&aacute;ximo 24 hs.<br>
     <br>
     Los demos ser&aacute;n enviados  en el <b>tono original</b> del int&eacute;rprete para <br>
     que conozca la versi&oacute;n
     ( No se env&iacute;an en otras tonalidades ).<br>
     <br>
     Con su compra, las Pistas ser&aacute;n enviadas al tono que desee.</span></h2>
   <p>&nbsp;</p>
   <h2>Ante cualquier observaci&oacute;n nos comunicaremos a su tel&eacute;fono.<span class="col-md-7"><br>
     <br>
     
     <?php 
//echo '<h3><span class="glyphicon glyphicon-user">Artista:</span></h3> <span <span class="alert-danger">'.$artista.' </span><h3><span class="glyphicon glyphicon-music">Tema:</span></h3><span <span class="alert-danger">'.$tema.'</span>';
if(empty($_SESSION['demo'][$idtono]) && isset($_GET['artista']) && isset($_GET['tema']))
{
$_SESSION['demo'][$idtono] = array('artista' => $artista , 'tema' => $tema);
	 echo "</br>";
	 echo "Se agrego demo a su pedido!!!";
	 echo "</br>";
}else if(!empty($_SESSION['demo'][$idtono])){
	 echo "</br>";
	 echo "<p style='color:#FF6'>DEMOS SELECCIONADOS (No deje de consultar en el recuadro de Comentarios por las pistas que no encuentre):</p>";

}
if(empty($_SESSION['demo'][$idtono])){echo ":: Demos Agregados ::";}
 echo "</br>";
 asort($_SESSION['demo']);
foreach($_SESSION["demo"] as $k => $v)
{
	echo "<p class='text-demo'>"."Artista:".utf8_encode($v["artista"])." - Tema:".utf8_encode($v["tema"]);
	if (!empty($_SESSION['demo'])){
	echo "<a href=/del_pedido_tonos.php?del=".$k." > Eliminar </a>"; 
	}
	echo "</p>";
}
?>
   </span></h2>
 </div>

</div>
    <!-- .span --> 
  </div>
  <!-- .row -->
  
<!-- .container --> 




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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
		  
		     pais: {
	      	minlength: 5,
	        required: true
	      },
		  
		     coment: {
	      	minlength: 5,
	        required: false
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
</body>
</html>