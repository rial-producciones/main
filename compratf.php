<?php
include("./discount.prices.php");
$input = json_decode(file_get_contents("php://input"), true);

//TRANSFERENCIA

$nombre = $input['data']['nombre'];
$direccion = $input['data']['direccion'];
$localidad = $input['data']['localidad'];
$codpostal = $input['data']['codpostal'];
$telefonouno = $input['data']['telefonouno'];
$telefonodos = $input['data']['telefonodos'];
$email = $input['data']['email'];
$provincia = $input['data']['provincia'];
$mensaje = $input['data']['mensaje'];
$carrito = $input['carrito'];
$total = 0;


/* 1. Separar los que son packs y los que no */

$sonPacks = array_values(array_filter($carrito, function ($item) {
	return $item['isPack'] === true;
}));

$noSonPacks = array_values(array_filter($carrito, function ($item) {
	return $item['isPack'] === false;
}));

/* 2. Aplicar los descuentos en los que son temas sueltos y  no son packs. */
$totalSonPacks = 0;
for ($i = 0; $i < count($sonPacks); $i++) {
	$totalSonPacks += intval($sonPacks[$i]['precio']);
}

$totalNoSonPacks = getDiscountNoPacks($noSonPacks);


$total = $totalSonPacks + $totalNoSonPacks;

require('./nuevo/PHPMailer/class.phpmailer.php');
require('./nuevo/PHPMailer/class.smtp.php');

$asunto = 'Rial Producciones - Compra en proceso - Transferencia bancaria';

$ContenidosBody = 'Forma de pago: Transferencia<br><br>
					   Nombre: ' . $nombre . '<br>
					   Direccion: ' . $direccion . '<br>
					   Localidad: ' . $localidad . '<br>
					   Provincia: ' . $provincia . '<br>
					   Cod. postal: ' . $codpostal . '<br>
					   Telefono 1: ' . $telefonouno . '<br>
					   Telefono 2: ' . $telefonodos . '<br>
					   E-mail: ' . $email . '<br>
					   Mensaje: ' . $mensaje . '<br>
					   Total: $' . $total . '<br>

					   Temas pedidos:<br>
					   ';

$ContenidosBody .= getDiscountBodyEmail($carrito);

$ContenidosBody .= '<br><br>Datos para su Pago en Cajeros Automáticos, Depósito o Transferencia Bancaria



Usted puede pagar en cualquier cajero automático de cualquier banco, con los datos suministrados a continuación. Contará con 96 horas para efectuar y confirmar su depósito, caso contrario se anulará esta orden.<br><br><br>


Nuestros datos bancarios:<br><br>

Para: Banco ICBC<br>
Sucursal Ramos Mejía<br>
Caja de ahorro en pesos Nº : 0534/01125034/23<br>
Buenos Aires - Argentina<br>
Beneficiario: Roberto Juan Rial<br>
CUIT N°: 20147412054<br>
CBU Nº: 01505344/01000125034237<br>
ALIAS: RIAL.MUSICA<br><br>

Luego que efectúe el depósito, es fundamental que nos envíe a contactos@rialproducciones.com el comprobante escaneado o fotografiado, otra opción es enviarnos los siguientes datos de su comprobante:<br><br><br>



Fecha<br>
Importe<br><br>

N° de referencia<br>
N° de operación o transacción<br>
N° de sobre ( si es por cajero automático )<br>
Nombre del banco que utiliizó para efectuar su depósito<br>
Sucursal<br>
Hora<br>
Nombre y apellido del depositante<br><br>

Nombre del tiitular de la cuenta ( si es una transferencia )<br><br>

Una vez que lo hayamos recibido, corroboraremos su depósito, de ser correcto recibirá su compra en un plazo maxímo de 24 hs.<br><br>

Recibirá un e-mail que dice en el asunto “Envío de Rial Producciones”, conteniendo las claves para la descarga de su compra desde nuestro sitio web.<br><br>



Siempre revise su carpeta de “Correo no Deseado” o de “Spam”, ya que a veces los e-mails se derivan a esas carpetas.<br><br>



Nota:<br>
Las compras generadas los días sábados o domingos, se contará el tiempo de entrega a partir del día lunes.<br><br>


Ante cualquier inconveniente nos estaremos contactando con usted vía e-mail en el horario de 9 a 19 hs. de lunes a viernes.<br><br>

Muchas gracias por su compra !<br>
Saludos cordiales<br>
Staff Rial Producciones<br><br><br>

RIAL PRODUCCIONES<br>
music & records<br>
Since 1978...<br><br>

Coronel Toscano 887, Villa Sarmiento ( 1706 )<br>
Tel: (+54 11) 15 5094-4545<br>
Whatsapp: (+54 9 11 5094-4545
e-mail: contactos@rialproducciones.com<br>
web: www.rialproducciones.com<br>
Buenos Aires – Argentina<br>
Informes: Lunes a Viernes de 9 a 18 hs.';

$smtpHost = "mail.rialproducciones.com";
$smtpUsuario = "contactos@rialproducciones.com";


// $smtpClave = "Pomodoro1yes";
$smtpClave = "Cebolla401yes";
$emailDestino = $email;

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
$mail->AddAddress('contactos@rialproducciones.com');
$mail->AddAddress('info.rialproducciones@gmail.com');
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
	$redirect = "compraok.php";
};

echo json_encode($redirect);











// $total_general = $carrito->getTotal();

//////////////////////////////////////////////////
// 	session_start();

// 	include "class.Carrito.php";
// 	include "carrito.begin.php";


// 	//TRANSFERENCIA

// 	$nombre = $_POST['nombre'];
// 	$direccion = $_POST['direccion'];
// 	$localidad = $_POST['localidad'];
// 	$codpostal = $_POST['codpostal'];
// 	$telefonouno = $_POST['telefonouno'];
// 	$telefonodos = $_POST['telefonodos'];
// 	$email = $_POST['email'];
// 	$provincia = $_POST['provincia'];
// 	$mensaje = $_POST['mensaje'];

// 	$total_general = $carrito->getTotal();





// 	require('PHPMailer/class.phpmailer.php');
// 	require('PHPMailer/class.smtp.php');

// 	$asunto = 'Rial Producciones - Compra en proceso - Transferencia bancaria';


// 	$ContenidosBody = 'Forma de pago: Transferencia<br><br>
// 					   Nombre: '.$nombre.'<br>
// 					   Direccion: '.$direccion.'<br>
// 					   Localidad: '.$localidad.'<br>
// 					   Provincia: '.$provincia.'<br>
// 					   Cod. postal: '.$codpostal.'<br>
// 					   Telefono 1: '.$telefonouno.'<br>
// 					   Telefono 2: '.$telefonodos.'<br>
// 					   E-mail: '.$email.'<br>
// 					   Mensaje: '.$mensaje.'<br>
// 					   Total: '.$total_general.'<br>

// 					   Temas pedidos:<br>
// 					   ';

// 	 foreach ($carrito->getProductos() as $k => $v){


// 		$ContenidosBody .= $v['nombre']; 			   
// 		$ContenidosBody .= " - "; 			   
// 		$ContenidosBody .= $v['precio']; 			   
// 		$ContenidosBody .= "<br>"; 	

// 	  }


// 	  $ContenidosBody .= '<br><br>Datos para su Pago en Cajeros Automáticos, Depósito o Transferencia Bancaria



// Usted puede pagar en cualquier cajero automático de cualquier banco, con los datos suministrados a continuación. Contará con 96 horas para efectuar y confirmar su depósito, caso contrario se anulará esta orden.<br><br><br>


// Nuestros datos bancarios:<br><br>

// Para: Banco Santander Río<br>
// Sucursal Ramos Mejía ( 051 )<br>
// Caja de ahorro en pesos Nº : 051-3685606<br>
// Buenos Aires - Argentina<br>
// Beneficiario: Roberto Juan Rial<br>
// CUIT N°: 20147412054<br>
// CBU Nº: 0720051988000036856068 (el CBU es la clave para depositar desde cualquier banco hacia el nuestro, dentro de la Argentina).<br><br>

// Luego que efectúe el depósito, es fundamental que nos envíe a info@rialproducciones.com.ar el comprobante escaneado o fotografiado, otra opción es enviarnos los siguientes datos de su comprobante:<br><br><br>



// Fecha<br>
// Importe<br><br>

// N° de referencia<br>
// N° de operación o transacción<br>
// N° de sobre ( si es por cajero automático )<br>
// Nombre del banco que utiliizó para efectuar su depósito<br>
// Sucursal<br>
// Hora<br>
// Nombre y apellido del depositante<br><br>

// Nombre del tiitular de la cuenta ( si es una transferencia )<br><br>

// Una vez que lo hayamos recibido, corroboraremos su depósito, de ser correcto recibirá su compra en un plazo maxímo de 48 hs.<br><br>

// Recibirá un e-mail que dice en el asunto “Descargue su Orden”, conteniendo las claves para la descarga de su compra desde nuestro sitio web.<br><br>



// Siempre revise su carpeta de “Correo no Deseado” o de “Spam”, ya que a veces los e-mails se derivan a esas carpetas.<br><br>



// Nota:<br>
// Las compras generadas los días sábados o domingos, se contará el tiempo de entrega a partir del día lunes.<br><br>


// Ante cualquier inconveniente nos estaremos contactando con usted vía e-mail en el horario de 9 a 18 hs. de lunes a viernes.<br><br>

// Muchas gracias por su compra !<br>
// Saludos cordiales<br>
// Staff Roberto Rial Producciones<br><br><br>

// ROBERTO RIAL PRODUCCIONES<br>
// music & records<br>
// Since 1978...<br><br>

// Coronel Toscano 887, Villa Sarmiento ( 1706 )<br>
// Tel: (+54 11) 15 5094-4545<br>
// e-mail: info@rialproducciones.com.ar<br>
// web: www.rialproducciones.com<br>
// Buenos Aires – Argentina<br>
// Informes: Lunes a Viernes de 9 a 18 hs.';


//     $smtpHost = "mail.rialproducciones.com";
//     $smtpUsuario = "contactos@rialproducciones.com";
//     $smtpClave = "Pomodoro1yes";
// 	$emailDestino = $email;



//     $mail = new PHPMailer;
//     //$mail->SMTPDebug = 3;
//     $mail->IsSMTP();
//     $mail->SMTPAuth = true;
//     $mail->Port = 587;
//     $mail->IsHTML(true);
//     $mail->CharSet = "utf-8";

// 	$mail->Host = $smtpHost;
// 	$mail->Username = $smtpUsuario;
//     $mail->Password = $smtpClave;

//     $mail->From = "contactos@rialproducciones.com";
//     $mail->FromName = "RialProducciones.com";
//     $mail->AddAddress($emailDestino);
// 	//$mail->AddAddress('contactos@rialproducciones.com');
//     $mail->Subject = ($asunto);
//     $mail->Body = ($ContenidosBody);
//     $mail->SMTPOptions = array(
//     'ssl' => array(
// 		'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//         )
//     );
//     if ($mail->Send()) {



// 			$redirect = "compraok.php";
//         };
