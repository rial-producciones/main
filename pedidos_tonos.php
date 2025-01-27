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

        .alerta {
            position: fixed;
            top: 10px;
            left: 50%;
            z-index: 0;
            width: 95vw;
            transform: translateX(-50%);
            border-radius: 12px;
            padding: 10px;
            box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 1px 3px 5px 0px rgba(0, 0, 0, 0.19);
        }

        .show {
            z-index: 9999;
        }

        #mensaje {
            font-size: 15px;
        }

        textarea {
            resize: none;
        }
    </style>

    <div class="contenidos-desseccion demostraciones otros-rubros">
        <div class="alerta">
            <p id="mensaje" class="text-white"></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-11 col-sm-11 col-md-6 m-auto">
                    <br>
                    <h2 class="text-center text-dark">LISTA DE DEMOS A SOLICITAR</h2>
                    <div id="demos" class="d-flex flex-column align-items-center mt-4">
                        <div class="d-flex flex-column align-items-end align-self-end">
                            <p class="d-flex justify-content-end mt-4" style="font-size: 12px;">¿Con Coros?</p>
                            <div class="w-100 d-flex flex-row justify-content-center align-items-center">
                                <p style="font-size: 12px;margin: 0 6px;">No</p>
                                <p style="font-size: 12px;margin: 0 6px;">Si</p>
                            </div>
                        </div>
                        <div class="lista-pedidos p-2 w-100">

                        </div>
                        <textarea name="observacion" id="comentario" class="form-control w-100 observacion" rows="6" placeholder="Comentario (opcional)"></textarea>
                        <div class="buttons-pedidos d-flex flex-row justify-content-center align-items-center">
                            <a href="./otros-rubros.php" style="margin:15px 5px;" class="btn btn-primary">Ver más Demos</a>
                            <button onclick="pedirTonos()" id="btn-wpp" style="display: flex;justify-content:center;align-items:center;margin:15px 5px;" class="btn btn-success"><img height="25" style="margin-right: 5px;" src="./nuevo/assets/img/flags/whatsapp.png" alt=""> Pedir Demos</button>
                        </div>
                    </div>

                    <h2><br>
                        Tiempo de Entrega: m&iacute;nimo 15 minutos - m&aacute;ximo 24 hs.<br>
                    </h2>
                    <p style="font-size: 16px;" class="text-center">
                        Los demos ser&aacute;n enviados en el <b>tono original</b> del int&eacute;rprete para
                        que conozca la versi&oacute;n
                        ( No se env&iacute;an en otras tonalidades ).<br>
                        <br>
                        Con su compra, las Pistas ser&aacute;n enviadas al tono que desee.
                    </p>
                    <br>

                </div>
            </div>
        </div>
    </div>
    <div>
    </div>
    <p>&nbsp;</p>
    <?php include "nuevo/assets/inc/inc_pie.php"; ?>
    <script>
        const url = window.location.href;
        const urlObj = new URL(url);
        const params = new URLSearchParams(urlObj.search);

        const id = params.get('id');
        const artista = params.get('artista');
        const tema = params.get('tema');
        const agregado = params.get('agregado');

        let pedidos = JSON.parse(sessionStorage.getItem("pedidos"))

        if (pedidos.length === 0 && agregado === 'true') {
            document.querySelector("#demos").innerHTML = `
            <p style="font-size: 15px;margin:10px auto;">No hay demos en su lista</p>
            <a href="https://rialproducciones.com/otros-rubros.php" class="btn btn-primary">Ver más Demos</a>
            `
        }
        if (id && artista && tema) {

            const cancion = {
                id: id,
                artista: artista,
                tema: tema
            }
            if (pedidos) {
                const arrPedidos = pedidos;

                const pedidoRepetido = arrPedidos.filter((pedido) => pedido.id === cancion.id);
                if (pedidoRepetido.length === 0 && agregado === 'false') {
                    params.set('agregado', 'true');
                    urlObj.search = params.toString();
                    window.history.pushState({}, '', urlObj);
                    arrPedidos.push(cancion);
                    sessionStorage.setItem("pedidos", JSON.stringify(arrPedidos))
                }

            } else {
                const arrPedidos = [];
                arrPedidos.push(cancion)
                sessionStorage.setItem("pedidos", JSON.stringify(arrPedidos))
            }

            const listaPedidos = document.querySelector(".lista-pedidos")
            pedidos = JSON.parse(sessionStorage.getItem("pedidos"))

            pedidos.forEach((pedido, index) => {

                listaPedidos.innerHTML += `
                <div class="item-pedido d-flex flex-row justify-content-between align-items-center mt-2">
                    <p style="width:70%;font-size:14px;margin-right:15px;">${pedido.artista} - ${pedido.tema}</p>
                    <button class="btn btn-danger mx-4" type="button" onclick="eliminarPedido(${index}, ${pedido.id})"><i class="bi bi-trash-fill"></i></button>
                    <div class="d-flex justify-content-center align-center" style="width:10%;">
                        <input type="radio" style="margin:0 5px" class="con-coro-${pedido.id}" name="coros_${pedido.id}" id="coro_${pedido.id}" value="Sin Coros" checked />
                        <input type="radio" style="margin:0 5px" class="con-coro-${pedido.id}" name="coros_${pedido.id}" id="coro_${pedido.id}" value="Con Coros" />
                    </div>
                </div>
                `
            })
        }


        const pedirTonos = () => {
            let pedidos = JSON.parse(sessionStorage.getItem("pedidos"))

            const comentarios = document.querySelector("#comentario")
            let pedidoString = "";

            pedidos.forEach((pedido, index) => {

                let coros = document.querySelectorAll(`.con-coro-${pedido.id}`)

                coros.forEach((radio) => {
                    if (radio.checked) {
                        pedidoString += `${pedido.tema.replaceAll(" ", "%20")}%20-%20${pedido.artista.replaceAll(" ", "%20")}(${radio.value})%2C`
                    }
                });



            })


            window.open(`https://api.whatsapp.com/send/?phone=%2B5491150944545&text=Hola%21%20Quisiera%20solicitar%20las%20siguientes%20Demos%3A%0A${pedidoString}%0A%0AObservacion:%20${comentarios.value}`, '_blank');
        }
        const eliminarPedido = (index, idArtista) => {
            const pedidos = JSON.parse(sessionStorage.getItem("pedidos"))
            console.log(index, idArtista);
            console.log(pedidos);
            const filtrarPedidos = pedidos.filter((pedido) => pedido.id !== String(idArtista))
            console.log(filtrarPedidos);
            sessionStorage.setItem("pedidos", JSON.stringify(filtrarPedidos))
            window.location.reload()
        }
    </script>

    <script>
        var pageTracker = _gat._getTracker("UA-2525189-2");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>
    </body>

</html>