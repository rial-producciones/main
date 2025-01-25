<?php

$Nombre = $_POST['nombre'];
$Apellido = $_POST['apellido'];
$Email = $_POST['email'];
$Pais = $_POST['pais'];
$Comentarios = $_POST['mensaje'];
$Recaptcha = $_POST['g-recaptcha-response'];

if ($Recaptcha != "") {


    $ContenidosBody = "<h1>Consulta desde la página web</h1><br/>";
    $ContenidosBody .= "Nombre: " . $Nombre . "<br/> Numero: " . $Apellido . "<br/> Email: " . $Email . "<br/>  País: " . $Pais . "<br/> Comentarios: " . $Comentarios . "<br/><br/>";

    $asunto = '[Consulta desde la página web]';

    require('nuevo/PHPMailer/class.phpmailer.php');
    require('nuevo/PHPMailer/class.smtp.php');

    $smtpHost = "mail.rialproducciones.com";
    $smtpUsuario = "contactos@rialproducciones.com";
    $smtpClave = "Cebolla401yes";
    $emailDestino = "contactos@rialproducciones.com";

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;

    $mail->IsSMTP();

    $mail->SMTPAuth = true;

    $mail->Port = 587;

    $mail->IsHTML(true);

    $mail->CharSet = "utf-8";



    $mail->Host = $smtpHost;

    $mail->Username = $smtpUsuario;

    $mail->Password = $smtpClave;



    $mail->From = "contactos@rialproducciones.com";

    $mail->FromName = "RialProducciones.com";

    $mail->AddAddress($emailDestino);

    $mail->AddAddress('info.rialproducciones@gmail.com');
    $mail->AddAddress('info@rialproducciones.com.ar');
    // $mail->AddAddress('devnicolasg@gmail.com');


    $archivos = $_FILES['imagen'];
    $nombre_archivos = $archivos['name'];
    $ruta_archivos = $archivos['tmp_name'];
    $i = 0;
    foreach ($ruta_archivos as $rutas_archivos) {
        $mail->AddAttachment($_FILES["imagen"]["tmp_name"][$i], $_FILES["imagen"]["name"][$i]);
        $i++;
    }


    $mail->Subject = ($asunto);

    $mail->Body = ($ContenidosBody);

    $mail->SMTPOptions = array(

        'ssl' => array(

            'verify_peer' => false,

            'verify_peer_name' => false,

            'allow_self_signed' => true

        )

    );

    if ($mail->Send()) {

        // header("Refresh:0; url=compraok.php");
        echo json_encode("Correo enviado correctamente!");
        unlink($path);
    };
} else {
    echo json_encode("El recaptcha no fue validado");
}
