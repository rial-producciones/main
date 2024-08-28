<?php

session_start();

?>

<?php

if ($carrito->cantProductos() >= 0 || BUY === true) {

    if (isset($_GET["idBtn"]) || isset($_POST["buscarInput"])) {

        ?>

        

    <?php }

} ?>

<?php

$nc = $_POST['nc'];

$int = $_POST['int'];

$monedaMostrar = ($_SESSION["pais"] == "Otro") ? "internacional" : "precio";

$signoMostrar = ($_SESSION["pais"] == "Otro") ? "U\$D" : "\$";

$monedaMostrarDos = ($_SESSION["pais"] == "") ? "internacional" : "precio";

$signoMostrarDos = ($_SESSION["pais"] == "") ? "U\$D" : "\$";

$costoTotal = 0;



//sumamos el costo de envio

if ($carrito->cantProductos() > 0 || BUY === true) { //&& (!empty($_GET["id_rubro"])

    echo "<div id='derecha'>

		  <table class='total table' font-size: 11px;' cellspacing='0' cellpadding='0' border='0'>

					<tr class='columnas' style='background: #666; color:#fff;'>

						<th> Temas Seleccionados</th>

						<!-- <th>Precio</th><th>Cantidad</th>-->

						<th></th>

					</tr>";

    $count = 1;

    $class = true;

    foreach ($carrito->getProductos() as $k => $v) {

        $n = (strlen($count) == 2) ? $count : "0" . $count;

        if ($_SESSION['pais'] == "argentina") {

            echo "<tr class='" . (($class) ? "odd" : "even") . "'><td>$n. {$v['nombre']} <br/>({$v['artista']})</td><td>";

        } else {

            echo "<tr class='" . (($class) ? "odd" : "even") . "'><td>$n. {$v['nombre']} <br/>({$v['artista']})</td><td>";

        }

        if (BUY !== true)

            echo "<a href='?delete={$k}&$querystring' class='btn btn-danger cerrame'>x</a>";

        else

            echo "&nbsp;";

        echo "</td></tr>";

        $count++;

        $class = !$class;

        $costoTotal += $v[$monedaMostrar];

		$costoTotalDos += $v[$monedaMostrarDos];

    }

    include('inc_escala_precios.php');



    $costoEnvio = 0;

    if ($_SESSION["internacional"]["envio"] == 2)

        $costoEnvio = 30;

    if ($_SESSION["internacional"]["envio"] == 1)

        $costoEnvio = 15;

    if ($_SESSION["nacional"]["envio"] == 1)

        $costoEnvio = 40;





    echo "<tr class='all'><td colspan='4'><div class='totaltem'>Tienes {$carrito->cantProductos()} productos</div>";



    if (BUY === true AND $primerPaso === false) {

			echo "<p class='pesificados'>Subtotal Temas: $signoMostrar " . number_format($costoTotal, 2, ",", ".") . ".-</p>";

			echo "<p class='usedes'>Subtotal Temas: $signoMostrarDos " . number_format($costoTotalDos, 2, ",", ".") . ".-</p>";

        if ($costoEnvio != 0) {

            echo "<p class='pesificados'>Subtotal Envío: $signoMostrar " . number_format($costoEnvio, 2, ",", ".") . ".-</p>";

			echo "<p class='usedes'>Subtotal Temas: $signoMostrarDos " . number_format($costoTotalDos, 2, ",", ".") . ".-</p>";

        }

        if ($_SESSION["formaPago"] == 4) {

            if ($_POST["pasoDatos"] == "Continuar" || isset($_POST["fin"])) {

                echo"<p class='pesificados'>Total: $signoMostrar " . number_format($_SESSION['pcuota'], 2, ",", ".") . ".-</p>";

				echo"<p class='usedes'>Total: $signoMostrarDos " . number_format($_SESSION['pcuota'], 2, ",", ".") . ".-</p>";

            }

        } else {

            echo "<p class='pesificados'>Total: $signoMostrar " . number_format($costoTotal, 2, ",", ".") . ".-</p>";

			echo "<p class='usedes'>Total: $signoMostrarDos " . number_format($costoTotalDos, 2, ",", ".") . ".-</p>";
			

        }

    }



    echo "</td></tr>";

    if ($carrito->cantProductos() > 0) {

        if (BUY !== true){

            echo "<tr><td colspan='4'><a href='https://rialproducciones.com/nuevo/compra.php'><div class='sigueinte btn btn-success'>Comprar</div></a>" . generarSelectMonedas() . "</td></tr>";

        }

    }

    else {

        if ($carrito->cantProductos() > 1) {

            echo " pistas en el carrito,";

        } else {

            echo "pista en el carrito,";

        }

        "</div></td></tr>";

    }



    echo "</table>";

}

$_SESSION["oCarrito"] = serialize($carrito);

?>

