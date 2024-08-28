<?php

include("nuevo/monedasCarrito.php");
header('Content-Type: text/html; charset=UTF-8');
?>

<?php function error_handler($errno, $errstr, $errfile, $errline, $errctx)
{
}

set_error_handler("error_handler");

error_reporting(E_ALL);  ?>

<script type="text/javascript" src="https://rialproducciones.com/nuevo/js/jquery-1.4.3.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="../nuevo/css/alert.css">
<link rel="stylesheet" href="../nuevo/css/productos.css">
<?php

include "conexio.inc.php";

include "class.Carrito.php";

include "carrito.begin.php";



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

$buscarInput = utf8_decode(V("buscarInput"));


if ($idBtn != 1) {

	$tonos = array("ORIGINAL 0", "-1/2 Tono", "-1 Tono", "-1 1/2 Tonos", "-2 Tonos", "-2 1/2 Tonos", "-3 Tonos", "+ 1/2 Tono", "+ 1 Tono", "+ 1 1/2 Tonos", "+2 Tonos", "+2 1/2 Tonos", "+3 Tonos");

	$selectTonos = "<span style='font-size:10px;color:#fff;'>Seleccione para Comprar</span><select name='tonos' class='tonos'><option value=''>Tonalidades</option> ";



	//$tonos = array("ORIGINAL", "SOPRANO", "MEZZOSOPRANO", "TENOR", "BARITONO", "BAJO", "DO(C) - MAYOR", "DO#(C #) - MAYOR", "RE (D) - MAYOR", "MI b (E b)", "MI(E) - MAYOR", "FA(F) - MAYOR", "FA#(F #) - MAYOR", "SOL(G) - MAYOR", "SOL#(G #) - MAYOR", "LA(A) - MAYOR", "SI b (B b)", "SI(B) - MAYOR", "DO(C) - MENOR", "DO#(C #) - MENOR", "RE (D) - MENOR", "RE#(D #) - MENOR", "MI(E) - MENOR", "FA(F) - MENOR", "FA#(F #) - MENOR", "SOL(G) - MENOR", "SOL#(G #) - MENOR", "LA(A) - MENOR", "LA#(A #) - MENOR", "SI(B) - MENOR");

	$selectTonos = "<span style='font-size:10px;color:#fff;'>Seleccione para Comprar</span><select name='tonos' class='tonos'><option value=''>Tonalidades</option> ";

	foreach ($tonos as $v) {

		$selectTonos .= "<option value='{$v}'>{$v}</option>";
	}

	$selectTonos .= "</select>";
}

?>

<script src="../nuevo/autocomplete/bsn.AutoSuggest_2.1.3_comp.js"></script>



<script>
	function play(a) {

		var audio = document.getElementById(a);

		audio.play();



	}

	function pause(a) {

		var audio = document.getElementById(a);

		audio.pause();



	}

	function stop(a) {

		var audio = document.getElementById(a);

		audio.pause();

		audio.currentTime = 0;

		//audio.src = '';

		//link.innerHTML = 'Play';

		//player_state = 0;



	}
</script>

<link rel="stylesheet" href="../nuevo/autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />

<div>

	<div class="dev_top_catalogo">
		<div class="alerta">
			<p id="mensaje"></p>
		</div>
		<?php

		$rubroIDn = "";

		$idBtn2 = V("idBtn");



		switch ($_GET["idBtn"]) {

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

			default:
				$rubroIDn = "<img class='img-fluid rounded' src='../img/header_bus_general.jpg' width='700' />";
		}

		echo $rubroIDn;

		?>



	</div>

</div>



<!-- <script type="text/javascript">
	var options_xml = {

		script: function(input) {
			return "../autocomplete/autocomplete.php?input=" + input + "&testid=" + document.getElementById('testid').value;
		},

		varname: "buscarInput"

	};

	var as_xml = new bsn.AutoSuggest('buscarInput', options_xml);
</script> -->

<?php

$strQueryUni = "";

$strInv = "";



//if ($buscarInput != "" || V("letraa") != "" || V("letrab") != "" || $rubroID != "" || V("autor")!= ""){



if (V("artista") != "" && V("tema") != "") {



?>

	<div class="izquierdas">

		<p>

			<?php

			$inicio = (!empty($_GET['page'])) ? $_GET['page'] - 1 : 0;

			$countRes = 50;



			if ($idBtn != 1) {

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
			} else {

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

		WHERE t.tipo = 2 AND t.nombre = " . "'" . V("tema") . "'";
			}





			if (V("artista") != '' && V("tema") != '')

				$q .= " AND a.nombre = '" . V("artista") . "' AND t.nombre = '" . V("tema") . "'";



			$buscarInput = V("artista");



			$orderBy = " ORDER BY t.letra DESC, t.id ASC, t.nombre ASC, a.nombre ASC LIMIT " . ($inicio * $countRes) . ", $countRes";

			$q .= $orderBy;





			$r = mysql_query($q);



			$totalResultados = mysql_result(mysql_query("SELECT FOUND_ROWS() as rows "), 0, "rows");

			$paginas = ceil($totalResultados / $countRes);





			$page = V("pag");



			echo "<a style='margin-bottom:10px;' class='botonvolveratras text-left btn btn-outline-danger' href='" . $_SERVER["HTTP_REFERER"] . "'>&larr; Atrás</a></p>";


			echo $errorTono;





			$artistaActual = "";

			$class = true;

			if (mysql_num_rows($r) > 0) {

				while ($d = mysql_fetch_object($r)) {

					if ($artistaActual != $d->nombre)

						echo "";



					echo "<div class='resultados tanguitos'>";
					echo "<div class='contenido'>";
					echo "<div class='descripcion-tema descripcion-pistas'>";
					echo "<h3 class='tema'>" . strtoupper($d->tema) . "</h3>";
					echo "<p class='autor'>{$d->nombre}</p>";
					// if ($idBtn != 1) {
					// 	// echo "<div class='tema'><span>" . strtoupper(utf8_encode($d->tema)) . "</span></div>";
					// } else {

					// 	if ($d->letra != '') {

					// 		echo "<div class='autor'>Guia Vocal</div>";
					// 		echo "<div class='contenido'>";
					// 		echo "<div class='descripcion-tema'>";
					// 		// echo "<h3 class='tema'>" . strtoupper($d->tema) . "</h3>";
					// 		echo "<h3 class='tema'>" . strtoupper(utf8_encode($d->tema)) . "</h3>";
					// 		echo "<h3 style='color:#fff;'>( Tono " . $d->tono . " )</h3>";
					// 	} else {

					// 		echo "<div class='autor'>Pista Musical</div>";
					// 		echo "<div class='contenido'>";
					// 		echo "<div class='descripcion-tema'>";
					// 		echo "<h3 class='tema'>" . strtoupper(utf8_encode($d->tema)) . "</h3>";
					// 		echo "<h3 style='color:#fff;'>( Tono " . $d->tono . " )</h3>";
					// 	}
					// }

					// if ($idBtn != 1) {
					// 	echo "<p class='autor'>{$d->artista}</p>";
					// } else {

					// 	echo "<p class='autorTango'>{$d->artista}</p>";
					// }

					if ($d->sonido != '') { //SI SONIDO			

						// if ($idBtn != 1)

						// 	echo "<div>";

						// else

						// 	echo "<div>";


					}
					echo "<p class='fraces'>Demo</p>";
					if ($idBtn != 1) {
						echo "</div>";
					}
			?>
		<div class="media">
			<?php if ($d->sonido != '') { ?>
				<audio src="../songArtistas/<?php echo $d->sonido; ?>" preload="none" controls controlsList="nodownload"></audio>
			<?php } ?>
			<div class="botones">
				<?php
					if ($d->letra != '') {

						if ($d->sonido == '') { //SI LETRA , NO SONIDO		

							if ($idBtn != 1)

								echo "<div>";

							else

				?>
						<a class="bajaletra btn btn-info" href="../../descargar_letra.php?letra= <?php echo $d->letra ?>">Bajar Letra</a>


					<?php
						} else {
							if ($idBtn != 1) //SI LETRA , SI SONIDO	
								echo "<div>";
							else
					?>
						<a class="bajaletra btn btn-info" href="../../descargar_letra.php?letra= <?php echo $d->letra ?>">Bajar Letra</a>
				<?php

						}
					}

					// if ($d->sonido != '')

					// 	echo "<div>";

					// else

					// 	echo "<div>";

					$art = $d->artista;
					$asd = true;

					if ($asd) {
						// echo "<a class='bajaletra btn btn-info' href='../../descargar_letra.php?letra=" . $d->letra . "'>Bajar Letra</a>";
						$asd = false;
					} else {
						echo "<a style='display:none;' class='bajaletra btn btn-info' href='../../descargar_letra.php?letra=" . $d->letra . "'>Bajar Letra</a>";
					}

					// echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>$selectTonos
					echo "<form class='form_agregar' method='POST'>
					<div class='contenedor-tonos'>$selectTonos</div>
		            <input type='hidden' name='goto' value='karaoke' />
					<input type='hidden' name='id_rubro' value='" . V("id_rubro") . "' />
					<input type='hidden' name='script_url' value='{$_SERVER["SCRIPT_URL"]}' />
					<input type='hidden' name='query_string' value='{$_SERVER["QUERY_STRING"]}' />
					<input type='hidden' name='add' value='{$d->id}' />
					<input type='hidden' name='art' value='" . V("artista") . "' />
					<input type='hidden' name='idBtn' value='{$idBtn}' />
					<input type='hidden' name='letraa' value='" . V("letraa") . "' />
					<input type='hidden' name='letrab' value='" . V("letrab") . "' />
					<input type='hidden' name='buscarInput' value='{$buscarInput}' />";



					if ($idBtn == 1)

						echo "<input type='hidden' name='tonos' value='{$d->tono}' />";


					echo "<input type='hidden' name='artista' value='{$d->artista}' />
					<input type='hidden' name='tema' value='{$d->tema}' />
					<div><button type='submit' class='btn btn-danger' />A&ntilde;adir al carrito</button></div>
					</div></form>";
				?>
			</div>
			<?php
					// if ($idBtn != 1) echo "<p class='fraces'>Pistas Musicales ( Canciones de Karaoke , Pistas para Cantar )</p>";

					echo "</div>";
			?>
		</div>
	</div>
	</div>
<?php

					// if ($idBtn != 1)

					// 	echo "<div class='descripcion'>" . $d->descripcion . "</div>";

					// else

					// 	echo "<div class='descripcionTango'>" . $d->descripcion . "</div>";



					// echo "</div>";



					$artistaActual = $d->nombre;

					$class = (!$class);
				} //while

			} else { //if

				//echo '<div align="center"><b><img height="155" width="409" border="0" usemap="#Map" src="../imagenes/errrobusqueda.gif"/></b></div>';

?>

<div align="center"><b><a href="com.php"><img height="217" width="240" border="0" src="imagenes/errrobusquedaes.gif" /></a><a href="ingles/com.php"><img height="217" width="240" border="0" src="imagenes/errrobusquedaen.gif" /></a></b></div>

<?



				echo "<ul class='paginacion'>";

				for ($a = 1; $a <= $paginas; $a++) {

					if ($a == $inicio)

						$class = " class='active'";

					else

						$class = '';

					echo "<li><a href='?page=" . $a . "&" . $querystring . "'$class>" . trim($a) . "</a></li>";
				}

				if ($_GET['page'] != 1 && !empty($_GET['page']))

					echo "<li><a href='?page=" . ($_GET['page'] - 1) . "&" . $querystring . "'><<< Anterior</a></li>";

				if ($_GET['page'] != $paginas && $totalResultados > $countRes)

					echo "<li><a href='?page=" . ($inicio + 2) . "&" . $querystring . "'>Siguiente >>></a></li>";

				echo "</ul></div>";
			} //if

			echo "</div>";
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



		if ($artista != "")

			$querystring[] = "artista=" . urlencode($artista);

		else

	if (V("artista") != "")

			$querystring[] = "artista=" . urlencode(V("artista"));



		if ($tema != "")

			$querystring[] = "tema=" . urlencode($tema);

		else

	if (V("tema") != "")

			$querystring[] = "tema=" . urlencode(V("tema"));







		if ($idBtn == 1) {

			if ($tono != "")

				$querystring[] = "tono=" . urlencode($tono);

			else

		if (V("artista") != "")

				$querystring[] = "tono=" . urlencode(V("tono"));

			$querystring = implode("&", $querystring);
		}



		//
		session_destroy();
?>

</div>
<script>
	let cantItems = document.querySelector('#cantidadTemas')
	let form_agregar = document.getElementsByClassName("form_agregar")
	let alertt = document.getElementsByClassName("alerta")[0]
	let mensaje = document.getElementById("mensaje")
	let divProductos = document.querySelector(".productos")
	var carritoItems = JSON.parse(sessionStorage.getItem("carrito"))
	if (sessionStorage.getItem("carrito")) {
		corregirPrecio(carritoItems)
		corregirPrecioUSD(carritoItems)
		document.querySelector("#cantItemsCarito").innerHTML = carritoItems.length
		document.querySelector("#cantItems_cel").innerHTML = carritoItems.length
		// document.querySelector("#totalCarrito_cel").innerHTML = sessionStorage.getItem("totalCarrito")
		// sessionStorage.setItem('totalCarrito', corregirPrecio(carritoItems))
	} else {
		document.querySelector("#cantItemsCarito").innerHTML = 0
		// document.querySelector("#totalCarrito").innerHTML = 0
		// document.querySelector("#totalCarrito_cel").innerHTML = 0
		document.querySelector("#cantItems_cel").innerHTML = 0
		sessionStorage.setItem('totalCarrito', 0)
		sessionStorage.setItem('totalCarritoUSD', 0)
	}
	for (let i = 0; i < form_agregar.length; i++) {
		form_agregar[i].addEventListener("submit", (e) => {
			e.preventDefault()
			const data = Object.fromEntries(
				new FormData(e.target)
			);
			console.log(data);

			fetch("../actions/agregar_a_carrito.php", {
					method: "POST",
					headers: {
						"Content-Type": "application/json"
					},
					body: JSON.stringify(data)
				})
				.then(response => response.json())
				.then(data => {
					alertt.classList.add("show");
					if (data.msg === "Agregado correctamente") {
						mensaje.innerHTML = `${data.msg}`
					} else {
						mensaje.innerHTML = 'Este producto ya esta en tu carrito'
					}

					// console.log(data)
					let carrito = [];
					setTimeout(() => {
						alertt.classList.remove("show");
						if (sessionStorage.getItem("carrito")) {
							let carritoTemp = JSON.parse(sessionStorage.getItem("carrito"));
							if (!repetido(carritoTemp, data.carrito[0].id)) {
								carritoTemp[carritoTemp.length] = data.carrito[0];
								sessionStorage.setItem("carrito", JSON.stringify(carritoTemp))

								// mostrarCarrito()
							}
							corregirPrecio(carritoTemp)
						} else {
							carrito[0] = data.carrito[0];
							sessionStorage.setItem("carrito", JSON.stringify(carrito))
							let nuevoCarrito = JSON.parse(sessionStorage.getItem("carrito"))
							corregirPrecio(nuevoCarrito)
							corregirPrecioUSD(nuevoCarrito)
							// mostrarCarrito()
						}
						let cantActual = parseInt(document.querySelector("#cantItemsCarito").innerHTML)
						let cantActualC = parseInt(document.querySelector("#cantItems_cel").innerHTML)
						document.querySelector("#cantItemsCarito").innerHTML = cantActual + 1
						document.querySelector("#cantItems_cel").innerHTML = cantActualC + 1
					}, 2000);
				})
		})
	}

	function totalCarrito(carritoItems) {
		let totalC = 0;
		for (let i = 0; i < carritoItems.length; i++) {
			totalC += parseInt(carritoItems[i].precio);
		}
		return totalC;
	}

	function repetido(arr, idItemToSearch) {
		let itemInChart = false
		for (let i = 0; i < arr.length; i++) {
			if (arr[i].id == idItemToSearch) {
				itemInChart = true
			}
		}
		return itemInChart
	}

	function eliminarElemento(id) {
		let productos = document.querySelector(".productos")
		let div = document.getElementsByClassName("producto")[id]
		let div_cel = document.getElementsByClassName("producto_cel")[id]
		productos.removeChild(div)
		document.querySelector(".productos_cel").removeChild(div_cel)


		if (carritoItems.length == 0) {
			divProductos.innerHTML = 'No tenes temas seleccionados'
		}
	}

	function agregarElemento(texto) {
		// let div = document.querySelector(".productos")
		let etiquetaProducto = document.createElement('div')
		let etiquetaProducto_cel = document.createElement('div')
		etiquetaProducto.className = "producto"
		etiquetaProducto_cel.className = "producto_cel"
		etiquetaProducto.innerHTML = texto
		etiquetaProducto_cel.innerHTML = texto
		document.querySelector(".productos_cel").appendChild(etiquetaProducto)
		document.querySelector(".productos_cel").appendChild(etiquetaProducto_cel)
	}

	function mostrarCarrito() {
		let itemToAdd = carritoItems[carritoItems.length - 1];
		agregarElemento(`<p>${carritoItems.length}. ${itemToAdd.nombre}[ ${itemToAdd.tonos} ](${itemToAdd.nombre_artista})</p><button type="button" class="btn btn-danger eliminar" onclick='eliminar(${carritoItems.length - 1})'>x</button>`)


		if (carritoItems.length == 1) {
			cantItems.innerHTML = `Tienes ${carritoItems.length} producto`
		} else {
			cantItems.innerHTML = `Tienes ${carritoItems.length} productos`
		}
	}

	function corregirPrecioUSD(carritoItems) {
		let tottalUSD = 0;
		if (carritoItems.length >= 1 && carritoItems.length <= 9) {
			for (let i = 0; i < carritoItems.length; i++) {
				tottalUSD += parseInt(carritoItems[i].internacional)
			}
		} else if (carritoItems.length >= 10 && carritoItems.length <= 19) {
			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].internacional = Math.floor(parseInt(carritoItems[i].internacional) * 0.78)
				tottalUSD += parseInt(carritoItems[i].internacional)
			}
		} else if (carritoItems.length >= 20 && carritoItems.length <= 29) {

			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].internacional = Math.ceil(parseInt(carritoItems[i].internacional) * 0.665)
				tottalUSD += parseInt(carritoItems[i].internacional)
			}
		} else {
			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].internacional = Math.floor(parseInt(carritoItems[i].internacional) * 0.556)
				tottalUSD += parseInt(carritoItems[i].internacional)
			}
		}
		sessionStorage.setItem('totalCarritoUSD', tottalUSD)
	}

	function corregirPrecio(carritoItems) {
		let tottal = 0;
		if (carritoItems.length <= 2) {
			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].precio = Math.ceil(parseInt(carritoItems[i].precio) * 1.17)
				tottal += parseInt(carritoItems[i].precio)
			}
		} else if (carritoItems.length >= 3 && carritoItems.length <= 9) {
			for (let i = 0; i < carritoItems.length; i++) {
				tottal += parseInt(carritoItems[i].precio)
			}
		} else if (carritoItems.length >= 10 && carritoItems.length <= 19) {

			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].precio = Math.floor(parseInt(carritoItems[i].precio) * 0.843)
				tottal += parseInt(carritoItems[i].precio)
			}
		} else if (carritoItems.length >= 20 && carritoItems.length <= 29) {

			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].precio = Math.floor(parseInt(carritoItems[i].precio) * 0.753)
				tottal += parseInt(carritoItems[i].precio)
			}
		} else {

			for (let i = 0; i < carritoItems.length; i++) {
				carritoItems[i].precio = Math.ceil(parseInt(carritoItems[i].precio) * 0.638)
				tottal += parseInt(carritoItems[i].precio)
			}
		}
		// console.log(tottal)
		// document.querySelector('#totalCarrito').innerHTML = `${tottal}`
		// document.querySelector('#totalCarrito_cel').innerHTML = `${tottal}`
		sessionStorage.setItem('totalCarrito', tottal)
	}
	// let tottal = 0;
	// if (carritoItems.length <= 2) {
	// 	for (let i = 0; i < carritoItems.length; i++) {
	// 		carritoItems[i].precio = Math.ceil(parseInt(carritoItems[i].precio) * 1.17)
	// 		tottal += parseInt(carritoItems[i].precio)
	// 	}
	// } else if (carritoItems.length >= 3 && carritoItems.length <= 9) {
	// 	for (let i = 0; i < carritoItems.length; i++) {
	// 		tottal += parseInt(carritoItems[i].precio)
	// 	}
	// } else if (carritoItems.length >= 10 && carritoItems.length <= 19) {

	// 	for (let i = 0; i < carritoItems.length; i++) {
	// 		carritoItems[i].precio = Math.floor(parseInt(carritoItems[i].precio) * 0.843)
	// 		tottal += parseInt(carritoItems[i].precio)
	// 	}
	// } else if (carritoItems.length >= 20 && carritoItems.length <= 29) {

	// 	for (let i = 0; i < carritoItems.length; i++) {
	// 		carritoItems[i].precio = Math.floor(parseInt(carritoItems[i].precio) * 0.753)
	// 		tottal += parseInt(carritoItems[i].precio)
	// 	}
	// } else {

	// 	for (let i = 0; i < carritoItems.length; i++) {
	// 		carritoItems[i].precio = Math.ceil(parseInt(carritoItems[i].precio) * 0.638)
	// 		tottal += parseInt(carritoItems[i].precio)
	// 	}
	// }
	// document.querySelector('#totalCarrito').innerHTML = `${tottal}`
	// document.querySelector('#totalCarrito_cel').innerHTML = `${tottal}`
</script>
<div style="min-height:300px;"></div>