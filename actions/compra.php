<?php

header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

header("Cache-Control: post-check=0, pre-check=0", false);

session_cache_limiter("must-revalidate");

session_start();



include("monedasCarrito.php");

$signoMostrar = ($_SESSION["pais"] == "otro") ? "U\$D" : "\$";



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Pistas, Pistas Musicales, Karaoke Profesional, Backing Tracks - Tango, Opera, Broadway, Rock, Pop, Latinos, Folklore, Infantiles, Tangos - Roberto Rial Producciones -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="title" content="Pistas, Pistas Musicales, Karaoke Profesional, Backing Tracks - Tango, Opera, Broadway, Rock, Pop, Latinos, Folklore, Infantiles, Tangos - Roberto Rial Producciones" />
    <meta name="description" content="Pistas - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes - m&aacute;s de 60.000 pistas de karaoke en el tono que desee. Tambi�n componen temas in�ditos." />
    <meta name="keywords" content="tango,tangos,TANGO,pistas,pistas,pistas,karaoke,playbacks,orquestaciones,pistas musicales,pistas para cantar,composiciones,copias de cd,karaokes,midi,midis,duplicaciones de cd,opera karaoke,broadway karaoke,profesores de canto, artistas, contrataciones" />
    <meta name="URL" content="http://www.rialproducciones.com.ar/nuevo/" />
    <meta name="language" content="espanol" />
    <meta name="author" content="Rial Producciones" />
    <meta name="copyright" content="Rial Producciones" />
    <meta name="robots" content="ALL" />
    <meta name="revisit-after" content="15 days" />
    <meta name="reply-to" content="contactos@rialproducciones.com" />
    <meta name="document-class" content="Published" />
    <meta name="document-rights" content="Private" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="document-distribution" content="Global" />
    <meta name="document-state" content="Dynamic" />
    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
        const mostrar = (elemento) => {

            elemento.style.display = 'block';

        }

        const ocultar = (elemento) => {

            elemento.style.display = 'none';

        }

        const mostrarOcultar = (id) => {

            let div = document.getElementById(id);

            if (window.getComputedStyle(div).display !== 'none') {

                ocultar(div);

                return false;

            }



            mostrar(div);

        }
    </script>



    <link href="site.css" rel="stylesheet" type="text/css" />
    <link href="master.css" type="text/css" rel="stylesheet" media="all" />

    <link rel="stylesheet" href="./css/productos.css" media="all">
    <style type="text/css">
        .derecha {
            display: none;
        }
    </style>
    <?php

    include "assets/inc/metadatos.php";

    include "assets/inc/inc_top.php";

    ?>

    <div class="contenidos-desseccion demostraciones">

        <div class="container">

            <br /><br />

            <?php

            $Cuoterio = "";

            for ($i = 0; $i <= $Precios->CantSinIntCuotas; $i++) {

                $Cuoterio .= $Precios->SinIntCuotas[$i] . ',';
            };

            ?>

            <div class="row">

                <div class="col-sm-12 col-md-6">

                    <table class="table">

                        <?php

                        if (!empty($_GET['id_rubro'])) {

                        ?>

                            <tr></tr>

                        <?php

                        }

                        ?>

                    </table>

                    <div>

                        <?php

                        session_start();

                        include "conexio.inc.php";

                        include "class.Carrito.php";

                        include "carrito.begin.php";

                        $primerPaso = false;

                        define("BUY", true);

                        $monedaMostrar = ($_SESSION["pais"] == "") ? "internacional" : "precio";



                        ?>

                        <div>

                            <!-- hack new form al -->

                            <div class="backs2" style="margin-top:-50px; float:right; z-index:99999; right:0;">

                                <a href="javascript: window.history.back();" class="btn btn-outline-dark">Volver Atr&aacute;s</a><br /><br />

                            </div>

                            <style>
                                .backs a:hover {

                                    color: #fff !important;

                                }
                            </style>

                            <div class="backs" style="margin-top:-50px; float:right; z-index:99999; right:0;">
                                <a style=":hover:#fff; pointer:hand;" class="btn btn-outline-dark">Volver Atr&aacute;s</a><br /><br />
                            </div>

                            <!-- <h5>Temas seleccionados:</h5><br /> -->
                            <?php

                            // $Compra;

                            // foreach ($carrito->getProductos() as $k => $v) {

                            //     $Compra .= $v[nombre] . " \n";
                            // }

                            ?>

                            <!-- <textarea class="form-control" name="temaspedidos" rows="5"></textarea> -->

                            <hr />

                            <div class="pasouno">

                                <h5>Seleccione su pa&iacute;s de residencia</h5><br />

                                <input class='selectpasouno' name="pais" type="radio" value="argentina" /> Argentina&nbsp;&nbsp;&nbsp;<input class='selectpasouno' name="pais" type="radio" value="otro" /> Otro pa&iacute;s

                                <br /><br />

                                <div class="alert alert-info">

                                    <b>Env&iacute;o en formato mp3 320 kbps. m&aacute;xima calidad.</b><br />

                                    <i>( Recibir&aacute; un e-mail con las claves y las indicaciones para descargar desde nuestra p&aacute;gina )</i>

                                </div>

                                <hr />

                            </div>

                            <div class="pasodosa">

                                <h6>Usted est&aacute; en Argentina.</h6>



                                <h5>Seleccione la forma de pago</h5><br />



                                <input type="radio" name="formapago" value="7" />



                                MercadoPago (Tarjetas de cr&eacute;dito, d&eacute;bito.)<br />

                                <br />

                                <div class="alert alert-info">



                                    No necesitas tener una cuenta de MercadoPago, puedes pagar de forma directa.



                                </div>



                                <input name="formapago" type="radio" value="6" />



                                Transferencias, dep&oacute;sitos bancarios<br />

                                <br />

                                <div class="alert alert-info">



                                    Dep&oacute;sito o Transferencia Bancaria<br />



                                    Tiempo de Entrega: m&aacute;ximo 24 hs.



                                </div>







                                <hr />

                            </div>

                            <div class="pasomp">
                                <form name="FormMP" class="FormMP" method='post'>
                                    <!-- <form name="FormMP" action='compranew1.php' method='post'> -->

                                    <h6>Usted est&aacute; en Argentina.</h6>

                                    <hr>

                                    <h5>Medios de pago a trav&eacute;s de MercadoPago</h5><br />

                                    <div class="alert alert-info">



                                        <B>Tarjetas de cr&eacute;dito</B>

                                        <br /><small>Cuotas sin inter&eacute;s con bancos seleccionados</small>

                                        <br /><img src="assets/img/forma-pago-ccard.png" alt="Forma de Pago Tarjeta de crédito" border="0" style="width:90%" />



                                        <br /><br /><B>Tarjeta de d&eacute;bito</B>

                                        <br /><img src="assets/img/forma-pago-debito.png" alt="Forma de Pago Tarjeta de débito" border="0" style="width:100%" />

                                    </div>

                                    <h5>Para finalizar tu compra, completa los siguientes datos</h5><br />

                                    <div class="form-group row">

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php $_POST['nombre'];

                                                                                                                                ?>" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="telefonouno" class="form-control" placeholder="Tel&eacute;fono 1" value="<?php $_POST['tel1']; ?>" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-12">

                                            <input type="email" name="email" class="form-control emailuno" placeholder="E-mail" value="<?php $_POST['email']; ?>" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-12">

                                            <br />

                                            <textarea class="form-control" name="mensaje" cols="40" placeholder="Comentarios" rows="5"></textarea>

                                        </div>

                                    </div> <span style="font-size:16px">Vas a abonar con Mercado Pago. Presiona el siguiente bot&oacute;n</span>

                                    <BR><BR><button type="submit" class="btn btn-primary">CONTINUAR </button><BR><BR>

                                </form>

                            </div>

                            <div class="pasotf">
                                <form id="FormTB" class="FormTB" method='post'>
                                    <!-- <form id="FormTB" action='compratf.php' method='post'> -->

                                    <h6>Usted est&aacute; en Argentina.</h6>

                                    <hr>

                                    <h5>Transferencia bancaria</h5><br />



                                    <h5>Para finalizar tu compra, completa los siguientes datos</h5><br />

                                    <div class="form-group row">

                                        <div class="col-sm-12 col-md-12">

                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-12">

                                            <input type="text" name="direccion" class="form-control" placeholder="Direccion" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="localidad" class="form-control" placeholder="Localidad" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="codpostal" class="form-control" placeholder="Codigo Postal" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="telefonouno" class="form-control" placeholder="Tel&eacute;fono 1" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="text" name="telefonodos" class="form-control" placeholder="Tel&eacute;fono 2" />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="email" name="email" class="form-control emailunotb" placeholder="E-mail" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-6">

                                            <input type="email" name="repetiremail" class="form-control emaildostb" placeholder="Repetir E-mail" required />

                                        </div>

                                        <br /><br />

                                        <div id="alertaemail"></div>

                                        <div class="col-sm-12 col-md-12">

                                            <input type="text" name="provincia" class="form-control" placeholder="Provincia / Estado" required />

                                        </div>

                                        <br /><br />

                                        <div class="col-sm-12 col-md-12">

                                            <br /><br />

                                            <textarea class="form-control" name="mensaje" cols="40" placeholder="Comentarios" rows="5"></textarea>

                                        </div>

                                    </div> <span style="font-size:16px">Recibir&aacute;s un correo electr&oacute;nico con los datos de la cuenta bancaria para realizar la transferencia. Presiona el siguiente bot&oacute;n</span>

                                    <BR><BR><button type="submit" class="btn btn-primary">CONTINUAR </button><BR><BR>

                                </form>

                            </div>

                            <div class="pasodosb">

                                <form id="formWU" action="send.php" method="POST">

                                    <h6>Usted No vive en Argetina.</h6>

                                    <h5>Seleccione la forma de pago</h5><br />

                                    <input name="formapago" type="radio" value="3" />

                                    Tarjetas de Cr&eacute;dito <b>para compras Internacionales</b>

                                    <div class="alert alert-info">

                                        Tiempo de Entrega: m&aacute;ximo 24 hs.

                                    </div>



                                    <hr />

                            </div>



                            <div class="pasotresa">

                                <h5>Calculo Compra</h5><br />

                                <div class="form-group row">

                                    <div class="col-sm-12 col-md-6">

                                        <b>Monto de compra:</b><br />

                                        <?php

                                        $MontoInicial = $carrito->getTotal();

                                        ?>

                                        <input id='montoinicial' name='montoinicial' readonly value="<?php echo $MontoInicial ?>" /> AR$<br /><br />

                                        <b>Seleccione cantidad de cuotas:</b><br />

                                        <select id="cuotas" name="cuotas">

                                            <?php

                                            //print_r($Precios->NumDCuotas);

                                            $Conteo = count($Precios->NumDCuotas);

                                            //echo "<br/>";

                                            for ($i = 0; $i < $Conteo; $i++) {

                                                echo "<option value=" . $Precios->NumDCuotas[$i] . ">" . $Precios->NumDCuotas[$i] . "</option>";
                                            }

                                            ?>

                                        </select>

                                        <br /><br />

                                        <div class="montofinal">

                                            <b>Monto de compra financiado:</b><br />

                                            <input id="montofinal" name='montofinal' readonly /> AR$<br /><br />

                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-6">

                                        <img src="assets/img/securitypayment.png" alt="" />

                                    </div>

                                    <div class="col-12">

                                        <br />

                                        <img src="SUCOMPRAENCUOTAS.jpg" class="img-fluid rounded" alt="" />

                                    </div>

                                </div>

                                <hr />

                            </div>

                            <div class="pasotresb">

                                <h5>Complete sus datos</h5><br />

                                <div class="form-group row">

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php $_POST['nombre']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="direccion" class="form-control" placeholder="Direcci&oacute;n" value="<?php $_POST['direccion']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="localidad" class="form-control" placeholder="Localidad" value="<?php $_POST['localidad']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="codigop" class="form-control" placeholder="C&oacute;digo Postal" value="<?php $_POST['codigop']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="telefonouno" class="form-control" placeholder="Tel&eacute;fono 1" value="<?php $_POST['tel1']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="telefonodos" class="form-control" placeholder="Tel&eacute;fono 2" value="<?php $_POST['tel2']; ?>" />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="email" name="email" class="form-control emailuno" placeholder="E-mail" value="<?php $_POST['email']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="email" name="repetiremail" class="form-control emaildos" placeholder="Repetir E-mail" value="<?php $_POST['email']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="provincia" class="form-control" placeholder="Provincia/Estado" value="<?= $_POST['provincia']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-6">

                                        <input type="text" name="pais" class="form-control" placeholder="Pa&iacute;s" value="<?php $_POST['paisUsu']; ?>" required />

                                    </div>

                                    <br /><br />

                                    <div class="col-sm-12 col-md-12">

                                        <br />

                                        <textarea class="form-control" name="mensaje" cols="40" placeholder="Comentarios" rows="5"></textarea>

                                    </div>

                                </div>

                                <hr />

                            </div>



                            </form>

                            <form id="checkOut" action='https://www.2checkout.com/checkout/purchase' method='post' target="_blank">

                                <div class="pasotresfuera">

                                    <b>

                                        Clikee en "Continuar" para comprar con tarjetas de cr&eacute;dito en Rial Producciones.

                                    </b><br /><br />

                                    <input type="hidden" name="id_type" value="1">

                                    <input type="hidden" name="lang" value="<?= $_SESSION["idiomaCheck"]; ?>">
                                    <input type="hidden" name="tco_currency" value="USD">
                                    <!-- <?php //if ($_SESSION['pais'] == "argentina") { 
                                            ?>

                                        <input type="hidden" name="tco_currency" value="ARS">

                                    <?php

                                    //} else {

                                    ?>

                                        <input type="hidden" name="tco_currency" value="USD">

                                    <?php //} 
                                    ?> -->

                                    <div class="productos_input">

                                    </div>

                                    <?

                                    $n = 1;

                                    foreach ($carrito->getProductos() as $k => $v) {

                                    ?>

                                        <input type="hidden" name="c_prod_<?= $n; ?>" value="<?= $k; ?>,<?= $v['cantidad']; ?>">

                                        <input type="hidden" name="c_name_<?= $n; ?>" value="<?= $v['nombre'] . " (" . $v['artista'] . ")"; ?>">

                                        <input type="hidden" name="c_description_<?= $n; ?>" value="+">

                                        <input type="hidden" name="c_price_<?= $n; ?>" value="<?= number_format($v[$monedaMostrar], 2, ".", ","); ?>">

                                    <?

                                        $costoTotal += $v[$monedaMostrar];

                                        $n++;
                                    }

                                    include('inc_escala_precios.php');

                                    if ($costoEnvio > 0) {

                                    ?>

                                        <input type="hidden" name="c_prod_<?= $n; ?>" value="80000,1">

                                        <input type="hidden" name="c_name_<?= $n; ?>" value="Costo de envio">

                                        <input type="hidden" name="c_description_<?= $n; ?>" value="+">

                                        <input type="hidden" name="c_price_<?= $n; ?>" value="<?= number_format($costoEnvio, 2, ".", ","); ?>">

                                    <?

                                    }

                                    ?>

                                    <?

                                    $costoTotal += $costoEnvio;

                                    if ($_SESSION["pais"] == "argentina" && $_SESSION["formaPago"] == 1) {

                                        $costoTotal = round(number_format($costoTotal / $monedasCarrito[2]["val"], 2));
                                    }

                                    ?>

                                    <input type="hidden" name="sid" value="75081">

                                    <input type="hidden" name="cart_order_id" value="<?= time(); ?>">

                                    <!-- <input type="hidden" name="total" value="<?php //number_format($costoTotal, 2, ".", ","); 
                                                                                    ?>"> -->
                                    <input type="hidden" name="total" id="total" value="0">

                                    <input class="btn btn-success" type="submit" value="Continuar" />

                                </div>

                            </form>

                            <br /><br />

                            <script>
                                $(document).ready(function() {

                                    var i = 0;

                                    $('.usedes, .pesificados').hide();

                                    $('.pasomp,.pasotf,.pasodosa, .pasodosb, .pasotresa, .pasotresb, .pasotresc, .pasotresd, .pasotrespure, .pasotresfuera, .montofinal, .backs').hide();

                                    $('.backs2').show();

                                    $('.backs').click(function() {

                                        if (i === 1) {

                                            $('.usedes, .pesificados').hide();

                                            $('input[name=pais], input[name=formapago]').prop('checked', false);

                                            $('.pasomp,.pasotf,.pasouno, .pasodosa, .pasodosb, .pasotresa, .pasotresb, .pasotresc, .pasotresd, .pasotrespure, .pasotresfuera, .montofinal, .backs').hide();

                                            $('.pasouno').show();

                                            $('.backs2').show();

                                        } else if (i === 2) {

                                            $('input[name=pais], input[name=formapago]').prop('checked', false);

                                            $('.pasomp,.pasotf,.pasodosa, .pasodosb, .pasotresa, .pasotresb, .pasotresc, .pasotresd, .pasotrespure, .pasotresfuera, .montofinal, .backs').hide();

                                            $('.backs, .pasodosa').show();

                                            $('.backs2').hide();

                                            i = 1;

                                        } else if (i === 3) {

                                            $('input[name=pais], input[name=formapago]').prop('checked', false);

                                            $('.pasomp,.pasotf,.pasodosa, .pasodosb, .pasotresa, .pasotresb, .pasotresc, .pasotresd, .pasotrespure, .pasotresfuera, .montofinal, .backs').hide();

                                            $('.backs, .pasodosb').show();

                                            $('.backs2').hide();

                                            i = 1;

                                        } else if (i === 4) {

                                            $('input[name=pais], input[name=formapago]').prop('checked', false);

                                            $('.pasomp,.pasotf,.pasodosa, .pasodosb, .pasotresa, .pasotresb, .pasotresc, .pasotresd, .pasotrespure, .pasotresfuera, .montofinal, .backs').hide();

                                            $('.backs, .pasodosa').show();

                                            $('.backs2').hide();

                                            i = 1;

                                        }

                                    });

                                    $('.pasouno input[type=radio][name=pais]').change(function() {

                                        i = 1;

                                        if (this.value === 'argentina') {
                                            document.querySelector("#totalTemas").innerHTML = `Total: $${totalP}`
                                            $('.pasouno').hide();

                                            $('.pasodosa').fadeTo(500, 1, function() {

                                                $('.pesificados').show();

                                                $('.backs').show();

                                                $('.pasodosa').show();

                                                $('.backs2').hide();

                                            });

                                        } else if (this.value === 'otro') {


                                            document.querySelector("#totalTemas").innerHTML = `Total: ${total} USD`


                                            $('.pasouno').hide();

                                            $('.pasodosb').fadeTo(500, 1, function() {

                                                $('.usedes').show();

                                                $('.backs').show();

                                                $('.pasodosb').show();

                                                $('.backs2').hide();

                                            });

                                        }

                                    });

                                    $('input[type=radio][name=formapago]').change(function() {

                                        if (this.value === '1') {

                                            i = 2;

                                            $('.pasodosa, .pasodosb').hide();

                                            $('.pasotresa').fadeTo(500, 1, function() {

                                                $('.backs, .pasotresa').show();

                                                $('.pasotresb').fadeTo(500, 1, function() {

                                                    $('.backs, .pasotresb').show();

                                                    $('.pasotresc').fadeTo(500, 1, function() {

                                                        $('.backs, .pasotresb').show();

                                                        $('.pasotrespure').fadeTo(500, 1, function() {

                                                            $('.backs, .pasotrespure').show();

                                                            $(".tarjetin").prop("required", "required");

                                                        });

                                                    });

                                                });

                                            });

                                        } else if (this.value === '2') {

                                            i = 2;

                                            $('.pasodosa, .pasodosb').hide();

                                            $('.pasotresb').fadeTo(500, 1, function() {

                                                $('.backs, .pasotresb').show();

                                                $('.pasotrespure').fadeTo(500, 1, function() {

                                                    $('.backs, .pasotrespure').show();

                                                });

                                            });

                                        } else if (this.value === '3') {

                                            i = 3;

                                            $('.pasodosa, .pasodosb').hide();

                                            $('.pasotresfuera').fadeTo(500, 1, function() {

                                                $('.backs, .pasotresfuera').show();

                                            });

                                        } else if (this.value === '4') {

                                            i = 3;

                                            $('.pasodosa, .pasodosb').hide();

                                            $('.pasotresb').fadeTo(500, 1, function() {

                                                $('.pasotresb').show();

                                                $('.pasotrespure').fadeTo(500, 1, function() {

                                                    $('.pasotrespure').show();

                                                });

                                            });

                                        } else if (this.value === '6') {

                                            i = 4;

                                            //transferencia bancaria

                                            $('.pasotf').show();

                                            $('.pasomp').hide();

                                            $('.pasodosa, .pasodosb').hide();

                                        } else if (this.value === '7') {

                                            i = 4;

                                            //mercadopago

                                            $('.pasomp').show();

                                            $('.pasodosa, .pasodosb').hide();

                                            $('.pasotf').hide();



                                        }

                                    });

                                    $("#cuotas").change(function() {

                                        var str = "";

                                        $("select option:selected").each(function() {

                                            str += $(this).text();

                                            $('.montofinal').show();

                                        });

                                        var montoinicial = $("#montoinicial").val();

                                        <?php

                                        $Cuoterio = substr($Cuoterio, 0, -1);

                                        //Cuoterio son las cuotas que no tienen interes.												

                                        echo 'var cuotasininteres = "' . $Cuoterio . '";';

                                        echo 'var cuotasconinteres = "1,2,24";';

                                        ?>

                                        var sinint = cuotasininteres.split(',');

                                        //alert (sinint);

                                        //Hardcoding 1 - 24

                                        var conint = cuotasconinteres.split(',');

                                        for (var i = 0; i < 24; i++) {

                                            if (str == sinint[i]) {

                                                var finalmonto = montoinicial / str;

                                                var finalmontorecor = parseFloat(finalmonto).toFixed(2);

                                                $("#montofinal").val(finalmontorecor);

                                                //alert(finalmontorecor);

                                            } else if (str == 1 || str == 2 || str == 24) {

                                                var finalmontoCI = montoinicial / str;

                                                console.log(finalmontoCI);

                                                $("#montofinal").val(finalmontoCI);

                                                /*if(str == 4 || str == 5 || str == 7 || str == 8 || str == 9){    

                                                	var finalmontoCI = montoinicial/str;

                                                	finalmontoCI = finalmontoCI(finalmontoCI*);

                                                	$("#montofinal").val(finalmontoCI);

                                                }*/

                                            }

                                        }

                                    });

                                    $("#formWU").submit(function(e) {

                                        var emailuno = $(".emailuno").val();

                                        var emaildos = $(".emaildos").val();

                                        if (emailuno !== emaildos) {

                                            e.preventDefault();

                                            $("#alertaemail").text("Los emails ingresados no coinciden, por favor revise los datos completados.");

                                            $("#alertaemail").addClass("alert alert-danger");

                                        } else {

                                        }

                                        //resto c&oacute;digo   

                                    });



                                    $("#FormTB").submit(function(e) {

                                        var emailunotb = $(".emailunotb").val();
                                        var emaildostb = $(".emaildostb").val();
                                        if (emailunotb !== emaildostb) {
                                            e.preventDefault();
                                            $("#alertaemail").text("Los emails ingresados no coinciden, por favor revise los datos completados.");
                                            $("#alertaemail").addClass("alert alert-danger");
                                        } else {}
                                        //resto c&oacute;digo   
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">

                    <br />

                    <div class="alert alert-warning">

                        <b>&#191;Te olvidaste alguna pista? &#161;Puedes seguir agregando!</b><br /><br />

                        <a href="pistas_de_musica_pistas_de_karaoke.php" class="btn btn-warning">Entr&aacute; al c&aacute;talogo</a>

                    </div>
                    <?php
                    include "actions/carrito_end.php";
                    //include "dev_carrito.end.php";

                    ?>

                </div>

            </div>

        </div>

    </div>

    <br /><br />

    </div>







    <?php include "assets/inc/inc_pie.php"; ?>



    <script type="text/javascript">
        var pageTracker = _gat._getTracker("UA-2525189-3");

        pageTracker._initData();

        pageTracker._trackPageview();
    </script>

    <script>
        const carrito = JSON.parse(sessionStorage.getItem("carrito"))
        // let carrito = JSON.parse(sessionStorage.getItem("carrito"))
        // let textArea = document.querySelector(".form-control")
        // for (let i = 0; i < carrito.length; i++) {
        //     textArea.value += `${carrito[i].nombre}[${carrito[i].tonos}], `
        // }

        document.querySelector(".FormMP").addEventListener("submit", (e) => {
            e.preventDefault()

            const data = Object.fromEntries(
                new FormData(e.target)
            );
            const response = {
                data: data,
                carrito: carrito
            }
            fetch("./compranew1.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(response)
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    sessionStorage.removeItem('carrito');
                    setTimeout(() => {
                        window.location.href = `${data}`
                    }, 1000);
                })
        })

        document.querySelector(".FormTB").addEventListener("submit", (e) => {
            e.preventDefault();
            const data = Object.fromEntries(
                new FormData(e.target)
            );
            const response = {
                data: data,
                carrito: carrito
            }
            fetch("./compratf.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(response)
                })
                .then(response => response.json())
                .then(data => {
                    sessionStorage.removeItem('carrito');
                    setTimeout(() => {
                        window.location.href = `${data}`
                    }, 800);
                })
        })
        let productos_input = document.querySelector(".productos_input")
        let total = 0;
        let totalP = 0;
        for (let i = 0; i < carrito.length; i++) {
            productos_input.innerHTML += `
            <input type="hidden" name="c_prod_${i+1}" value="${i},1">
            <input type="hidden" name="c_name_${i+1}" value="${carrito[i].nombre} [${carrito[i].tonos}] (${carrito[i].nombre_artista})">
            <input type="hidden" name="c_description_${i+1}" value="+">
            <input type="hidden" name="c_price_${i+1}" value="${carrito[i].internacional}.00">
            `
            total += parseInt(carrito[i].internacional)
            totalP += parseInt(carrito[i].precio)
        }
        document.querySelector("#total").value = `${total}.00`
        if (carrito.length <= 2) {
            for (let i = 0; i < carrito.length; i++) {
                carrito[i].precio = Math.ceil(parseInt(carrito[i].precio) * 1.17)
                tottal += parseInt(carrito[i].precio)
            }
            document.querySelector('#totalTemas').innerHTML = `Total: $${tottal}`
            document.querySelector('#totalCarrito').innerHTML = `${tottal}`
        }
        // document.querySelector("#totalTemas").innerHTML = `Total: $${totalP}`
    </script>

    </body>

</html>