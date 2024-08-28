<div class="col-sm-12 col-md-3">
<?php
echo "<div class='nocel'>";
include "../dev_carrito.end.php";
echo "</div>";
?>
</div></div></div></div>
</div></div></div></div></div>
<footer>
    <div class="container">
        <div class="sitemap">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <p>
                        <a href="../index.php" title="Home">Home</a><br/>
                      <a href="../karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;idBtn=1" title="Pistas Musicales">Pistas de Tango</a><br/>
                        <a href="../otros-rubros.php" title="Derechos - Copyright">Pistas de Otros Rubros</a><br/>
<!--                        <a href="../demos.php" title="Demos">Demos</a><br/>
-->                        <a href="../comocomprar.php" title="Como Comprar">Precios | C&oacute;mo Comprar | Descargar </a></p>
                    <p><a href="../licencias.php" title="Como Comprar">Legales | Licencias | Derechos | Copyright</a></p>
                    <p><a href="../demos.php" title="Pistas Musicales">Algunos Demos</a></p>
                    <p><br/>
                    </p>
              </div>
          <div class="col-sm-12 col-md-4">
                    <p>
                        <a href="../composicion_y_arreglo.php">Pistas a Pedido | Arreglos</a><br/>
                        <a href="../estudio-de-grabacion.php" title="31 razones para elejirnos">Estudio de Grabacion | Mastering</a><br/>
                        <a href="../jingles.php" title="Jingles">Jingles &#45 Spots Publicitarios</a><br/>
                        <a href="../promociones.php" title="Copias de CD/DVD">Promociones</a><br/>
                        <a href="../profesores_canto.php" title="Clases de Canto">Clases de Canto</a><a href="../promociones.php" title="Promociones"></a><br/>
                    </p>
              </div>
          <div class="col-sm-12 col-md-4">
            <p><a href="../31_razones_para_elegirnos.php" title="31 razones para elejirnos">31 razones para elegirnos</a><br/>
                <a href="../staff.php" title="Nuestro Staff">Nuestro Staff</a><br/>
                <a href="javascript:agregar()">Agregar a Favoritos</a><br/>
                <a href="../contactenos.php" title="Cont&aacute;ctenos">Cont&aacute;ctenos</a>
                <!--<a href="como_descargar_las_pistas_musicales.php" title="Como descargar su orden ?">Como descargar su orden ?</a><br/>-->                   
              </p>
              </div>
            </div>
            <br/>
            <hr/>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <p>
                <p class="copy">&copy; <?php echo date("Y"); ?>&nbsp;&nbsp;Rial Producciones<br />
                    Todos los Derechos Reservados
                </p>
            </div>
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <p class="pagostarjetasitemap text-center">Tarjetas hasta <?php $Precios->printMaxNCuotas(); ?> cuotas.<br/>
                    <img src="../assets/img/tarjetas-de-credito.jpg" class="img-fluid" alt="Aceptamos Tarjetas" width="347" height="30" /><br/>
                    Tambi&eacute;n: Cajeros Autom&aacute;ticos - <br/>
                    Dep&oacute;sitos/Transferencias&nbsp;Bancarias - Westen Union</p>
            </div>
        </div>
    </div>
</footer>
<div class="container">
        <div class='posi'>
            <p>
                Pistas musicales, pistas musicales  y más pistas musicales ! Más de 110.000 pistas musicales en el tono que usted desee, con instrumentos reales y coros.
                Pistas de karaoke, Playbacks, Karaoke, Bases Musicales, Pistas de Canto, Orquestaciones para Cantar, Backing Tracks
                Composición y Arreglos de temas propios, inéditos, covers.
                Jingles y Bandas sonoras para cine, radio, televisión y teatro. Producciones Musicales y Discograficas - Roberto Rial Producciones - Buenos Aires - Argentina 
            </p>
        </div>
    </div>
    <br />
    <?php
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
    //echo $textpistas;
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

<style>
@media only screen and (min-width: 1px) and (max-width: 991px) {
	body > div.contenidos-desseccion > div > div > div > div.row > div.col-sm-12.col-md-6 > div.izquierdas > div > div.tema > span{
	font-size:13px!important;
	}
}
</style>

        </body>
</html>
