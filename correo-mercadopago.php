<?php
include("./discount.prices.php");
$input = json_decode(file_get_contents("php://input"), true);
$nombre = $input['data']['nombre'];
$telefono = $input['data']['telefonouno'];
$email = $input['data']['email'];
$mensaje = $input['data']['mensaje'];
$array_canciones = $input['carrito'];
$totaal = 0;

/* 1. Separar los que son packs y los que no */

$sonPacks = array_values(array_filter($array_canciones, function ($item) {
    return $item['isPack'] === true;
}));

$noSonPacks = array_values(array_filter($array_canciones, function ($item) {
    return $item['isPack'] === false;
}));
/* 2. Aplicar los descuentos en los que son temas sueltos y  no son packs. */
$totalSonPacks = 0;
for ($i = 0; $i < count($sonPacks); $i++) {
    $totalSonPacks += intval($sonPacks[$i]['precio']);
}

$totalNoSonPacks = getDiscountNoPacks($noSonPacks, "pesos");

$totaal = $totalSonPacks + $totalNoSonPacks;

require('./nuevo/PHPMailer/class.phpmailer.php');
require('./nuevo/PHPMailer/class.smtp.php');

$asunto = 'Rial Producciones - Prueba de pago - Abonado con Mercado Pago';

$ContenidosBody = 'Forma de pago: Mercadopago <br>
					   Nombre: ' . $nombre . '<br>
					   Telefono: ' . $telefono . '<br>
					   E-mail: ' . $email . '<br>
					   Mensaje: ' . $mensaje . '<br>
					   Total: $' . $totaal . '<br><br><br>
					   Temas pedidos:<br>
					   ';


foreach ($array_canciones as $cancion) {
    $nombre_cancion = $cancion['nombre'] . '[' . $cancion['tonos'] . ']';
    $ContenidosBody .= $nombre_cancion;
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
$mail->AddAddress('info.rialproducciones@gmail.com');
// $mail->AddAddress($email);

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
    $response = "Correo enviado";
};
echo json_encode($response);
// $forma_pago = $_GET['forma_pago'];
// $nombre_usuario = $_GET['nombre'];
// $telefono = $_GET['telefono'];
// $email  = $_GET['email'];
// $payment_id = $_GET['payment_id'];
// $mensaje = $_GET['mensaje'];
// $status = $_GET['status'];
// $temaspedidos = $_GET['temaspedidos'];
// $totaal = $_GET['total'];

// $array_temas = explode('|', $temaspedidos);

// $asunto = 'Rial Producciones - Compra Finalizada - Abonado con Mercado Pago';


// $ContenidosBody = 'Forma de pago: Mercadopago <br>
// 					   Nombre: ' . $nombre_usuario . '<br>
// 					   Telefono: ' . $telefono . '<br>
// 					   E-mail: ' . $email . '<br>
// 					   Mensaje: ' . $mensaje . '<br>
// 					   ID de pago: ' . $payment_id . '<br>
// 					   Estado: ' . $status . '<br>
// 					   Total: $' . $totaal . '<br><br><br>
// 					   Temas pedidos:<br>
// 					   ';

// foreach ($array_temas as $tema) {
// 	$ContenidosBody .= $tema;
// 	$ContenidosBody .= "<br>";
// }
// echo $ContenidosBody;
// echo "Cant: " . count($array_temas);
