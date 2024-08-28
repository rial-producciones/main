<?php
include 'conexion.php';
@session_start();
$input = json_decode(file_get_contents("php://input"), true);
$id = intval($input['add']);

$seleccionarDatos = $pdo->prepare("SELECT id_artista, nombre, tonos, precio, internacional FROM temas WHERE id = $id");
$seleccionarDatos->execute();
$arrDatos = $seleccionarDatos->fetchAll(PDO::FETCH_ASSOC);

$id_artista = intval($arrDatos[0]['id_artista']);
$seleccionarNombreArtista = $pdo->prepare("SELECT nombre FROM artistas WHERE id = $id_artista");
$seleccionarNombreArtista->execute();
$artista = $seleccionarNombreArtista->fetchAll(PDO::FETCH_ASSOC)[0]['nombre'];


$url = ".." . $input['script_url'] . "?" . $input['query_string'];
$cantidad = 1;
$nombre = $arrDatos[0]['nombre'];
$tonos = $input['tonos'] ? $input['tonos'] : $arrDatos[0]['tonos'];
$nombre_artista = $artista;
$precio = $arrDatos[0]['precio'];
$internacional = $arrDatos[0]['internacional'];
$array = [];
$arrayNuevo = [];
$arreglo = [];
$dondeEntra = "";
$msg = "";
if (isset($_SESSION['carrito'])) {
    $arreglo = $_SESSION['carrito'];
    $encontro = false;
    $numero = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i]['id'] == $id && $arreglo[$i]['tonos'] == $tonos) {
            $encontro = true;
            $numero = $i;
        }
    }

    if (!$encontro) {
        $arrayNuevo = array(
            'id' => $id,
            'nombre' => $nombre,
            'tonos' => $tonos,
            'nombre_artista' => $nombre_artista,
            'precio' => $precio,
            'internacional' => $internacional,
            'cantidad' => $cantidad,
            'isPack' => false
        );
        // array_push($arreglo, $arrayNuevo);

        $_SESSION['carrito'][count($_SESSION[['carrito']])] = $arrayNuevo;
        // echo "Ya existia un carro y agregue otro tema mas!";
        $dondeEntra = "entro en el primer if como false";
        $msg = "Agregado correctamente";
    } else {
        $msg = "Ya tienes este producto en tu carrito!";
    }
} else {

    $array = array(
        'id' => $id,
        'nombre' => $nombre,
        'tonos' => $tonos,
        'nombre_artista' => $nombre_artista,
        'precio' => $precio,
        'internacional' => $internacional,
        'cantidad' => $cantidad,
        'isPack' => false
    );
    $_SESSION['carrito'][0] = $array;
    $dondeEntra = "entro en el else del primer if como si fuese false, o sea que no habia nada en el carrito";
    $msg = "Agregado correctamente";
    // echo "No existia el carrito y cree uno nuevo";
}
$carritoDesp = $_SESSION['carrito'];
$response = array(
    "msg" => $msg,
    "url" => $url,
    "carrito" => $_SESSION['carrito'],
    "if" => $dondeEntra
);
echo json_encode($response);
