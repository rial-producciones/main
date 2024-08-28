<?php
$camposBD=array(
"nombre"=>"Nombre", 
"email"=>"Email", 
"pais"=>"Pais", 
"provincia"=>"Provincia", 
"localidad"=>"Localidad", 
"direccion"=>"Direccion", 
"codigop"=>"Codigo Postal", 
"tel1"=>"Telefono 1", 
"tel2"=>"Telefono 2",
"formaPago"=>"Forma de Pago", 
"envio"=>"Forma de Envio",
"mensaje"=>"Mensaje",
"mensaje2"=>"Mensaje2");


$fPagos=array(1=>"Tarjeta de Credito", 2=>"Deposito bancario", 3=>"Western Union");

$fEnvios=array(1=>"Correo Expreso", 2=>"Correo Rápido", 3=>"En formato mp3 a su casilla de e-mail", 4=>"Retira personalmente");

if (!empty($_GET["eliminar"])) {
  echo "<h2>".((mysql_query("DELETE FROM compras_realizadas WHERE id=".$_GET["eliminar"]." LIMIT 1")) ? "Compra eliminada" : "Ocurrio un error")."</h2>";
}


if (V("id")!="") {

  $q="SELECT * FROM compras_realizadas WHERE id=".V("id")." LIMIT 1";

  $r=mysql_query($q);

  

  $d=mysql_fetch_object($r);

  

  echo "<table class='tablaCpanel'>";

  foreach ($camposBD as $k => $v) {

    if (!empty($d->$k)) {

    

      if ($k=="formaPago") $val=$fPagos[$d->$k];

      elseif ($k=="envio") $val=$fEnvios[$d->$k];

      else $val=$d->$k;

      

      echo "<tr><td>{$v}</td><td>$val</td></tr>";

    }

  }

  echo "</table>";

}



$q="SELECT * FROM compras_realizadas ORDER BY id DESC";

$r=mysql_query($q);



echo "<table class='tablaCpanel'>";

echo "<tr><th>Fecha</th><th>Forma de pago</th><th>Nombre</th><th>Email</th><th>Telefono</th><th></th><th></th></tr>";

$fPagos=array(1=>"Tarjeta de Credito", 2=>"Deposito bancario", 3=>"Western Union");

while ($d=mysql_fetch_object($r)) {
	if (empty($d->nombre)) $d->nombre="-";
	if (empty($d->email)) $d->email="-";
	if (empty($d->tel1)) $d->tel1="-";
  echo "<tr><td>{$d->fecha}</td><td>{$fPagos[$d->formaPago]}</td><td>{$d->nombre}</td><td>{$d->email}</td><td>{$d->tel1}</td><td><a href='?ver=ventas&id={$d->id}'>Ver</a></td><td><a href='?ver=ventas&eliminar={$d->id}'>Eliminar</a></td></tr>";

}
echo "</table>";

?>