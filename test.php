<?php

$mysqli = new mysqli("localhost:3306", "rialproducciones", 'Palmito5598$YR22', "rialprod_rial");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$query = "SELECT precio from temas where id = 490221";

$res = $mysqli->query($query);


var_dump($res);
