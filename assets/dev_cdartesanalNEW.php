<style type="text/css">
	.textoo {
		position: absolute;
		left: 536px;
		top: 40px;
	}

	.resultados {
		cursor: default !important;
	}

	.cursor {
		cursor: pointer !important;
	}
</style>
<?php
echo "<div class='nocel'>";
/*include "conexio.inc.php";
include "class.Carrito.php";
include "carrito.begin.php";*/
echo "</div>";
//echo "</div>";

function imageRestrict($image)
{
	// 
	$toWidth  = 82;
	$toHeight = 72;
	/*
if (!file_exists($image)){
 $image = "images/qmd.jpg";
}*/
	list($width, $height) = getimagesize($image);
	$xscale = $width / $toWidth;
	$yscale = $height / $toHeight;

	// Recalculate new size with default ratio
	if ($yscale > $xscale) {
		$new_width = round($width * (1 / $yscale));
		$new_height = round($height * (1 / $yscale));
	} else {
		$new_width = round($width * (1 / $xscale));
		$new_height = round($height * (1 / $xscale));
	}
	$mTop = round((106 - $new_height) / 2);
	return '<img src="' . $image . '" width="' . $new_width . '" height="' . $new_height . '" >';
}

$rubroID = "";
$idBtn = V("idBtn");

switch ($idBtn) {
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

?>
<script type="text/javascript" src="autocomplete/bsn.AutoSuggest_2.1.3_comp.js"></script>
<link href="site.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />
<link href="master.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<div class="dev_top_catalogo">

	<?php
	$rubroIDn = "";
	$idBtn2 = V("idBtn");

	switch ($_GET["idBtn"]) {
		case 1:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_tango.jpg' />";
			break;
		case 2:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_folklore.jpg' />";
			break;
		case 3:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_opera.jpg' />";
			break;
		case 4:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_comedia.jpg' />";
			break;
		case 5:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_varios.jpg' />";
			break;
		default:
			$rubroIDn = "<img class='img-fluid rounded' src='img/header_bus_general.jpg' />";
	}
	echo $rubroIDn;
	?>
</div>
<div class="caja_buscador">
	<?php //require_once('dev_cdartesanalNEWpromo.php'); 
	?>
	<?php //require_once('dev_cdartesanalNEWal.php'); 
	?>
</div>


<script type="text/javascript">
	var options_xml = {
		script: function(input) {
			return "autocomplete/autocomplete.php?input=" + input + "&testid=" + document.getElementById('testid').value;
		},
		varname: "buscarInput"
	};
	var as_xml = new bsn.AutoSuggest('buscarInput', options_xml);
</script>
<?php
$strQueryUni = "";
$strInv = "";
if ($buscarInput != "" || V("letraa") != "" || V("letrab") != "" || $rubroID != "") {
?>

	<div style="height:5px"></div>
	<div align="center">
		<?php
		$inicio = (!empty($_GET['page'])) ? $_GET['page'] - 1 : 0;
		$countRes = 50;


		if ($idBtn != 1) {
			$q = "	SELECT SQL_CALC_FOUND_ROWS
					a.nombre as nombre,
					a.imagen as ima,
					t.nombre_archivo as nArch,				
					t.nombre as tema,
					t.id,
					t.precio,
					t.id_rubro,
					t.internacional
				FROM artistas a 
				LEFT JOIN temas t ON t.id_artista = a.id 
				WHERE t.tipo = 2 
				AND t.nombre IS NOT NULL ";
		} else {
			$q = "	SELECT SQL_CALC_FOUND_ROWS
					a.nombre as nombre,
					a.imagen as ima,
					t.nombre_archivo as nArch,				
					t.nombre as tema,
					t.id,
					t.precio,
					t.id_rubro,
					t.internacional
				FROM artistas a 
				LEFT JOIN temas t ON t.id_artista = a.id 
				WHERE t.tipo = 2 AND t.id_rubro = $rubroID
				AND t.nombre IS NOT NULL AND t.tonos LIKE " . "'" . "Original%" . "'";
		}

		if (V("letraa") != "" || V("letrab") != "") {
			if (V("letraa") != "") {
				$q .= " AND a.nombre LIKE '" . V("letraa") . "%'";
			}
			if (V("letrab") != "") {
				$q .= " AND t.nombre LIKE '" . V("letrab") . "%'";
			}
		} else {
			if ($rubroID != "") {
				$q .= " AND t.id_rubro IN (" . $rubroID . ") ";
			} else {
				$strBusc = strtoupper(trim($buscarInput));
				$palabras = split(" ", $strBusc);
				if (count($palabras) > 1) {
					$strInv = trim($palabras[1]) . "%" . trim($palabras[0]);
				}
				$i = 0;
				foreach ($palabras as $elem) {
					if ($i == 0) {
						$i = 1;
					} else {
						$strQueryUni .= " OR ";
					}
					$strQueryUni .= "t.nombre LIKE '%" . $elem . "%' OR a.nombre LIKE '%" . $elem . "%' ";
				}
				$strQuery = " t.nombre LIKE '%" . $strBusc . "%' OR a.nombre LIKE '%" . $strBusc . "%' ";
				if ($strInv != "")
					$strQuery .= " OR t.nombre LIKE '%" . $strInv . "%' OR a.nombre LIKE '%" . $strInv . "%' ";
				$where = " AND (" . $strQuery . ") ";
				$selectUnion = $q . " AND (" . $strQueryUni . ") ";
				$q .= $where;
			}
		}
		//$orderBy = " ORDER BY a.nombre ASC, t.nombre ASC LIMIT ".($inicio*$countRes).", $countRes";
		$orderBy = " GROUP BY t.nombre ASC, a.nombre ASC LIMIT " . ($inicio * $countRes) . ", $countRes";
		$q .= $orderBy;
		//if($strQueryUni != "" && $strInv != ""){
		//$q = "SELECT SQL_CALC_FOUND_ROWS * FROM ( (".str_replace("SQL_CALC_FOUND_ROWS", " ", $q).") UNION (".str_replace("SQL_CALC_FOUND_ROWS", " ", $selectUnion).$orderBy.")) AS Re ";
		//}
		$r = mysql_query($q);
		$totalResultados = mysql_result(mysql_query("SELECT FOUND_ROWS() as rows "), 0, "rows");
		$paginas = ceil($totalResultados / $countRes);
		echo "<div id='izquierda'>$errorTono";
		$artistaActual = "";
		$class = true;
		if (mysql_num_rows($r) > 0) {
			while ($d = mysql_fetch_object($r)) {
				if ($artistaActual != $d->nombre)
					//echo "<tr class='artist'><td colspan='4'><span class='nombre' >Artista: {$d->nombre}</span></td></tr>";
					echo "";

				$artista = urlencode($d->nombre);
				$tema = urlencode($d->tema);

				$bot = V("idBtn");
				$pag = V("page");

				if ($d->id_rubro == 14)
					echo "<div id=\"$d->idA\" class='resultados' onclick='javascript:document.location.href=\"karaoke_temas_pag/{$d->nArch}.php?pag={$pag}&idBtn=1&artista={$artista}&tema={$tema}\"'>";
				else
					echo "<div id=\"$d->idA\" class='resultados' >";

				echo "<div style='float:left;'>";
				if ($d->ima != '') {
					$path = "imgArtistas/" . $d->ima;
					echo imageRestrict();
				}
				echo "</div>";

				echo "<div class='tema'><span>" . strtoupper($d->tema) . "<span></div>
    <div class='autor'><span>{$d->nombre}<span></div>";
				if ($d->id_rubro == 14) {
					echo "<div class='img cursor'><button  class='btn btn-success' onclick='javascript:document.location.href=\"karaoke_temas_pag/{$d->nArch}.php?pag={$pag}&idBtn={$bot}&artista={$artista}&tema={$tema}\"'  >Entre</button></div>";
				} else {
					echo "<div class='img cursor'><button  class='btn btn-success' onclick='javascript:document.location.href=\"karaoke_temas_pag/osito.php?pag={$pag}&idBtn={$bot}&artista={$artista}&tema={$tema}\"' >Entre aqu&iacute; para comprar</button></div>";
				}

				if ($d->id_rubro != 14) {
					echo "<div class='img'><a href='pedidos_tonos.php?pag={$pag}&idBtn={$bot}&artista={$artista}&tema={$tema}&id={$d->id}'><img src='img/demo.png' style='display:none'/></a></div>";
				}
				if ($d->ima != '')
					echo "<div class='fraces'>Pistas Musicales ( Canciones de Karaoke , Pistas para Cantar )</div>";
				else
					echo "<div class='fraces'>Pistas Musicales ( Canciones de Karaoke , Pistas para Cantar )</div>";
				echo "</div>";
				$artistaActual = $d->nombre;
				$class = (!$class);
			}
		} else {
			//echo '<div align="center"><b><img height="155" width="409" border="0" usemap="#Map" src="imagenes/errrobusqueda.gif"/></b></div>';
		?>
			<div align="center"><b><a href="com.php">
						<img height="181" width="240" border="0" src="../imagenes/errrobusquedaes.gif" /></a><a href="../ingles/com.php">
						<img height="182" width="240" border="0" src="../imagenes/errrobusquedaen.gif" /></a></b>
			</div>
	<?php
		}

		$querystring = array();
		if (V("goto") == "cd")
			$querystring[] = "goto=cd";
		elseif (V("goto") == "karaoke")
			$querystring[] = "goto=karaoke";
		if ($idBtn != "")
			$querystring[] = "idBtn=" . $idBtn;
		if (V("letraa") != "")
			$querystring[] = "letraa=" . V("letraa");
		if (V("letrab") != "")
			$querystring[] = "letrab=" . V("letrab");
		if ($buscarInput != "")
			$querystring[] = "buscarInput=" . $buscarInput;


		$querystring = implode("&", $querystring);
		echo "<ul class='pagination id='pagination'>";
		for ($a = 1; $a <= $paginas; $a++) {
			if ($a == $inicio)
				$class = " class='active'";
			else
				$class = '';
			echo "<li class='page-item'><a class='page-link' href='?page=" . $a . "&" . $querystring . "'$class>" . trim($a) . "</a></li>";
		}
		if ($_GET['page'] != 1 && !empty($_GET['page']))
			echo "<li class='page-item'><a class='page-link' href='?page=" . ($_GET['page'] - 1) . "&" . $querystring . "'><<< Anterior</a></li>";
		if ($_GET['page'] != $paginas && $totalResultados > $countRes)
			echo "<li class='page-item'><a class='page-link' href='?page=" . ($inicio + 2) . "&" . $querystring . "'>Siguiente >>></a></li>";
		echo "</ul></div></div><br/><br/><br/>";
		//echo "</div>";


	}


	?>