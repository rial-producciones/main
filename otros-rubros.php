<?php
// Desactivar toda notificación de error
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pistas Musicales - Karaoke - Rial Producciones</title>
    <meta charset="utf-8" />
    <meta name="title" content="Pistas Karaoke - Roberto Roberto Rial Producciones" />
    <meta name="description" content="Pistas Profesionales, Karaoke, Composiciones, Orquestaciones y Arreglos musicales de temas propios e in�ditos" />
    <meta name="keywords" content="pistas para cantar,tango,tangos,TANGO,pistas,playbacks,orquestaciones,arreglos musicales,composiciones,copias de cd,opera karaoke, pistas de opera,karaoke,midi,midis,duplicaciones de cd" />
    <meta name="URL" content="https://www.rialproducciones.com.ar/" />
    <meta name="language" content="espanol" />
    <meta name="author" content="Rial Producciones" />
    <meta name="copyright" content="Rial Producciones" />
    <meta name="robots" content="ALL" />
    <meta name="revisit-after" content="15 days" />
    <meta name="reply-to" content="rialproducciones@speedy.com.ar" />
    <meta name="document-class" content="Published" />
    <meta name="document-rights" content="Private" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="document-distribution" content="Global" />
    <meta name="document-state" content="Dynamic" />
    <!-- -->
    <script src="js/jquery-1.4.3.min.js"></script>
    <script src="SpryAssets/SpryValidationTextField.js"></script>
    <script>
        $(document).ready(function() {
            $(".tooltip1-2").mouseover(function() {
                eleOffset = $(this).offset();
                $(this).next().fadeIn("fast").css({
                    left: eleOffset.left + $(this).outerWidth(),
                    top: eleOffset.top
                });
            }).mouseout(function() {
                $(this).next().hide();
            });
        });
    </script>
    <link rel="stylesheet" href="/autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <!-- -->
    <script>
        var gaJsHost = (("https:" === document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var ver

        function mostrar(num) {
            obj = document.getElementById('c' + (num + 0));
            ver.style.display = 'none';
            obj.style.display = 'block';
            ver = obj;
        }
    </script>
    <script src="Scripts/AC_RunActiveContent.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <?php
    include 'nuevo/assets/inc/metadatos.php';
    include 'nuevo/assets/inc/inc_top.php';
    ?>
    <style type="text/css">
        .Estilo13 {
            font-size: 18px
        }

        .Estilo16 {
            color: #FF9900;
            font-style: italic;
            font-weight: bold;
            font-size: medium;
        }
    </style>
    <div class="contenidos-desseccion demostraciones otros-rubros">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h1 class="text-center titulo">PISTAS DE OTROS RUBROS</h1>
                    <h2 class="text-center subtitulo">PISTAS MUSICALES SUPERIORES</h2>
                    <p class="text-center rubros">(Pop, Rock, Folklore, Boleros, Ópera, Comedias Musicales, Jazz, Tropicales, Etc)
                    </p>
                    <p class="text-center"><a href="demos.php" target="_blank" class="Estilo16" style="color:#f00;text-decoration:underline;">ALGUNOS DEMOS: Entre aquí para escuchar la calidad de Nuestras Pistas</a></p>
                    <div class="container-rubros">
                        <?php $buscarInput = $_GET['buscarInput']; ?>
                        <div class="buscador">
                            <form class="form-inline" action="buscarCancion.php" method="post">

                                <div class="dev s dev_bus" style="margin-top:1px;">
                                    <h1 align="center">
                                        <?php
                                        if ($_GET['idBtn'] == 1) {
                                            echo 'PISTAS DE TANGO';
                                        } else {
                                            echo 'PISTAS DE OTROS RUBROS';
                                        }
                                        ?>
                                        <input type="hidden" id="testid" />
                                    </h1>
                                    <input style="display: none;" type="text" id="idBtn" name="idBtn" value="2" />
                                    <div class="input-form">
                                        <input class="form-control form-control-sm textbox text" type="text" id="buscarInput" name="buscarInput" value="" placeholder="Búsqueda por Título o Intérprete" />
                                        <button class="btn btn-danger buscar" type="submit"><img src="https://rialproducciones.com/nuevo/assets/img/iconmonstr-magnifier-4-24.png" alt="search" height="20" /></button>
                                    </div>
                                    <div class="dev dev_bus_cat" style="margin-top:15px;">
                                        <h6>BUSQUEDA ALFABETICA POR TITULO</h6>
                                        <div style="margin: 5px 0 5px 2px ;clear: both; "><a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=A&amp;idBtn=2">A</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=B&amp;idBtn=2">B</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=C&amp;idBtn=2">C</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=D&amp;idBtn=2">D</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=E&amp;idBtn=2">E</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=F&amp;idBtn=2">F</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=G&amp;idBtn=2">G</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=H&amp;idBtn=2">H</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=I&amp;idBtn=2">I</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=J&amp;idBtn=2">J</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=K&amp;idBtn=2">K</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=L&amp;idBtn=2">L</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=M&amp;idBtn=2">M</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=N&amp;idBtn=2">N</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=O&amp;idBtn=2">O</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=P&amp;idBtn=2">P</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Q&amp;idBtn=2">Q</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=R&amp;idBtn=2">R</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=S&amp;idBtn=2">S</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=T&amp;idBtn=2">T</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=U&amp;idBtn=2">U</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=V&amp;idBtn=2">V</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=W&amp;idBtn=2">W</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=X&amp;idBtn=2">X</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Y&amp;idBtn=2">Y</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Z&amp;idBtn=2">Z</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <img src="assets/img/asesores.png" alt="Imagen de Asesores" class="asesoria" usemap="#links-asesorias" />
                        <map name="links-asesorias">
                            <!-- Definición de las áreas -->
                            <area shape="rect" coords="245,95,330,140" alt="Área 1" href="https://wa.me/+5491162708485?text=Hola!%20Quisiera%20hablar%20con%20un%20asesor" target="_blank">
                            <area shape="rect" coords="245,150,330,195" alt="Área 1" href="mailto:dennis@rialproducciones.com" target="_blank">
                        </map>
                        <!-- <a href="https://wa.me/+5491162708485?text=Hola!%20Quisiera%20hablar%20con%20un%20asesor" target="_blank"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
    </div>
    <p>&nbsp;</p>
    <?php include "nuevo/assets/inc/inc_pie.php"; ?>
    <script>
        window.onload = function() {
            let emaildos = document.querySelector("#emaildos")
            emaildos.onpaste = function(e) {
                e.preventDefault();
            }
        }
    </script>

    <!-- <script>
        document.querySelector("form").addEventListener("submit", (e) => {

            e.preventDefault();

            if (document.querySelector("#emailuno").value === document.querySelector("#emaildos").value) {
                document.querySelector("#errorEmail").innerHTML = ""
                const formData = new FormData();
                const data = Object.fromEntries(
                    new FormData(e.target)
                )
                let recaptchaChecked = false
                for (const [key, value] of Object.entries(data)) {
                    formData.append(key, value);
                }
                for (const [key, value] of Object.entries(data)) {
                    if (key === "g-recaptcha-response") {
                        if (value !== "") {
                            recaptchaChecked = true
                        }
                    }
                }
                if (recaptchaChecked) {
                    fetch("send-contact-rub.php", {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector("#errorCaptcha").innerHTML = ""
                            console.log(data)
                            location.href = "compraok.php"
                        });
                } else {
                    document.querySelector("#errorCaptcha").innerHTML = "El recaptcha no fue validado"
                }
            } else {
                document.querySelector("#errorEmail").innerHTML = "Los emails no coinciden"
            }
        })
    </script> -->

    <div class="container">
        <div class='posi'>
            <p>
                Pistas musicales, pistas musicales y más pistas musicales ! Más de 110.000 pistas musicales en el tono que usted desee, con instrumentos reales y coros.



                Pistas de karaoke, Playbacks, Karaoke, Bases Musicales, Pistas de Canto, Orquestaciones para Cantar, Backing Tracks



                Composición y Arreglos de temas propios, inéditos, covers.



                Jingles y Bandas sonoras para cine, radio, televisión y teatro. Producciones Musicales y Discograficas - Roberto Rial Producciones - Buenos Aires - Argentina
            </p>
        </div>
        <br /><br />
    </div>
    <script>
        var pageTracker = _gat._getTracker("UA-2525189-2");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>
    </body>

</html>