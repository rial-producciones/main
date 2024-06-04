<?php

// Desactivar toda notificación de error
ini_set('upload_max_filesize', '16M');
ini_set("post_max_size", "650M");
error_reporting(0);

?>



<!DOCTYPE html>

<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Pistas Karaoke - Roberto Roberto Rial Producciones</title>

    <meta charset="utf-8" />

    <meta name="title" content="Pistas Karaoke - Roberto Roberto Rial Producciones" />

    <meta name="description" content="Pistas Profesionales, Karaoke, Composiciones, Orquestaciones y Arreglos musicales de temas propios e in�ditos" />

    <meta name="keywords" content="pistas para cantar,tango,tangos,TANGO,pistas,playbacks,orquestaciones,arreglos musicales,composiciones,copias de cd,opera karaoke, pistas de opera,karaoke,midi,midis,duplicaciones de cd" />

    <meta name="URL" content="http://www.rialproducciones.com.ar/nuevo/" />

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

    <script>
        var gaJsHost = (("https:" === document.location.protocol) ? "https://ssl." : "http://www.");

        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script>
        var ver

        function mostrar(num) {

            obj = document.getElementById('c' + (num + 0));

            ver.style.display = 'none';

            obj.style.display = 'block';

            ver = obj;

        }
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="nuevo/Scripts/AC_RunActiveContent.js"></script>

    <link rel="stylesheet" href="nuevo/css/style.css" type="text/css" media="screen" />

    <?php

    include 'nuevo/assets/inc/metadatos.php';

    include 'nuevo/assets/inc/inc_top.php';

    ?>

    <style type="text/css">
        .Estilo12 {
            font-size: medium
        }

        .Estilo15 {
            color: #FF0000
        }

        .Estilo17 {
            font-size: medium;
            color: #000000;
            font-weight: bold;
        }
    </style>

    <div class="contenidos-desseccion demostraciones">

        <div class="container">

            <div class="row">

                <div class="col-1"></div>

                <div class="col-10">

                    <h1 class="text-center Estilo15">&nbsp;</h1>

                    <h1 class="text-center Estilo15">CONT&Aacute;CTENOS</h1>

                    <!-- <h2 class="Estilo3 numero-telefono" style="vertical-align: middle;display:flex;align-items:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> Tel: (+54 11) 15 5094-4545
                    </h2>
                    <h2 class="Estilo3 numero-telefono">
                        <span style="vertical-align: middle;display:flex;align-items:center;">
                            <img src="https://rialproducciones.com/nuevo/assets/img/flags/whatsapp.png" height="30" alt="">
                            WhatsApp:
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=5491150944545&text=Hello" style="color: red;font-size:20px;">(+54 9 11) 5094-4545</a>
                        </span>
                        <br />
                        <span class="smalldos text-left" style="color:black;"> De Lunes a Viernes de 10am a 6pm.</span>
                    </h2> -->
                    <hr />

                    <div class="row">

                        <div class="col-sm-12 col-md-3"></div>

                        <div class="col-sm-12 col-md-6">


                            <h2 class="text-center">Completa el siguiente formulario:</h2>
                            <form class="form text-center center" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]{1,40}" id="nombre" placeholder="Su nombre y apellido" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="apellido" pattern="^[a-zA-ZÀ-ÿ0-9\u00f1\u00d1 ]{3,40}" class="form-control" id="telefono" placeholder="Su teléfono con código de área" required />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="emailuno" placeholder="Su email" required />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emaildos" placeholder="Repetir su email" autocomplete="nope" required />
                                    <p class="text-danger" style="font-size: 15px;" id="errorEmail"></p>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="pais" id="pais" required>

                                        <option value="">Seleccione su país</option>

                                        <option value="Afganistán">Afganistán</option>

                                        <option value="Albania">Albania</option>

                                        <option value="Alemania">Alemania</option>

                                        <option value="Andorra">Andorra</option>

                                        <option value="Angola">Angola</option>

                                        <option value="Anguilla">Anguilla</option>

                                        <option value="Antártida">Antártida</option>

                                        <option value="Antigua y Barbuda">Antigua y Barbuda</option>

                                        <option value="Antillas Holandesas">Antillas Holandesas</option>

                                        <option value="Arabia Saudí">Arabia Saudí</option>

                                        <option value="Argelia">Argelia</option>

                                        <option value="Argentina">Argentina</option>

                                        <option value="Armenia">Armenia</option>

                                        <option value="Aruba">Aruba</option>

                                        <option value="Australia">Australia</option>

                                        <option value="Austria">Austria</option>

                                        <option value="Azerbaiyán">Azerbaiyán</option>

                                        <option value="Bahamas">Bahamas</option>

                                        <option value="Bahrein">Bahrein</option>

                                        <option value="Bangladesh">Bangladesh</option>

                                        <option value="Barbados">Barbados</option>

                                        <option value="Bélgica">Bélgica</option>

                                        <option value="Belice">Belice</option>

                                        <option value="Benin">Benin</option>

                                        <option value="Bermudas">Bermudas</option>

                                        <option value="Bielorrusia">Bielorrusia</option>

                                        <option value="Birmania">Birmania</option>

                                        <option value="Bolivia">Bolivia</option>

                                        <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>

                                        <option value="Botswana">Botswana</option>

                                        <option value="Brasil">Brasil</option>

                                        <option value="Brunei">Brunei</option>

                                        <option value="Bulgaria">Bulgaria</option>

                                        <option value="Burkina Faso">Burkina Faso</option>

                                        <option value="Burundi">Burundi</option>

                                        <option value="Bután">Bután</option>

                                        <option value="Cabo Verde">Cabo Verde</option>

                                        <option value="Camboya">Camboya</option>

                                        <option value="Camerún">Camerún</option>

                                        <option value="Canadá">Canadá</option>

                                        <option value="Chad">Chad</option>

                                        <option value="Chile">Chile</option>

                                        <option value="China">China</option>

                                        <option value="Chipre">Chipre</option>

                                        <option value="Ciudad del Vaticano (Santa Sede)">Ciudad del Vaticano (Santa Sede)</option>

                                        <option value="Colombia">Colombia</option>

                                        <option value="Comores">Comores</option>

                                        <option value="Congo">Congo</option>

                                        <option value="Congo, República Democrática del">Congo, República Democrática del</option>

                                        <option value="Corea">Corea</option>

                                        <option value="Corea del Norte">Corea del Norte</option>

                                        <option value="Costa de Marfíl">Costa de Marfíl</option>

                                        <option value="Costa Rica">Costa Rica</option>

                                        <option value="Croacia (Hrvatska)">Croacia (Hrvatska)</option>

                                        <option value="Cuba">Cuba</option>

                                        <option value="Dinamarca">Dinamarca</option>

                                        <option value="Djibouti">Djibouti</option>

                                        <option value="Dominica">Dominica</option>

                                        <option value="Ecuador">Ecuador</option>

                                        <option value="Egipto">Egipto</option>

                                        <option value="El Salvador">El Salvador</option>

                                        <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>

                                        <option value="Eritrea">Eritrea</option>

                                        <option value="Eslovenia">Eslovenia</option>

                                        <option value="España">España</option>

                                        <option value="Estados Unidos">Estados Unidos</option>

                                        <option value="Estonia">Estonia</option>

                                        <option value="Etiopía">Etiopía</option>

                                        <option value="Fiji">Fiji</option>

                                        <option value="Filipinas">Filipinas</option>

                                        <option value="Finlandia">Finlandia</option>

                                        <option value="Francia">Francia</option>

                                        <option value="Gabón">Gabón</option>

                                        <option value="Gambia">Gambia</option>

                                        <option value="Georgia">Georgia</option>

                                        <option value="Ghana">Ghana</option>

                                        <option value="Gibraltar">Gibraltar</option>

                                        <option value="Granada">Granada</option>

                                        <option value="Grecia">Grecia</option>

                                        <option value="Groenlandia">Groenlandia</option>

                                        <option value="Guadalupe">Guadalupe</option>

                                        <option value="Guam">Guam</option>

                                        <option value="Guatemala">Guatemala</option>

                                        <option value="Guayana">Guayana</option>

                                        <option value="Guayana Francesa">Guayana Francesa</option>

                                        <option value="Guinea">Guinea</option>

                                        <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>

                                        <option value="Guinea-Bissau">Guinea-Bissau</option>

                                        <option value="Haití">Haití</option>

                                        <option value="Honduras">Honduras</option>

                                        <option value="Hungría">Hungría</option>

                                        <option value="India">India</option>

                                        <option value="Indonesia">Indonesia</option>

                                        <option value="Irak">Irak</option>

                                        <option value="Irán">Irán</option>

                                        <option value="Irlanda">Irlanda</option>

                                        <option value="Isla Bouvet">Isla Bouvet</option>

                                        <option value="Isla de Christmas">Isla de Christmas</option>

                                        <option value="Islandia">Islandia</option>

                                        <option value="Islas Caimán">Islas Caimán</option>

                                        <option value="Islas Cook">Islas Cook</option>

                                        <option value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>

                                        <option value="Islas Faroe">Islas Faroe</option>

                                        <option value="Islas Heard y McDonald">Islas Heard y McDonald</option>

                                        <option value="Islas Malvinas">Islas Malvinas</option>

                                        <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>

                                        <option value="Islas Marshall">Islas Marshall</option>

                                        <option value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>

                                        <option value="Islas Palau">Islas Palau</option>

                                        <option value="Islas Salomón">Islas Salomón</option>

                                        <option value="Islas Svalbard y Jan Mayen">Islas Svalbard y Jan Mayen</option>

                                        <option value="Islas Tokelau">Islas Tokelau</option>

                                        <option value="Islas Turks y Caicos">Islas Turks y Caicos</option>

                                        <option value="Islas Vírgenes (EEUU)">Islas Vírgenes (EEUU)</option>

                                        <option value="Islas Vírgenes (Reino Unido)">Islas Vírgenes (Reino Unido)</option>

                                        <option value="Islas Wallis y Futuna">Islas Wallis y Futuna</option>

                                        <option value="Israel">Israel</option>

                                        <option value="Italia">Italia</option>

                                        <option value="Jamaica">Jamaica</option>

                                        <option value="Japón">Japón</option>

                                        <option value="Jordania">Jordania</option>

                                        <option value="Kazajistán">Kazajistán</option>

                                        <option value="Kenia">Kenia</option>

                                        <option value="Kirguizistán">Kirguizistán</option>

                                        <option value="Kiribati">Kiribati</option>

                                        <option value="Kuwait">Kuwait</option>

                                        <option value="Laos">Laos</option>

                                        <option value="Lesotho">Lesotho</option>

                                        <option value="Letonia">Letonia</option>

                                        <option value="Líbano">Líbano</option>

                                        <option value="Liberia">Liberia</option>

                                        <option value="Libia">Libia</option>

                                        <option value="Liechtenstein">Liechtenstein</option>

                                        <option value="Lituania">Lituania</option>

                                        <option value="Luxemburgo">Luxemburgo</option>

                                        <option value="Macedonia, Ex-República Yugoslava de">Macedonia, Ex-República Yugoslava de</option>

                                        <option value="Madagascar">Madagascar</option>

                                        <option value="Malasia">Malasia</option>

                                        <option value="Malawi">Malawi</option>

                                        <option value="Maldivas">Maldivas</option>

                                        <option value="Malí">Malí</option>

                                        <option value="Malta">Malta</option>

                                        <option value="Marruecos">Marruecos</option>

                                        <option value="Martinica">Martinica</option>

                                        <option value="Mauricio">Mauricio</option>

                                        <option value="Mauritania">Mauritania</option>

                                        <option value="Mayotte">Mayotte</option>

                                        <option value="México">México</option>

                                        <option value="Micronesia">Micronesia</option>

                                        <option value="Moldavia">Moldavia</option>

                                        <option value="Mónaco">Mónaco</option>

                                        <option value="Mongolia">Mongolia</option>

                                        <option value="Montserrat">Montserrat</option>

                                        <option value="Mozambique">Mozambique</option>

                                        <option value="Namibia">Namibia</option>

                                        <option value="Nauru">Nauru</option>

                                        <option value="Nepal">Nepal</option>

                                        <option value="Nicaragua">Nicaragua</option>

                                        <option value="Níger">Níger</option>

                                        <option value="Nigeria">Nigeria</option>

                                        <option value="Niue">Niue</option>

                                        <option value="Norfolk">Norfolk</option>

                                        <option value="Noruega">Noruega</option>

                                        <option value="Nueva Caledonia">Nueva Caledonia</option>

                                        <option value="Nueva Zelanda">Nueva Zelanda</option>

                                        <option value="Omán">Omán</option>

                                        <option value="Países Bajos">Países Bajos</option>

                                        <option value="Panamá">Panamá</option>

                                        <option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>

                                        <option value="Paquistán">Paquistán</option>

                                        <option value="Paraguay">Paraguay</option>

                                        <option value="Perú">Perú</option>

                                        <option value="Pitcairn">Pitcairn</option>

                                        <option value="Polinesia Francesa">Polinesia Francesa</option>

                                        <option value="Polonia">Polonia</option>

                                        <option value="Portugal">Portugal</option>

                                        <option value="Puerto Rico">Puerto Rico</option>

                                        <option value="Qatar">Qatar</option>

                                        <option value="Reino Unido">Reino Unido</option>

                                        <option value="República Centroafricana">República Centroafricana</option>

                                        <option value="República Checa">República Checa</option>

                                        <option value="República de Sudáfrica">República de Sudáfrica</option>

                                        <option value="República Dominicana">República Dominicana</option>

                                        <option value="República Eslovaca">República Eslovaca</option>

                                        <option value="Reunión">Reunión</option>

                                        <option value="Ruanda">Ruanda</option>

                                        <option value="Rumania">Rumania</option>

                                        <option value="Rusia">Rusia</option>

                                        <option value="Sahara Occidental">Sahara Occidental</option>

                                        <option value="KSaint Kitts y NevisN">Saint Kitts y Nevis</option>

                                        <option value="Samoa">Samoa</option>

                                        <option value="Samoa Americana">Samoa Americana</option>

                                        <option value="San Marino">San Marino</option>

                                        <option value="San Vicente y Granadinas">San Vicente y Granadinas</option>

                                        <option value="Santa Helena">Santa Helena</option>

                                        <option value="Santa Lucía">Santa Lucía</option>

                                        <option value="STSanto Tomé y Príncipe">Santo Tomé y Príncipe</option>

                                        <option value="Senegal">Senegal</option>

                                        <option value="Seychelles">Seychelles</option>

                                        <option value="Sierra Leona">Sierra Leona</option>

                                        <option value="Singapur">Singapur</option>

                                        <option value="Siria">Siria</option>

                                        <option value="Somalia">Somalia</option>

                                        <option value="Sri Lanka">Sri Lanka</option>

                                        <option value="St Pierre y Miquelon">St Pierre y Miquelon</option>

                                        <option value="Suazilandia">Suazilandia</option>

                                        <option value="Sudán">Sudán</option>

                                        <option value="Suecia">Suecia</option>

                                        <option value="Suiza">Suiza</option>

                                        <option value="Surinam">Surinam</option>

                                        <option value="Tailandia">Tailandia</option>

                                        <option value="Taiwán">Taiwán</option>

                                        <option value="Tanzania">Tanzania</option>

                                        <option value="Tayikistán">Tayikistán</option>

                                        <option value="Territorios franceses del Sur">Territorios franceses del Sur</option>

                                        <option value="Timor Oriental">Timor Oriental</option>

                                        <option value="Togo">Togo</option>

                                        <option value="Tonga">Tonga</option>

                                        <option value="Trinidad y Tobago">Trinidad y Tobago</option>

                                        <option value="Túnez">Túnez</option>

                                        <option value="Turkmenistán">Turkmenistán</option>

                                        <option value="Turquía">Turquía</option>

                                        <option value="Tuvalu">Tuvalu</option>

                                        <option value="Ucrania">Ucrania</option>

                                        <option value="Uganda">Uganda</option>

                                        <option value="Uruguay">Uruguay</option>

                                        <option value="Uzbekistán">Uzbekistán</option>

                                        <option value="Vanuatu">Vanuatu</option>

                                        <option value="Venezuela">Venezuela</option>

                                        <option value="Vietnam">Vietnam</option>

                                        <option value="Yemen">Yemen</option>

                                        <option value="Yugoslavia">Yugoslavia</option>

                                        <option value="Zambia">Zambia</option>

                                        <option value="Zimbabue">Zimbabue</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Optional Message" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 130) || (event.charCode == 144) || (event.charCode == 181) || (event.charCode == 224) || (event.charCode == 233) || (event.charCode >= 160 && event.charCode <= 165 ) || (event.charCode == 32) ) " required> </textarea> -->
                                    <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Optional Message" onkeypress="return ((event.charCode >= 32 && event.charCode <= 122) || (event.charCode == 13) ||(event.charCode == 130) || (event.charCode == 144) || (event.charCode == 181) || (event.charCode == 224) || (event.charCode == 233) || (event.charCode >= 160 && event.charCode <= 165 ) || (event.charCode == 32) ) " required> </textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleFormControlFile1">MP3 - Imágenes</label>
                                    <input type="file" class="form-control-file" name="imagen[]" id="inpFile" multiple>
                                    <small>Limite: 7mb</small>
                                </div> -->

                                <div class="form-group d-flex flex-column">
                                    <div class="g-recaptcha mx-auto" data-sitekey="6Ldry_kjAAAAAAajtp0RN4x7wTjdUJLgOLWi8Aor"></div>
                                    <p class="text-danger" style="font-size: 15px;" id="errorCaptcha"></p>
                                </div>

                                <button type="submit" class="btn btn-danger">Enviar </button>

                            </form>
                            <!-- <form class="form" action="send-contact.php" method='POST'>

                                <p class="Estilo17" style="vertical-align: middle;display:flex;align-items:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg> Teléfono:
                                </p>

                                <h4 class="Estilo12"><a style="color:black;" href="tel:5491150944545">(+54 11) 15 5094-4545</a></h4>

                                <p class="Estilo12">&nbsp;</p>

                                <p class="Estilo17" style="vertical-align: middle;display:flex;align-items:center;"> <img src="../nuevo/assets/img/flags/whatsapp.png" height="30" alt=""> WhatsApp: </p>

                                <h4 class="Estilo12"><a style="color:black;" target="_blank" href="https://api.whatsapp.com/send?phone=5491150944545&text=Hola">(+54 9 11) 5094-4545</a></h4>

                                <p class="Estilo12">&nbsp;</p>

                                <h4 class="Estilo12"><br />

                                    <span class="smalldos">Horario: de Lunes a Viernes de 10 a 19 hs.</span>
                                </h4>

                            </form> -->

                            <script>
                                $("form").submit(function(e) {

                                    var emailuno = $("#emailuno").val();

                                    var emaildos = $("#emaildos").val();

                                    if (emailuno !== emaildos) {

                                        e.preventDefault();

                                        $("#alertaemail").text("Los emails ingresados no coinciden, por favor revise los datos completados.");

                                        $("#alertaemail").addClass("alert alert-danger");

                                    } else {

                                    }

                                    //resto código   

                                });
                            </script>

                        </div>
                        <div class="col-sm-12 col-md-3"></div>

                        <!-- <div class="col-sm-12 col-md-7">
                            <div id="contenidos" class="contactenos contenidoss">
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-1"></div>

            </div>

        </div>

    </div>

    <div>

    </div>

    <p>&nbsp;</p>

    <?php include "nuevo/assets/inc/inc_pie.php"; ?>

    <script>
        window.onload = function() {
            let repetiremail = document.querySelector("#emaildos")
            repetiremail.onpaste = function(e) {
                e.preventDefault();
            }
        }
    </script>

    <script>
        document.querySelector("form").addEventListener("submit", (e) => {
            e.preventDefault();

            // alert("Este formulario se encuentra deshabilitado momentaneamente.")
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
    </script>
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