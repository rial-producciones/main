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
    <meta charset="utf-8" />
    <meta name="title" content="Pistas, Pistas Musicales, Karaoke Profesional, Backing Tracks - Tango, Opera, Broadway, Rock, Pop, Latinos, Folklore, Infantiles, Tangos - Roberto Rial Producciones" />
    <meta name="description" content="Pistas - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes - más de 60.000 pistas de karaoke en el tono que desee. Tambi�n componen temas in�ditos." />
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
    <link href="site.css" rel="stylesheet" type="text/css" />
    <link href="master.css" type="text/css" rel="stylesheet" media="all" />
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
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h1>¡Thank you very much!</h1>
                    <div class="alert alert-success">
                        Your order have been sent correctly; we will contact you shortly.<br /><br />
                        <a class="btn btn-success" href="karaoke-playbacks-pistas-musicales.php?goto=karaoke&idBtn=1"> Back to catalog</a>
                    </div>
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

    </body>

</html>