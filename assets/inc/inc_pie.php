<style type="text/css">
    .Estilo1 {
        color: #FFFFFF
    }

    .Estilo2 {
        color: #000000
    }
</style>
<footer>

    <div class="container">

        <div class="sitemap">

            <div class="row">

                <div class="col-sm-12 col-md-4">

                    <p>

                        <a href="index.php" title="Home">Home</a><br />

                        <a href="karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;idBtn=1" title="Pistas Musicales">Pistas de Tango</a>
                    </p>

                    <p><a href="otros-rubros.php" title="Pistas Musicales">Pistas de Otros Rubros</a></p>

                    <p><a href="comocomprar.php" title="Como Comprar">Precios | C&oacute;mo Comprar | Descargar</a><br />

                        <a href="licencias.php" title="Derechos - Copyright">Legales | Licencias | Derechos | Copyright</a><br />

                        <a href="demos.php" title="Algunos Demos">Algunos Demos</a><br />

                        <br />

                    </p>

                </div>

                <div class="col-sm-12 col-md-4">

                    <p>

                        <a href="composicion_y_arreglo.php">Pistas a Pedido | Arreglos</a><br />

                        <a href="estudio-de-grabacion.php" title="31 razones para elejirnos">Estudio de Grabaci&oacute;n | Mastering</a><br />

                        <a href="jingles.php" title="Jingles">Jingles &#45 Spots Publicitarios</a><br />

                        <a href="/tango/index.php" title="Promociones">Promociones</a><br />

                    </p>

                </div>

                <div class="col-sm-12 col-md-4">

                    <p>

                        <a href="profesores_canto.php" title="Clases de Canto">Clases de Canto</a><br />

                        <a href="31_razones_para_elegirnos.php" title="31 razones para elejirnos">31 razones para elegirnos</a><br />

                        <a href="staff.php" title="Nuestro Staff">Nuestro Staff</a><br />

                        <a href="javascript:agregar()">Agregar a Favoritos</a><br />

                        <a href="contactenos.php" title="Contáctenos">Contáctenos</a>

                        <!--<a href="como_descargar_las_pistas_musicales.php" title="Como descargar su orden ?">Como descargar su orden ?</a><br/>-->

                    </p>

                </div>

            </div>

            <br />

            <hr />

        </div>

        <div class="row">

            <div class="col-sm-12 col-md-4">

                <p>
                <p class="copy"><span class="Estilo1">&copy; 1978 -</span> <?php echo date("Y"); ?>&nbsp;&nbsp;Rial Producciones<br />

                    Todos los Derechos Reservados </p>
            </div>

            <div class="col-sm-12 col-md-4 Estilo1"></div>

            <div class="col-sm-12 col-md-4">

                <span class="Estilo1">
                    <!-- <p class="pagostarjetasitemap text-center">Tarjetas hasta <?php //echo $Precios->printMaxNCuotas(); 
                                                                                    ?> cuotas.<br /> -->
                    <span class="Estilo2">..................</span>Tarjetas de Crédito, Débito, Mercado Pago</span><br />

                <img src="nuevo/assets/img/tarjetas-de-credito.jpg" class="img-fluid" alt="Aceptamos Tarjetas" width="347" height="30" /><br />
                <span class="Estilo1"><span class="Estilo2">...............</span>Tambi&eacute;n: Dep&oacute;sitos / Transferencias&nbsp;Bancarias</span>
            </div>
        </div>

    </div>

</footer>

<script src="nuevo/assets/js/lightbox.js"></script>

<?php

$textpistas = "";

$archivo_actual = basename($_SERVER['PHP_SELF']); //Regresa el nombre del archivo actual

echo '';

switch ($archivo_actual) { //Valido en que archivo estoy para generar mi CSS de selecci�n

    case " ":

        $textindex = "<div class='posi'><p>

                    ROBERTO RIAL PRODUCCIONES es una empresa dedicada exclusivamente a la música desde  1978.<br />

                    Nuestras Pistas Musicales son usadas por cantantes de todo el mundo, tanto profesionales como amateurs.<br />

                    Si quiere algo superior, si desea cantar con la mejor orquestación que haya escuchado, est&aacute; en el lugar correcto.<br />

                    Adem&aacute;s, nuestro Staff de M&uacute;sicos se encuentra a disposici&oacute;n para componer temas propios e in&eacute;ditos de todos los<br /> g&eacute;neros musicales, producciones discogr&aacute;ficas, jingles, m&uacute;sica para cine, teatro y televisi&oacute;n.

                </p></div> ";

        break;

    case "/pistas_de_musica_pistas_de_karaoke.php":

        $textpistas = "<div class='posi'><p>

                    ROBERTO RIAL PRODUCCIONES es una empresa dedicada exclusivamente a la música desde  1978.<br />

                    Nuestras Pistas Musicales son usadas por cantantes de todo el mundo, tanto profesionales como amateurs.<br />

                    Si quiere algo superior, si desea cantar con la mejor orquestaci&oacute;n que haya escuchado, est&aacute; en el lugar correcto.<br />

                    Adem&aacute;s, nuestro Staff de M&uacute;sicos se encuentra a disposici&oacute;n para componer temas propios e in&eacute;ditos de todos los<br /> g&eacute;neros musicales, producciones discogr&aacute;ficas, jingles, m&uacute;sica para cine, teatro y televisi&oacute;n.

               </p></div> ";

        break;
}

echo $textpistas;

?>

<!--

    <div class="container">

    <p>

<?php

echo $textindex;

echo $textpistasindex;

?>

<?php if ($_GET['idBtn'] == 1) { ?>

                Pistas de Tango, pistas de Tango y m�s pistas de Tangos ! Karaoke de Tango - Roberto Rial Producciones - Lider Mundial en Pistas Profesionales para Cantantes

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

        <br /><br />

    </p>

</div>

-->