<?php
//in local
$host = "198.12.148.3";
$usr = "rialprod_2014";
$clave = "21fifikiWE";
$bd = "rialprod_rial";
$servidor = 'mysql:dbname=' . $bd . ';host=' . $host . ';';
try {
    $pdo = new PDO($servidor, $usr, $clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo 'Error: ' . $e;
}
