<?php
require('./nuevo/PHPMailer/class.phpmailer.php');
require('./nuevo/PHPMailer/class.smtp.php');

$input = json_decode(file_get_contents("php://input"), true);

$nombre = $input['nombre'];
$email = $input['email'];
$telefono = $input['telefono'];
$pais = $input['pais'];
$coro = $input['coro'];
$comentarios = $input['comentarios'];
$pedidos = $input['pedidos'];
$stringPedidos = "Artista - Tema <br/>";

for ($i = 0; $i < count($pedidos); $i++) {
    $stringPedidos .= $pedidos[$i]['artista'] . " - " . $pedidos[$i]['tema'] . "<br/>";
}


$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->IsSMTP();
/*$mail->SMTPDebug  = 2;          */
$mail->SMTPAuth   = false;
$mail->Host       = 'localhost';
//$mail->Username   = "contactos@rialproducciones.com";
//$mail->Password   = "Pomodoro1yes";
$mail->Port       = 25;
$mail->FromName = "Roberto Rial Producciones";
$mail->From     = ("contactos@rialproducciones.com");
$mail->Subject  = "Pedido de Demos";
$mail->AddAddress("contactos@rialproducciones.com");
// $mail->AddAddress($email);
//$mail->AddBCC("contactos@rialproducciones.com"); 
$mail->IsHTML(true);
$mail->WordWrap = 50;
$mail->AddEmbeddedImage('newsletter/logo_pie.gif', 'logo_pie', 'newsletter/logo_pie.gif');
$mail->AddEmbeddedImage('newsletter/separador.gif', 'separador', 'newsletter/separador.gif');
$mail->AddEmbeddedImage('newsletter/h_contacto.jpg', 'h_contacto', 'newsletter/h_contacto.jpg');

/* Plantilla */
$template = file_get_contents('newsletter/pedido_demo.html', 'r');
$display = str_replace("{name}", $nombre, $template);
$display = str_replace("{email}", $email, $display);
$display = str_replace("{telefono}", $telefono, $display);
$display = str_replace("{pais}", $pais, $display);
$display = str_replace("{coro}", $coro, $display);
$display = str_replace("{address}", $stringPedidos, $display);
$display = str_replace("{coment}", $comentarios, $display);


/* Imagenes */
$mail->Body = $display;
/* Envio del mensaje */

if (!$mail->Send()) {
    echo json_encode(array("status" => 400, "message" => $mail->ErrorInfo));
} else {
    echo json_encode(array(
        "status" => 200,
        "message" => "Correo enviado correctamente"
    ));
}
