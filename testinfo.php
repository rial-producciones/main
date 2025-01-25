<?php
// phpinfo();
$dias = ["Monday" => "Lunes", "Thursday" => "Martes", "Wednesday" => "Miércoles", "Tuesday" => "Jueves", "Friday" => "Viernes", "Saturday" => "Sábado", "Sunday" => "Domingo"];
$mes = ["January" => "Enero", "February" => "Febrero", "March" => "Marzo", "April" => "Abril", "May" => "Mayo", "June" => "Junio", "July" => "Julio", "August" => "Agosto", "September" => "Septiembre", "October" => "Octubre", "November" => "Noviembre", "December" => "Diciembre"];
setlocale(LC_TIME, 'es_ES.UTF-8');
echo "<br/>Hoy es ";
$date = new DateTime('now');
$nombreDia = strftime('%A', $date->getTimestamp());
$dia = strftime('%d', $date->getTimestamp());
$nombreMes = strftime('%B', $date->getTimestamp());
$nombreAnio = strftime('%Y', $date->getTimestamp());
if (is_null($dias[$nombreDia]) || is_null($mes[$nombreMes])) {
    echo iconv("iso-8859-1", "utf-8", strftime(" %A %d de %B de %Y ", $date->getTimestamp()));
} else {
    echo $dias[$nombreDia] . " " . $dia . " de " . $mes[$nombreMes] . " de " . $nombreAnio;
}
