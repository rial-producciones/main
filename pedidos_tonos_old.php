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
    </style>
    <div class="contenidos-desseccion demostraciones otros-rubros">
        <div class="alerta">
            <p id="mensaje" class="text-white"></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-11 col-sm-11 col-md-6 m-auto">
                    <br>
                    <h2 class="text-center">SOLICITUD DE DEMOS GRATIS</h2>
                    <form id="form-tonos" class="form-tonos center" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre" class="text-start">Nombre y Apellido</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]{1,40}" id="nombre" placeholder="Su nombre y apellido" required />
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-start">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Su email" required />
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="text-start">Teléfono</label>
                            <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Su teléfono" required />
                        </div>
                        <div class="form-group">
                            <label for="pais" class="text-start">País de residencia</label>
                            <input type="text" name="pais" id="pais" class="form-control" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]{1,40}" id="pais" placeholder="Su país de residencia" required />
                        </div>
                        <div class="form-group d-flex flex-row">
                            <input type="radio" name="coro" class="mr-1" id="coro" placeholder="Con coros" value="Con Coros" required /> Con Coros
                            <input type="radio" name="coro" class="ml-3 mr-1" id="coro" placeholder="Sin coros" value="Sin Coros" required /> Sin Coros
                        </div>
                        <div class="form-group">
                            <label for="comentarios" class="text-start">Comentarios</label>
                            <textarea class="form-control" name="comentarios" id="comentarios" rows="3" placeholder="Comentario (opcional)" onkeypress="return ((event.charCode >= 32 && event.charCode <= 122) || (event.charCode == 13) ||(event.charCode == 130) || (event.charCode == 144) || (event.charCode == 181) || (event.charCode == 224) || (event.charCode == 233) || (event.charCode >= 160 && event.charCode <= 165 ) || (event.charCode == 32) ) " required> </textarea>
                        </div>

                        <button type="submit" class="btn btn-danger">Enviar Solicitud</button>

                    </form>
                    <h2><br>
                        Tiempo de Entrega: m&iacute;nimo 15 minutos - m&aacute;ximo 24 hs.<br>
                        <br>
                    </h2>
                    <p style="font-size: 16px;" class="text-center">
                        Los demos ser&aacute;n enviados en el <b>tono original</b> del int&eacute;rprete para
                        que conozca la versi&oacute;n
                        ( No se env&iacute;an en otras tonalidades ).<br>
                        <br>
                        Con su compra, las Pistas ser&aacute;n enviadas al tono que desee.
                    </p>
                    <br>
                    <p style="font-size:16px">DEMOS SELECCIONADOS (No deje de consultar en el recuadro de Comentarios por las pistas que no encuentre):</p>
                    <div class="lista-pedidos mt-4">

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
        const formPistas = document.querySelector("#form-tonos")
        const url = window.location.href;

        const urlObj = new URL(url);


        const params = new URLSearchParams(urlObj.search);


        const id = params.get('id');
        const artista = params.get('artista');
        const tema = params.get('tema');

        if (id && artista && tema) {
            let pedidos = JSON.parse(sessionStorage.getItem("pedidos"))
            const cancion = {
                id: id,
                artista: artista,
                tema: tema
            }
            if (pedidos) {
                console.log(pedidos);
                const arrPedidos = pedidos;

                const pedidoRepetido = arrPedidos.filter((pedido) => pedido.id === cancion.id);
                if (pedidoRepetido.length === 0) {
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
                <div class="item-pedido d-flex flex-row align-items-center mt-2">
                    <p style="font-size:14px;margin-right:15px;">${pedido.artista} - ${pedido.tema}</p>
                    <button class="btn btn-danger" type="button" onclick="eliminarPedido(${index}, ${pedido.id})">Eliminar</button>
                </div>
                `
            })
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



        formPistas.addEventListener("submit", (e) => {
            e.preventDefault()
            const nombre = document.querySelector("#nombre").value
            const email = document.querySelector("#email").value
            const telefono = document.querySelector("#telefono").value
            const pais = document.querySelector("#pais").value
            const coro = document.querySelector('input[name="coro"]:checked').value
            const comentarios = document.querySelector("#comentarios").value
            const pedidos = JSON.parse(sessionStorage.getItem("pedidos"))
            const form = {
                nombre: nombre,
                email: email,
                telefono: telefono,
                pais: pais,
                coro: coro,
                comentarios: comentarios,
                pedidos: pedidos
            }

            fetch("./realizar_pedido.php", {
                method: "POST",
                body: JSON.stringify(form)
            }).then(res => res.json()).then(data => {
                document.querySelector("#mensaje").innerHTML = data.message
                if (data.status === 200) {
                    document.querySelector(".alerta").classList.add("bg-success")
                    document.querySelector(".alerta").classList.add("show")
                    setTimeout(() => {
                        document.querySelector(".alerta").classList.remove("bg-success")

                    }, 2500);
                } else {
                    document.querySelector(".alerta").classList.add("bg-danger")
                    document.querySelector(".alerta").classList.add("show")
                    setTimeout(() => {
                        document.querySelector(".alerta").classList.remove("bg-danger")
                        document.querySelector(".alerta").classList.remove("show")
                    }, 2500);
                }
                setTimeout(() => {
                    document.querySelector("#mensaje").innerHTML = ""
                    window.location.reload()
                }, 2500);
            })
        })
    </script>

    <script>
        var pageTracker = _gat._getTracker("UA-2525189-2");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>
    </body>

</html>