<?php
include("../monedasCarrito.php");
?>
<?php function error_handler($errno, $errstr, $errfile, $errline, $errctx) {

}
set_error_handler("error_handler");
error_reporting(E_ALL);  ?>
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<?php
/*include "conexio.inc.php";
include "class.Carrito.php";
include "carrito.begin.php";*/

$rubroID = "";
$idBtn = V("idBtn");

switch ($idBtn){
	case 1:
		$rubroID = "14";
	break;
	case 2:
		$rubroID = "4";
	break;
	case 3:
		$rubroID = "17, 21, 19, 21";
	break;
	case 4:
		$rubroID = "22, 15, 6";
	break;
	case 5:
		$rubroID = "1, 2, 3, 5, 7, 8, 9, 10, 11, 12, 13, 18";
	break;
}

$buscarInput = V("buscarInput");

if($idBtn!=1){
	$tonos = array("ORIGINAL 0", "-1/2 Tono", "-1 Tono", "-1 1/2 Tonos", "-2 Tonos", "-2 1/2 Tonos","-3 Tonos", "+ 1/2 Tono", "+ 1 Tono", "+ 1 1/2 Tonos", "+2 Tonos", "+2 1/2 Tonos", "+3 Tonos");
	$selectTonos = "<span style='font-size:10px;color:#fff;'>Seleccione para Comprar</span><select name='tono' class='tonos'><option value=''>Tonalidades</option> ";
	
	//$tonos = array("ORIGINAL", "SOPRANO", "MEZZOSOPRANO", "TENOR", "BARITONO", "BAJO", "DO(C) - MAYOR", "DO#(C #) - MAYOR", "RE (D) - MAYOR", "MI b (E b)", "MI(E) - MAYOR", "FA(F) - MAYOR", "FA#(F #) - MAYOR", "SOL(G) - MAYOR", "SOL#(G #) - MAYOR", "LA(A) - MAYOR", "SI b (B b)", "SI(B) - MAYOR", "DO(C) - MENOR", "DO#(C #) - MENOR", "RE (D) - MENOR", "RE#(D #) - MENOR", "MI(E) - MENOR", "FA(F) - MENOR", "FA#(F #) - MENOR", "SOL(G) - MENOR", "SOL#(G #) - MENOR", "LA(A) - MENOR", "LA#(A #) - MENOR", "SI(B) - MENOR");
	$selectTonos = "<span style='font-size:10px;color:#fff;'>Seleccione para Comprar</span><select name='tono' class='tonos'><option value=''>Tonalidades</option> ";
	foreach ($tonos as $v) {
		$selectTonos.="<option value='{$v}'>{$v}</option>";
	}
	$selectTonos.= "</select>";
}
 ?>
<script src="../autocomplete/bsn.AutoSuggest_2.1.3_comp.js"></script>

<script>
function play(a){
       var audio = document.getElementById(a);
       audio.play();

}
function pause(a){
       var audio = document.getElementById(a);
       audio.pause();

}
function stop(a){
       var audio = document.getElementById(a);
       audio.pause();
	   audio.currentTime = 0;
       //audio.src = '';
	   //link.innerHTML = 'Play';
	   //player_state = 0;

}
</script>
<link rel="stylesheet" href="../autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />
<div>
<div class="dev_top_catalogo">
  <?php 
$rubroIDn ="";
$idBtn2 = V("idBtn");

switch ($_GET["idBtn"]){
	case 1:
		$rubroIDn = "<img class='img-fluid rounded' src='../img/header_tango.jpg' width='700' />";
	break;
	case 2:
		$rubroIDn = "<img class='img-fluid rounded' src='../img/header_folklore.jpg' width='700' />";
	break;
	case 3:
		$rubroIDn = "<img class='img-fluid rounded' src='../img/header_opera.jpg' width='700' />";
	break;
	case 4:
		$rubroIDn = "<img class='img-fluid rounded' src='../img/header_comedia.jpg' width='700' />";
	break;
	case 5:
		$rubroIDn = "<img class='img-fluid rounded' src='../img/header_varios.jpg' width='700' />";
break;
	default: $rubroIDn = "<img class='img-fluid rounded' src='../img/header_bus_general.jpg' width='700' />";
}
echo $rubroIDn;
   ?>

</div>
</div>

<script type="text/javascript">
	var options_xml = {
		script: function (input) {return "../autocomplete/autocomplete.php?input="+input+"&testid="+document.getElementById('testid').value; },
		varname:"buscarInput"
	};
	var as_xml = new bsn.AutoSuggest('buscarInput', options_xml);
</script>
<?php
$strQueryUni = "";
$strInv = "";

//if ($buscarInput != "" || V("letraa") != "" || V("letrab") != "" || $rubroID != "" || V("autor")!= ""){

if (V("artista")!= "" && V("tema")!= ""){
	
	?>

<p>&nbsp;</p>
<div class="izquierdas">
  <p>
    <?php
	$inicio = (!empty($_GET['page'])) ? $_GET['page']-1 : 0;
	$countRes = 50;
	
	if($idBtn!=1){
		$q = "SELECT SQL_CALC_FOUND_ROWS
					a.nombre as artista,				
					t.nombre as tema,
					t.id,
					t.precio,
					t.sonido,
					t.descripcion as descripcion,
					t.internacional
				FROM artistas a 
				LEFT JOIN temas t ON t.id_artista = a.id 
				WHERE t.tipo = 2 
				AND t.nombre IS NOT NULL";
	}else{
		$q = "SELECT SQL_CALC_FOUND_ROWS
			a.nombre as artista,				
			t.nombre as tema,
			t.id,
			t.precio,
			t.sonido,
			t.tonos as tono,
			t.letra as letra,
			t.descripcion as descripcion,
			t.internacional
		FROM artistas a 
		LEFT JOIN temas t ON t.id_artista = a.id 
		WHERE t.tipo = 2 AND t.nombre = "."'".V("tema")."'";		
	}
	
			
	if(V("artista")!='' && V("tema")!='')
		$q.= " AND a.nombre = '".V("artista")."' AND t.nombre = '".V("tema")."'";
	
	$buscarInput = V("artista");
	
	$orderBy = " ORDER BY t.letra DESC, t.id ASC, t.nombre ASC, a.nombre ASC LIMIT ".($inicio*$countRes).", $countRes";
	$q.= $orderBy;

		
	$r = mysql_query($q);
	
	$totalResultados = mysql_result(mysql_query("SELECT FOUND_ROWS() as rows "), 0 , "rows");
	$paginas = ceil($totalResultados/$countRes);
	

	$page= V("pag");
	
	echo "<a class='botonvolveratras text-left btn btn-outline-danger' href='../karaoke-pistas-musicales-playbacks.php?page=$page&goto=karaoke&idBtn=$idBtn'>&larr; Volver a Rubro</a>";
	echo $errorTono;
	
	
	$artistaActual = "";
	$class = true;
	if (mysql_num_rows($r) > 0) {
		while ($d = mysql_fetch_object($r)) {
			if($artistaActual != $d->nombre)
				echo "";
				
			echo"<div class='resultados tanguitos'>";
			
			if($idBtn!=1)						
				echo "<div class='tema'><span>".strtoupper($d->tema)."</span></div>";
			else{
				if ($d->letra != ''){
					echo "<div class='autor'>Guia Vocal</div>";
					echo "<div class='tema'><span>".strtoupper($d->tema)."<br/><span style='color:#fff;'>( Tono ".$d->tono." )</span> </span></div>";
				}else{
					echo "<div class='autor'>Pista Musical</div>";
					echo "<div class='tema'><span>".strtoupper($d->tema)."<br/><span style='color:#fff;'>( Tono ".$d->tono." )</span> </span></div>";
				}
			}
			
			if($idBtn!=1)
				echo "<div class='autor'><span>{$d->artista}<span></div>";
			else
				echo "<div class='autorTango'><span>{$d->artista}<span></div>";
				
			if ($d->sonido!=''){//SI SONIDO			
				if($idBtn!=1)
					echo "<div>";	
				else
					echo "<div>";	
				
					echo "<span class='fraces'>Demo</span>";				
					?>   
					</p>
					<audio src="../songArtistas/<?php echo $d->sonido ?>" preload="auto" controls controlsList="nodownload"></audio>
					<?php					
				echo "</div>";			
			}
		
		
			if ($d->letra!=''){
				if($d->sonido==''){//SI LETRA , NO SONIDO		
					if($idBtn!=1)
						echo "<div>";	
					else
						?>   
						<div>
							<a class="bajaletra btn btn-info" href="../descargar_letra.php?letra=<?echo $d->letra?>">Bajar Letra</a>
						</div>    	         	      				
						<?php
				}else{
					if($idBtn!=1)//SI LETRA , SI SONIDO	
						echo "<div>";	
					else
						?>   
						<div>
							<a class="bajaletra btn btn-info" href="../descargar_letra.php?letra=<?echo $d->letra?>">Bajar Letra</a>
						</div>    	         	      				
						<?php					
				}
			}		
		
	
		
			if ($d->sonido!='')
				echo "<div>";
			else
				echo "<div>";
				
			$art = $d->artista;
			echo"<form action='".$_SERVER['PHP_SELF']."' method='get'>$selectTonos
		            <input type='hidden' name='goto' value='karaoke' />
					<input type='hidden' name='id_rubro' value='".V("id_rubro")."' />
					<input type='hidden' name='add' value='{$d->id}' />
					<input type='hidden' name='art' value='".V("artista")."' />
					<input type='hidden' name='idBtn' value='{$idBtn}' />
					<input type='hidden' name='letraa' value='".V("letraa")."' />
					<input type='hidden' name='letrab' value='".V("letrab")."' />
					<input type='hidden' name='buscarInput' value='{$buscarInput}' />";
					
						if($idBtn==1)
							echo "<input type='hidden' name='tono' value='{$d->tono}' />";
				
					echo "<input type='hidden' name='artista' value='{$d->artista}' />
					<input type='hidden' name='tema' value='{$d->tema}' />
					
					<div><button class='btn btn-danger' />A&ntilde;adir al carrito</button></div>
					</div></form>";
					if($idBtn!=1)echo "<div class='fraces'>Pistas Musicales ( Canciones de Karaoke , Pistas para Cantar )</div>";
					
					if($idBtn!=1)
						echo "<div class='descripcion'>".$d->descripcion."</div>";
					else
						echo "<div class='descripcionTango'>".$d->descripcion."</div>";
											
			echo"</div>";
		
			$artistaActual = $d->nombre;
			$class = (!$class);
			
		}//while
	}else{//if
		//echo '<div align="center"><b><img height="155" width="409" border="0" usemap="#Map" src="../imagenes/errrobusqueda.gif"/></b></div>';
	?>
		  <div align="center"><b><a href="com.php"><img height="217" width="240" border="0" src="../imagenes/errrobusquedaes.gif"/></a><a href="../ingles/com.php"><img height="217" width="240" border="0" src="../imagenes/errrobusquedaen.gif"/></a></b></div>
  <?
     
	  echo "<ul class='paginacion'>";
for ($a = 1; $a<=$paginas; $a++){
	if ($a == $inicio)
		$class = " class='active'";
	else 
		$class = '';
	echo "<li><a href='?page=". $a ."&". $querystring ."'$class>". trim($a) ."</a></li>";
}
if ($_GET['page'] != 1 && !empty($_GET['page']))
	echo "<li><a href='?page=". ($_GET['page']-1) ."&". $querystring ."'><<< Anterior</a></li>";
if ($_GET['page'] != $paginas && $totalResultados > $countRes)
	echo "<li><a href='?page=".($inicio+2)."&".$querystring."'>Siguiente >>></a></li>";
echo "</ul></div>";
	}//if
	echo "</div>";
}

$querystring = array();
if (V("goto") == "cd")
	$querystring[] = "goto=cd";
elseif (V("goto") == "karaoke")
	$querystring[] = "goto=karaoke";
if ($idBtn != "")
	$querystring[] = "idBtn=".$idBtn;
if (V("letraa") != "")
	$querystring[] = "letraa=".V("letraa");
if (V("letrab") != "")
	$querystring[] = "letrab=".V("letrab");
if ($buscarInput != "")
	$querystring[] = "buscarInput=".$buscarInput;
	
if ($artista != "")
	$querystring[] = "artista=".urlencode($artista);
else
	if (V("artista") != "")
		$querystring[] = "artista=".urlencode(V("artista"));	
	
if ($tema != "")
	$querystring[] = "tema=".urlencode($tema);
else
	if (V("tema") != "")	
		$querystring[] = "tema=".urlencode(V("tema"));	
		
		
		
if($idBtn==1){
	if ($tono != "")
		$querystring[] = "tono=".urlencode($tono);	
	else
		if (V("artista") != "")
			$querystring[] = "tono=".urlencode(V("tono"));	
			$querystring = implode("&", $querystring);

}

//
?>
</div>
<div style="min-height:300px;"></div>