<?php

error_reporting(E_ALL);
include("./discount.prices.php");

$input = json_decode(file_get_contents("php://input"), true);
$carritoo = $input['carrito'];
$array_canciones = [];
$temaspedidos = '';

/* 1. Separar los que son packs y los que no */

$sonPacks = array_values(array_filter($carritoo, function ($item) {
	return $item['isPack'] === true;
}));

$noSonPacks = array_values(array_filter($carritoo, function ($item) {
	return $item['isPack'] === false;
}));
/* 2. Aplicar los descuentos en los que son temas sueltos y  no son packs. */
$totalSonPacks = 0;
for ($i = 0; $i < count($sonPacks); $i++) {
	$totalSonPacks += intval($sonPacks[$i]['precio']);
}

$totalNoSonPacks = getDiscountNoPacks($noSonPacks, "pesos");

$total = $totalSonPacks + $totalNoSonPacks;
for ($i = 0; $i < count($carritoo); $i++) {
	$nombre_cancion = $carritoo[$i]['nombre'] . '[' . $carritoo[$i]['tonos'] . ']';
	$array_canciones[$i] = [
		"id" => $carritoo[$i]['id'],
		"title" => $carritoo[$i]['nombre'],
		"currency_id" => "ARS",
		"picture_url" => 'https://rialproducciones.com/nuevo/assets/img/logoprincipal.png',
		"quantity" => 1,
		"unit_price" => ($carritoo[$i]['isPack'] === true) ? intval($carritoo[$i]['precio']) :( (count($noSonPacks) > 2) ? floor((int)$carritoo[$i]['precio'] - ceil((int)$carritoo[$i]['precio'] * getPercentagePerSong($noSonPacks))) : (int)$carritoo[$i]['precio'])
	];

	$temaspedidos .= $nombre_cancion;
	$temaspedidos .= "|";

	$array_canciones[$i]['title'] = $temaspedidos;
}

$arr = array(
	"nombre_cancion" => $nombre_cancion,
	"array_canciones" => $array_canciones,
	"total" => $total,
	"temas_pedidos" => $temaspedidos,
);

//TEST-61025b76-324d-4c2c-8898-8d7cc29fe5a1
//TEST-7976539164583106-080519-f30598b6973c23174bf54edb81364a8b-131263172
$nombre = $input['data']['nombre'];
$telefono = $input['data']['telefonouno'];
$email = $input['data']['email'];
$mensaje = $input['data']['mensaje'];
$client_id = '7976539164583106';
$client_secret = '0pD3u0H4hyRsoTnZYKgMjQCzcRtzxYc4';
$moneda = "ARS";

require_once('mercadopago.php');

$mp = new MP($client_id, $client_secret);
// echo json_encode($mp);

// echo json_encode($array_canciones);

$preference_data = [
	"items" =>  $array_canciones,
	"auto_return" => "approved",
	"payment_methods" => [
		"excluded_payment_methods" => [
			["id" => "pagofacil"],
			["id" => "rapipago"]
		]
	],
	"payer" => [
		"name" => $nombre,
		"email" => $email
	],
	"back_urls" => [
		"success" => 'https://rialproducciones.com/confirmacion-mercadopago.php?forma_pago=MP&nombre=' . urlencode($nombre) . '&telefono=' . urlencode($telefono) . '&email=' . urlencode($email) . '&mensaje=' . urlencode($mensaje) . '&total=' . urlencode($total) . '&temaspedidos=' . urlencode($temaspedidos),
		"failure" => 'https://rialproducciones.com/compra.php'
	]
];
$preference = $mp->create_preference($preference_data);
// echo json_encode($preference);
$redirect = $preference['response']['init_point'];

echo json_encode($redirect);




















// session_start();

// include "class.Carrito.php";
// include "carrito.begin.php";
// $temaspedidos = '';

// foreach ($carrito->getProductos() as $k => $v) {

// 	$array_canciones[$k] = [
// 		"id" => $v['id'],
// 		"title" => $v['nombre'],
// 		"currency_id" => "ARS",
// 		"picture_url" => 'https://rialproducciones.com/nuevo/assets/img/logoprincipal.png',
// 		"quantity" => 1,
// 		"unit_price" => (float)$v['precio']
// 	];

// 	$temaspedidos .= $v['nombre'];
// 	$temaspedidos .= "|";
// }

//MERCADO PAGO		

// $nombre = $_POST['nombre'];
// $telefono = $_POST['telefonouno'];
// $email = $_POST['email'];
// $mensaje = $_POST['mensaje'];
// $client_id = '7976539164583106';
// $client_secret = '0pD3u0H4hyRsoTnZYKgMjQCzcRtzxYc4';
// $moneda = "ARS";
// $total_general = $carrito->cantProductos();


// require_once('mercadopago.php');

// $mp = new MP($client_id, $client_secret);


// $preference_data = [
// 	"items" =>  $array_canciones,
// 	"auto_return" => "approved",
// 	"payment_methods" => [
// 		"excluded_payment_methods" => [
// 			["id" => "pagofacil"],
// 			["id" => "rapipago"]
// 		]
// 	],
// 	"payer" => [
// 		"name" => $nombre,
// 		"email" => $email
// 	],
// 	"back_urls" => [
// 		"success" => 'https://rialproducciones.com/nuevo/confirmacion-mercadopago.php?forma_pago=MP&nombre=' . urlencode($nombre) . '&telefono=' . urlencode($telefono) . '&temaspedidos=' . urlencode($temaspedidos) . '&email=' . urlencode($email),
// 		"failure" => 'https://rialproducciones.com/nuevo/compra.php'
// 	]
// ];

// $preference = $mp->create_preference($preference_data);
// $redirect = $preference['response']['init_point'];

//SANDBOX

//$redirect = $preference['response']['sandbox_init_point'];
