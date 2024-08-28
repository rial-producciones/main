<?php
$palabra = $_POST['buscarInput'];
$idBtn = $_POST['idBtn'];

$url = "./karaoke-pistas-musicales-playbacks.php?idBtn=" . $idBtn . "&buscador=" . $idBtn . "&buscarInput=" . $palabra;

header("Location: $url");
