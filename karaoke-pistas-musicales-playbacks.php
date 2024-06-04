<?php
// header('Content-Type: text/html; charset=UTF-8');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
session_start();
?>
<?php

function error_handler($errno, $errstr, $errfile, $errline, $errctx)
{
    //echo $errstr;
}

set_error_handler("error_handler");
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">

<head>
    <title>
        <?php if ($_GET['idBtn'] == 1) { ?>
            Pistas de Tango, pistas de Tango y más pistas de Tangos ! Karaoke de Tango - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes
        <?php } ?>
        <?php if ($_GET['idBtn'] == 2) { ?>
            Pistas de Folklore, pistas de Folklore y m�s pistas de Folklore ! Karaoke de Folklore - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes
        <?php } ?>
        <?php if ($_GET['idBtn'] == 3) { ?>
            Pistas de Opera, pistas de Opera y m�s pistas de Opera ! Karaoke de Opera - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
            <?php if ($_GET['idBtn'] == 4) { ?>
                Pistas de Comedias Musicales, pistas de Comedias Musicales y m�s pistas de Comedias Musicales ! Karaoke de Comedias Musicales - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
                <?php if ($_GET['idBtn'] == 5) { ?>
                    Pistas , pistas y m�s pistas ! Karaoke - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes<?php } ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Pistas, pistas y más pistas ! - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes" />
    <meta name="description" content="Desde 1978 produciendo Pistas Profesionales para Cantantes,con instrumentos reales y coros. Env�os a todo el mundo" />
    <meta name="keywords" content="tango,tangos,pistas,playback,karaokes profesionales,duplicaciones,cd,grabaciones,mastering,discos,compactos,logos,empresas,productora,discografica,estudio,grabacion,alta,tecnologia,mastering,avanzada,arreglos,composiciones,arte,dise�o,laminas,cd,produccion,cantantes,bandas,eventos" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="URL" content="https://www.rialproducciones.com.ar/" />
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

    <?php
    include 'nuevo/assets/inc/metadatos.php';
    include 'nuevo/assets/inc/inc_top.php';
    ?>

    <!-- HACK AL -->
    <!--<link href="site.css" rel="stylesheet" type="text/css" />
        <link href="dev_master.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>-->
    <div class="contenidos-desseccion">
        <div class="container">
            <div class="row">

                <!--inicio hack carrito-->
                <style>

                </style>

                <!--fin hack carrito-->

                <div class="col-sm-12 col-md-12">
                    <div>
                        <div class="solocel">
                            <div class="pirulo">
                                <?php include "nuevo/dev_carrito.end2.php"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="caja_buscador" id="buscador">
                                    <?php require_once('nuevo/dev_cdartesanalNEWpromo.php'); ?>
                                    <script type="text/javascript">
                                        var options_xml = {
                                            script: function(input) {
                                                return "../autocomplete/autocomplete.php?input=" + input + "&testid=" + document.getElementById('testid').value;
                                            },
                                            varname: "buscarInput"
                                        };
                                        var as_xml = new bsn.AutoSuggest('buscarInput', options_xml);
                                    </script>
                                </div>
                            </div>
                            <!--inicio hack carrito-->
                            <!--fin hack carrito-->
                            <div class="col-sm-12 col-md-6">
                                <!--<div class="row">
                                    <div class="col-sm-12 col-md-3">-->

                                <?php
                                if (!empty($_GET['id_rubro'])) {
                                ?>
                                    <!--<tr>
                                                <td width="754" height="30"><div class="logoArtesanal" id="imgArtesanal<?= $_GET['id_rubro']; ?>" ></div></td>
                                            </tr>-->
                                <?php
                                }
                                ?>

                                <?php include "dev_cdartesanalNEW.php" ?>

                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="nocel">
                                    <?php include "nuevo/dev_carrito.end.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include "nuevo/assets/inc/inc_pie.php";
    ?>
    <style>
        .pirulo {
            margin-top: 30px !important;
        }
    </style>
    <div class="container">
        <div class='posi'>
            <p>
                Pistas musicales, pistas musicales y más pistas musicales ! Más de 110.000 pistas musicales en el tono que usted desee, con instrumentos reales y coros.
                Pistas de karaoke, Playbacks, Karaoke, Bases Musicales, Pistas de Canto, Orquestaciones para Cantar, Backing Tracks
                Composición y Arreglos de temas propios, inéditos, covers.
                Jingles y Bandas sonoras para cine, radio, televisión y teatro. Producciones Musicales y Discograficas - Roberto Rial Producciones - Buenos Aires - Argentina
            </p>
        </div>
    </div>
    <br />
    <script type="text/javascript">
        var pageTracker = _gat._getTracker("UA-2525189-2");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>

    </body>

</html>