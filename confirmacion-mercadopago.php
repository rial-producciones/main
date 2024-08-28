<?php


$forma_pago = $_GET['forma_pago'];
$nombre_usuario = $_GET['nombre'];
$telefono = $_GET['telefono'];
$email  = $_GET['email'];
$payment_id = $_GET['payment_id'];
$mensaje = $_GET['mensaje'];
$status = $_GET['status'];
$temaspedidos = $_GET['temaspedidos'];
$totaal = $_GET['total'];

$array_temas = explode('|', $temaspedidos);




require('./nuevo/PHPMailer/class.phpmailer.php');
require('./nuevo/PHPMailer/class.smtp.php');

$asunto = 'Rial Producciones - Compra Finalizada - Abonado con Mercado Pago';


$ContenidosBody = 'Forma de pago: Mercadopago <br>
					   Nombre: ' . $nombre_usuario . '<br>
					   Telefono: ' . $telefono . '<br>
					   E-mail: ' . $email . '<br>
					   Mensaje: ' . $mensaje . '<br>
					   ID de pago: ' . $payment_id . '<br>
					   Estado: ' . $status . '<br>
					   Total: $' . $totaal . '<br><br><br>
					   Temas pedidos:<br>
					   ';

foreach ($array_temas as $tema) {
	$ContenidosBody .= $tema;
	$ContenidosBody .= "<br>";
}

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
$mail->AddAddress($email);
$mail->AddAddress('info.rialproducciones@gmail.com');
// $mail->AddAddress('devnicolasg@gmail.com');

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
	header('Location: compraok.php');
};
