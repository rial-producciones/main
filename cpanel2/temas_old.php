<script type="text/javascript">
function fTango(nombre){
	if (nombre == "TANGO"){
		document.getElementById("tonalidades").style.display = "block";
	}else{
		document.getElementById("tonalidades").style.display = "none";
	}
}
</script>
<?

$q_insert="INSERT INTO temas (id_artista, tonos ,nombre, tipo, precio, internacional, id_rubro, sonido , letra, nombre_archivo,titulo_html,meta_descripcion,meta_titulo,meta_keywords,meta_descripcion_in,meta_titulo_in,meta_keywords_in,descripcion) VALUES (%s, '%s', '%s', 2, '%s', '%s', %s, '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s')";

$q_update="UPDATE temas SET nombre='%s', tonos='%s', id_artista=%s, precio='%s', internacional='%s', id_rubro=%s , sonido='%s' , letra='%s' , nombre_archivo='%s', titulo_html='%s',  meta_descripcion='%s', meta_titulo='%s', meta_keywords='%s',meta_descripcion_in='%s', meta_titulo_in='%s', meta_keywords_in='%s', descripcion='%s' WHERE id='%s' AND tipo=2 LIMIT 1";


$q_insert_carrito="INSERT INTO articulos (id_articulo, tipo) VALUES (%s, 2)";



if (isset($_GET["delete_letra"])) {
	mysql_query("UPDATE temas SET letra = '' WHERE id=".$_GET["id"]." LIMIT 1");
	if (file_exists("../letrasArtistas/".$_GET["delete_letra"])){@unlink("../letrasArtistas/".$_GET["delete_letra"]);}
}
if (isset($_GET["delete_song"])) {
	mysql_query("UPDATE temas SET sonido = '' WHERE id=".$_GET["id"]." LIMIT 1");
	if (file_exists("../songArtistas/".$_GET["delete_song"])){@unlink("../songArtistas/".$_GET["delete_song"]);}
}

if (!empty($_GET["eliminar"])) {
	echo "<h2>".((mysql_query("DELETE FROM temas WHERE id=".$_GET["eliminar"]." LIMIT 1")) ? "Tema eliminado" : "Ocurrio un error")."</h2>";
	if (file_exists("../songArtistas/".$_GET["sonido"])){@unlink("../songArtistas/".$_GET["sonido"]);}
	if (file_exists("../letrasArtistas/".$_GET["letra"])){@unlink("../letrasArtistas/".$_GET["letra"]);}
}

if (V("newTema")!="" AND V("nombreTema")!="" AND V("id_artista")!="" AND V("precio")!="" AND V("rubro")!="" AND V("nombreArchivo")!="") {
$preciointEditar = (V("precioint")!="") ? V("precioint") : 30;

	
	$sonido_hidden = $_POST["sonido_hidden"];
	$name_sonido = $_FILES['sonido']['name'];		
	if($name_sonido==""){
		$name_sonido=$sonido_hidden;
	}else {					
		if($_FILES['sonido']['error']==0){
			$tmp_name = $_FILES['sonido']['tmp_name'];	
			$name_sonido = str_replace(" ","_",basename($_FILES['sonido']['name']));
			$names = explode(".",$name_sonido);
			$names = array_reverse($names);
			$extension = strtolower($names[0]);		
			if($extension == "mp3" || $extension == "wav"){
				if(!move_uploaded_file($tmp_name,"../songArtistas/".$name_sonido)){
					die("No se pudo subir el archivo");
				}	
			}else{
				die("La extension no es valida. El sistema solo admite *.mp3 o *.wav para la seccion.");
			}
		}
	}
		
		
	$letra_hidden = $_POST["letra_hidden"];
		$name_letra = $_FILES['letra']['name'];		
		if($name_letra==""){
			$name_letra=$letra_hidden;
		}else {					
			if($_FILES['letra']['error']==0){
				$tmp_name = $_FILES['letra']['tmp_name'];	
				$name_letra = str_replace(" ","_",basename($_FILES['letra']['name']));
				$names = explode(".",$name_letra);
				$names = array_reverse($names);
				$extension = strtolower($names[0]);		
				if($extension != "mp3" && $extension != "wav" && $extension != "exe"){
					if(!move_uploaded_file($tmp_name,"../letrasArtistas/".$name_letra)){
						die("No se pudo subir el archivo");
					}	
				}else{
					die("La extension no es valida. El sistema solo admite *.mp3 o *.wav para la seccion.");
				}
			}
		}
	
	
  if (V("editar")!="") $q=sprintf($q_update, qPrep(V("nombreTema")), qPrep(V("tonos")), qPrep(V("id_artista")), qPrep(V("precio")), qPrep($preciointEditar), qPrep(V("rubro")), $name_sonido, $name_letra, qPrep(V("nombreArchivo")), qPrep(V("tituloHTML")), qPrep(V("metaDescripcion")), qPrep(V("metaTitulo")) , qPrep(V("metaKeywords")), qPrep(V("metaDescripcion_in")), qPrep(V("metaTitulo_in")) , qPrep(V("metaKeywords_in")),qPrep(V("descripcion")), qPrep(V("editar")) );
  else {
  $q=sprintf($q_insert, qPrep(V("id_artista")), qPrep(V("tonos")), qPrep(V("nombreTema")), qPrep(V("precio")), qPrep($preciointEditar), qPrep(V("rubro")), $name_sonido, $name_letra, qPrep(V("nombreArchivo")), qPrep(V("tituloHTML")), qPrep(V("metaDescripcion")), qPrep(V("metaTitulo")) , qPrep(V("metaKeywords")),qPrep(V("metaDescripcion_in")), qPrep(V("metaTitulo_in")) , qPrep(V("metaKeywords_in")),qPrep(V("descripcion")) );
  }

	

	//-- GENERAR PAG ---------------------------------------//
	//$id = V("editar");
	$nombre = V("nombreArtista");
	$tituloHTML2 = V("tituloHTML");
	$meta_descripcion = V("metaDescripcion");
	$meta_titulo = V("metaTitulo");
	$meta_keywords= V("metaKeywords");
	
	$meta_descripcion_in = V("metaDescripcion_in");
	$meta_titulo_in = V("metaTitulo_in");
	$meta_keywords_in = V("metaKeywords_in");
	
	$url = V("nombreArchivo");
	
	$idartista = V("id_artista");
	$idtema = (V("id")=='')?0:V("id");
	
	//$id = "1";
		
	$idA = "idA";
	$idT = "idT";
	
	
	/* ARCHIVO DE ESPAÑOL */	
	
	$archivo = "../karaoke_temas_pag/".$url.".php";
	$fp = fopen($archivo, "w+");
	
	$string ='<? session_start(); ?>';
	
	$string .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	
	<title>'.$tituloHTML2.'</title>
	<meta name="title" content="'.$meta_titulo.'" />
	<meta name="description" content="'.$meta_descripcion.'" />
	<meta name="keywords" content="'.$meta_keywords.'" />
	<meta name="URL" content="http://www.rialproducciones.com.ar/" />
	<meta name="language" content="espanol" />
	<meta name="author" content="Rial Producciones " />
	<meta name="copyright" content="Rial Producciones" />
	<meta name="robots" content="ALL" />
	<meta name="revisit-after" content="15 days" />
	<meta name="reply-to" content="info@rialproducciones.com.ar" />
	<meta name="document-class" content="Published" />
	<meta name="document-rights" content="Private" />
	<meta name="document-type" content="Public" />
	<meta name="document-rating" content="General" />
	<meta name="document-distribution" content="Global" />
	<meta name="document-state" content="Dynamic" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="INDEX, FOLLOW, ARCHIVE" />
	<meta name="GOOGLEBOT" content="INDEX, FOLLOW, ARCHIVE" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="../site.css" rel="stylesheet" type="text/css" />
	<link href="../master.css" type="text/css" rel="stylesheet" media="all" />
	<style type="text/css">
		.titulo{
			font-family:Arial, Verdana, Helvetica, sans-serif;
			font-size:12px;
			color:#fff;
		}
		p.MsoNormal {
			margin:0in;
			margin-bottom:.0001pt;
			font-size:12.0pt;
			font-family:"Times New Roman";
		}
		.Estilo1 {color:#FFFFFF;}
		.Estilo2 {font-family:Arial;font-size:8.5pt;}
		#contenedorsite #cuerpo #menu {
			background-image: url(../n_imagenes/menu.png);
			height: 100px;
			background-repeat: no-repeat;
			width: 785px!important;
			margin: auto;
		}		
	</style>	
	
	</head>
	<body bgcolor="#000">';
		
	$string .= '<link href="../favicon.ico" rel="shortcut icon" title="Rial Producciones" >
				<link href="../extra/animated_favicon1.gif" rel="icon" title="Rial Producciones" type="image/gif" >
				<link rel="shortcut icon"href="../extra/animated_favicon1.gif" >
				
				<div id="paises">
				  <ul>
				    <li> <a href="../index.php"><img src="../n_imagenes/ban_esp.jpg" alt="Espanish" width="22" height="16" border="0" /> Spanish</a></li>
				    <li> <a href="../ingles"><img src="../n_imagenes/ban_eng.jpg" alt="Englis" width="22" height="16" border="0" /> English</a></li>
				  </ul>
				</div>';
				
	$string .= "<div id='contenedorsite'>";
	$string .= "<?php include '../inc_top.html'; ?>";
	$string .= "<div id='cuerpo'>";
	$string .= "<div style='width:850px; margin:auto;'>";
	
	$string .= '<script LANGUAGE="JavaScript">
				function agregar(){
				   if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
				      var url="http://www.rialproducciones.com.ar/";
				      var titulo="Lider Mundial en Pistas Profesionales para Cantantes";
				      window.external.AddFavorite(url,titulo);
				  }
				   else {
				      if(navigator.appName == "Netscape")
				         alert ("Presione Crtl+D para agregar este sitio en sus Bookmarks");
				   }
				}
				</script>
				<div id="menu">
				    <div id="menus">
				        <ul>
				          <li><a href="../index.php">Home</a></li>
				          <li><a href="../centroArtesanales2.php">Pistas&nbsp;Musicales</a></li>
				          <li><a href="../com.php">Composiciones&nbsp;-&nbsp;Arreglos</a></li>
				          <li><a href="../licencias.php">Licencias&nbsp;y&nbsp;Derechos</a></li>
				          <li><a href="../staff.php">Nuestro&nbsp;Staff</a></li>
				          <li><a href="../duplicaciones_cd.php">Duplicaciones&nbsp;de&nbsp;Cd&acute;s&nbsp;y&nbsp;Dvd&acute;s</a></li>
				          <li><a href="../studio.php">Estudio</a></li>
				          <li><a href="../profesores_canto.php">Profesores&nbsp;de&nbsp;Canto</a></li>
				          <li><a href="../link.php">Links</a></li>
				          <li><a href="javascript:agregar()">Agregar&nbsp;a&nbsp;Favoritos</a></li>  
				          <li style="margin-left:25px"><a href="../31_razones_para_elegirnos.php">31&nbsp;razones&nbsp;para&nbsp;elegirnos</a></li>   
				          <li><a href="../precioyenvio.php">Precios&nbsp;&minus;&nbsp;Pagos&nbsp;&minus;&nbsp;Env&iacute;os</a></li>
				          <li><a href="../contactenos.php">Cont&aacute;ctenos</a></li>    
				          <li><a href="http://rialproduccionesdescarga.dyndns.org" target="_blank">Zona Descargas</a></li> 
				          <li style="visibility:hidden;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>       
				      </ul>
				      </div>
				    <p>&nbsp;</p>
				    </div>';
		
	$string .= "<?php $$idA = $idartista; $$idT = $idtema; ?>"; 
	$string .= "<?php include '../dev_cdartesanalNEWT.php' ?>";
	$string .= "<div style='clear:both'></div>";
	$string .= "</div>";
	$string .= "</div>";	
	$string .= '<div align="center">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<?php include "../inc_pie2.php"; ?>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class="MsoNormal Estilo1"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial"> &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pistas, Pistas y m&aacute;s Pistas! - m&aacute;s de 60.000 pistas musicales en el tono que usted desee, con instrumentos reales y coros</span></p>
		<p class="MsoNormal Estilo1"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pistas Musicales, Playbacks, Karaokes, Bases Musicales, Pistas para Canto, Orquestaciones para Cantar, Backing Tracks</span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Composici&oacute;n y Arreglos de temas propios, in&eacute;ditos, covers</span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span class="Estilo2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">Jingles y Bandas Sonoras para cine,   radio, television y teatro. Producciones Musicales y Discograficas - </span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Roberto Rial Producciones - Buenos Aires - Argentina</span></p>
		<p>&nbsp;</p>
	</div>
	<div id="contenido"></div>';	
	
	$string .="</body></html>";
	$write = fputs($fp, $string);
	fclose($fp); 
  
  //-------------------------------------------------------------
  
  /* ARCHIVO DE INGLES */
	$archivo_in = "../ingles/karaoke_temas_pag/".$url.".php";
	$fp_in = fopen($archivo_in, "w+");
	
	$string_in ='<? session_start(); ?>';
	
	$string_in .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">	
	<head>	
	<title>'.$tituloHTML2_in.'</title>
	<meta name="title" content="'.$meta_titulo_in.'" />
	<meta name="description" content="'.$meta_descripcion_in.'" />
	<meta name="keywords" content="'.$meta_keywords_in.'" />
	<meta name="URL" content="http://www.rialproducciones.com.ar/" />
	<meta name="language" content="espanol" />
	<meta name="author" content="Rial Producciones" />
	<meta name="copyright" content="Rial Producciones" />
	<meta name="robots" content="ALL" />
	<meta name="revisit-after" content="15 days" />
	<meta name="reply-to" content="info@rialproducciones.com.ar" />
	<meta name="document-class" content="Published" />
	<meta name="document-rights" content="Private" />
	<meta name="document-type" content="Public" />
	<meta name="document-rating" content="General" />
	<meta name="document-distribution" content="Global" />
	<meta name="document-state" content="Dynamic" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="INDEX, FOLLOW, ARCHIVE" />
	<meta name="GOOGLEBOT" content="INDEX, FOLLOW, ARCHIVE" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="../../site.css" rel="stylesheet" type="text/css" />
	<link href="../master.css" type="text/css" rel="stylesheet" media="all" />
	<style type="text/css">
		.titulo{
			font-family:Arial, Verdana, Helvetica, sans-serif;
			font-size:12px;
			color:#fff;
		}
		p.MsoNormal {
			margin:0in;
			margin-bottom:.0001pt;
			font-size:12.0pt;
			font-family:"Times New Roman";
		}
		.Estilo1 {color:#FFFFFF;}
		.Estilo2 {font-family:Arial;font-size:8.5pt;}
		#contenedorsite #cuerpo #menu {
			background-image: url(../../n_imagenes/menu.png);
			height: 100px;
			background-repeat: no-repeat;
			width: 785px!important;
			margin: auto;
		}		
	</style>	
	
	</head>
	<body bgcolor="#000">';
		
	$string_in .= '<link href="../favicon.ico" rel="shortcut icon" title="Rial Producciones" >
				<link href="../extra/animated_favicon1.gif" rel="icon" title="Rial Producciones" type="image/gif" >
				<link rel="shortcut icon"href="../extra/animated_favicon1.gif" >
				
				<div id="paises">
				  <ul>
				    <li> <a href="../../index.php"><img src="../../n_imagenes/ban_esp.jpg" alt="Espanish" width="22" height="16" border="0" /> Spanish</a></li>
				    <li> <a href="../../ingles"><img src="../../n_imagenes/ban_eng.jpg" alt="Englis" width="22" height="16" border="0" /> English</a></li>
				  </ul>
				</div>';
				
	$string_in .= "<div id='contenedorsite'>";
	$string_in .= "<?php include '../inc_top.html'; ?>";
	$string_in .= "<div id='cuerpo'>";
	$string_in .= "<div style='width:850px; margin:auto;'>";
	
	$string_in .= '<script LANGUAGE="JavaScript">
				function agregar(){
				   if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
				      var url="http://www.rialproducciones.com.ar/";
				      var titulo="Lider Mundial en Pistas Profesionales para Cantantes";
				      window.external.AddFavorite(url,titulo);
				  }
				   else {
				      if(navigator.appName == "Netscape")
				         alert ("Presione Crtl+D para agregar este sitio en sus Bookmarks");
				   }
				}
				</script>
				<div id="menu">
				    <div id="menus">
				        <ul>
				          <li><a href="../index.php">Home</a></li>
				          <li><a href="../centroArtesanales2.php">Pistas&nbsp;Musicales</a></li>
				          <li><a href="../com.php">Composiciones&nbsp;-&nbsp;Arreglos</a></li>
				          <li><a href="../licencias.php">Licencias&nbsp;y&nbsp;Derechos</a></li>
				          <li><a href="../staff.php">Nuestro&nbsp;Staff</a></li>
				          <li><a href="../duplicaciones_cd.php">Duplicaciones&nbsp;de&nbsp;Cd&acute;s&nbsp;y&nbsp;Dvd&acute;s</a></li>
				          <li><a href="../studio.php">Estudio</a></li>
				          <li><a href="../profesores_canto.php">Profesores&nbsp;de&nbsp;Canto</a></li>
				          <li><a href="../link.php">Links</a></li>
				          <li><a href="javascript:agregar()">Agregar&nbsp;a&nbsp;Favoritos</a></li>  
				          <li style="margin-left:25px"><a href="../31_razones_para_elegirnos.php">31&nbsp;razones&nbsp;para&nbsp;elegirnos</a></li>   
				          <li><a href="../precioyenvio.php">Precios&nbsp;&minus;&nbsp;Pagos&nbsp;&minus;&nbsp;Env&iacute;os</a></li>
				          <li><a href="../contactenos.php">Cont&aacute;ctenos</a></li>    
				          <li><a href="http://rialproduccionesdescarga.dyndns.org" target="_blank">Zona Descargas</a></li> 
				          <li style="visibility:hidden;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>       
				      </ul>
				      </div>
				    <p>&nbsp;</p>
				    </div>';
		
	$string_in .= "<?php $$idA = $idartista; $$idT = $idtema; ?>"; 
	$string_in .= "<?php include '../dev_cdartesanalNEWT.php' ?>";
	$string_in .= "<div style='clear:both'></div>";
	$string_in .= "</div>";
	$string_in .= "</div>";	
	$string_in .= '<div align="center">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<?php include "../../inc_pie2.php"; ?>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class="MsoNormal Estilo1"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial"> &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pistas, Pistas y m&aacute;s Pistas! - m&aacute;s de 60.000 pistas musicales en el tono que usted desee, con instrumentos reales y coros</span></p>
		<p class="MsoNormal Estilo1"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pistas Musicales, Playbacks, Karaokes, Bases Musicales, Pistas para Canto, Orquestaciones para Cantar, Backing Tracks</span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Composici&oacute;n y Arreglos de temas propios, in&eacute;ditos, covers</span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span class="Estilo2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">Jingles y Bandas Sonoras para cine,   radio, television y teatro. Producciones Musicales y Discograficas - </span></p>
		<p class="MsoNormal Estilo1" style="MARGIN-BOTTOM: 3.75pt"><span style="FONT-SIZE: 8.5pt; FONT-FAMILY: Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Roberto Rial Producciones - Buenos Aires - Argentina</span></p>
		<p>&nbsp;</p>
	</div>
	<div id="contenido"></div>';	
	
	$string_in .="</body></html>";
	$write_in = fputs($fp_in, $string_in);
	fclose($fp_in);
	
  //------------------------------------------------------------------------



  if (mysql_query($q)) {

  echo "<h2>Tema agregado correctamente.</h2>";

  $_POST=array();

  $_GET=array();

  } else echo "<h2>ERROR</h2>";



} else echo "<h2>Debes completar todos los campos</h2>";



if (V("id")!="") {

  $r=mysql_query("SELECT * FROM temas WHERE id=".V("id")." LIMIT 1");

  $nombreTema=mysql_result($r, 0, "nombre");

  $artistaEditar=mysql_result($r, 0, "id_artista");
  
  $tonoEditar=mysql_result($r, 0, "tonos");

  $precioEditar=mysql_result($r, 0, "precio");

  $preciointEditar=mysql_result($r, 0, "internacional");
  
  $rubroEditar=mysql_result($r, 0, "id_rubro");
  
	$sonido=mysql_result($r, 0, "sonido");
	
	$letra=mysql_result($r, 0, "letra");
	
	$nombreArchivo=mysql_result($r, 0, "nombre_archivo");
	
	$nombreArchivo=str_replace(" ","_",$nombreArchivo);
	
  	$tituloHTML=mysql_result($r, 0, "titulo_html"); 
  	$metaDescripcion=mysql_result($r, 0, "meta_descripcion");  
 	$metaTitulo=mysql_result($r, 0, "meta_titulo");
	$metaKeywords=mysql_result($r, 0, "meta_keywords");

  	$metaDescripcion_in=mysql_result($r, 0, "meta_descripcion_in");  
 	$metaTitulo_in=mysql_result($r, 0, "meta_titulo_in");
	$metaKeywords_in=mysql_result($r, 0, "meta_keywords_in");	

	$descripcion=mysql_result($r, 0, "descripcion");
}


$r=mysql_query("SELECT * FROM artistas ORDER BY nombre ASC");
$optionAr="<option value='' ></option>";

while ($d=mysql_fetch_object($r)){
  if ($d->id==$artistaEditar){
  	$selected="selected='selected'";
	$artista_n = $d->nombre;
  }else {$selected="";}
  
  $optionAr.="<option value='{$d->id}' onclick='javascript:fTango(".'"'.$d->nombre.'"'.");' $selected>{$d->nombre}</option>";
	
}

$r=mysql_query("SELECT * FROM rubros");
$optionRu="<option value='' ></option>";

while ($d=mysql_fetch_object($r)){
  if ($d->id==$rubroEditar) $selected="selected='selected'";
  else $selected="";
    
  $optionRu.="<option value='{$d->id}' $selected>{$d->nombre}</option>";
}



$r=mysql_query("SELECT * FROM tonos");
$optionTono="<option value='' ></option>";

while ($d=mysql_fetch_object($r)){
  if ($d->nombre==$tonoEditar) $selected="selected='selected'";
  else $selected="";
    
  $optionTono.="<option value='{$d->nombre}' $selected>{$d->nombre}</option>";
}


?>



<form class="simpleFormA" action="" method="post" enctype="multipart/form-data">

<label>Nombre Tema</label><input type="text" class="input" name="nombreTema" value="<?=$nombreTema;?>"><br />

<label>Artista</label><select class="input" name="id_artista"><?=$optionAr;?></select><br />

<?echo $artista_n;?>

<div id="tonalidades" <?php if($artista_n == "TANGO") echo "style=display:block";else echo "style=display:none"; ?> >
	<label>Tonalidades</label><select name="tonos"><?=$optionTono;?></select><br>
</div>

<label>Rubro</label><select class="input" name="rubro"><?=$optionRu;?></select><br />

<label>Precio</label><input type="text" class="input" name="precio" value="<?=$precioEditar;?>"><br />

<label>Precio Internacional</label><input type="text" class="input" name="precioint" value="<?=$preciointEditar;?>"><br />


<label>Descripcion del Tema</label><input type="text" class="input" name="descripcion" value="<?=$descripcion;?>"><br />


<label>Sonido:</label><input type="file" id="sonido" name="sonido" value="<?=$sonido;?>">
<input name="sonido_hidden" id="sonido_hidden" type="hidden" value="<?=$sonido;?>">
<?php 
if($sonido!=''){
	echo $sonido;
	echo " <a href=\"?ver=temas&id={$_GET["id"]}&delete_song={$sonido}\">[Eliminar]</a>";
	}
?>
<br />
	
<label>Letra:</label><input type="file" id="letra" name="letra" value="<?=$letra;?>">
<input name="letra_hidden" id="letra_hidden" type="hidden" value="<?=$letra;?>">
<?php 
if($letra!=''){
	echo $letra;
	echo " <a href=\"?ver=temas&id={$_GET["id"]}&delete_letra={$letra}\">[Eliminar]</a>";
	}
?>
<br />

<label>Nombre del Archivo</label><input type="text" class="input" name="nombreArchivo" value="<?=$nombreArchivo;?>">SIN ESPACIOS EN BLANCOS<br />
<label>Titulo HTML</label><input type="text" class="input" name="tituloHTML" value="<?=$tituloHTML;?>"><br />

<br />
<div><u>ESPA&Ntilde;OL</u>:</div>
<label>Meta Descripci&oacute;n:</label><input type="text" size="90" name="metaDescripcion" value="<?=$metaDescripcion;?>"><br />
<label>Meta T&iacute;tulo:</label><input type="text" size="90" name="metaTitulo" value="<?=$metaTitulo;?>"><br />
<label>Meta Keywords:</label><input type="text" size="90" name="metaKeywords" value="<?=$metaKeywords;?>"><br />
<br />
<div><u>INGLES</u>:</div>
<label>Meta Descripci&oacute;n:</label><input type="text" size="90" name="metaDescripcion_in" value="<?=$metaDescripcion_in;?>"><br />
<label>Meta T&iacute;tulo:</label><input type="text" size="90" name="metaTitulo_in" value="<?=$metaTitulo_in;?>"><br />
<label>Meta Keywords:</label><input type="text" size="90" name="metaKeywords_in" value="<?=$metaKeywords_in;?>"><br />
<br />
	
<input type="submit" name="newTema" value="Agregar">


<?

if (V("id")!="") 
	echo '<input type="hidden" name="id" id="id" value="'.V("id").'">';
else
	echo '<input type="hidden" name="id" id="id" value="0">';

if (V("id")!="") echo '<input type="hidden" name="editar" value="'.V("id").'">';

?>

</form>

<h2>Buscar Tema</h2>
<form class="simpleForm" action="index.php?ver=temas" method="post">
<label>Nombre Tema</label><input type="text" class="input" name="nombreTemaBuscar" value="<?=$_POST["nombreTemaBuscar"];?>"><br />
<input type="submit" name="newTema" value="Buscar">
</form>


<?

$q="SELECT t.id, t.nombre, t.sonido , t.letra, t.descripcion, a.nombre as artista FROM temas t LEFT JOIN artistas a ON t.id_artista=a.id WHERE t.tipo=2 ";

if (!empty($_POST["nombreTemaBuscar"])) $q.=" AND t.nombre LIKE '%".$_POST["nombreTemaBuscar"]."%' ";

$q.=" LIMIT 100";

$r=mysql_query($q);


echo "<table class='tablaCpanel'>";

echo "<tr><th>Tema</th><th>Artista</th><th></th><th></th></tr>";

while ($d=mysql_fetch_object($r)) {

	echo "<tr><td>{$d->nombre}</td><td>{$d->artista}</td><td><a href=\"?ver=temas&id={$d->id}\">[Editar]</a></td><td><a href=\"?ver=temas&eliminar={$d->id}&letra={$d->letra}&sonido={$d->sonido}\">[Eliminar]</a></td></tr>";

}

echo "</table>"

?>