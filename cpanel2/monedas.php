<?
/*

$monedasCarrito=array(
1=>array("nombre"=>"Peso", "val"=>1, "simbolo"=>"\$"),
2=>array("nombre"=>"Dolar", "val"=>3.15, "simbolo"=>"U\$D"),
3=>array("nombre"=>"Euro", "val"=>5.20, "simbolo"=>"EUR"));

*/

if (!empty($_POST["Enviar"])) {
$dolar=str_replace(",", ".", $_POST['2']);
$euro=str_replace(",", ".", $_POST['3']);
$newArray='<'.'? '.'$'.'monedasCarrito=array(
1=>array("nombre"=>"Peso", "val"=>1, "simbolo"=>"\$"),
2=>array("nombre"=>"Dolar", "val"=>'.$dolar.', "simbolo"=>"U\$D")); ?'.'>';
chmod('C:\\Inetpub\\vhosts\\rialproducciones.com\\httpdocs\\monedasCarrito.php', 0755);
$arch=fopen("../monedasCarrito.php", "w");
if (fwrite($arch, $newArray)) echo "<h2>Monedas actualizadas</h2>";
else echo "<h2>ERROR</h2>";
fclose($arch);
}

include ("../monedasCarrito.php");
echo "<form class='simpleForm' action='' method='post'>";
foreach ($monedasCarrito as $k => $v) {

echo "<label>{$v['nombre']}</label><input type='text' value='{$v['val']}' name='{$k}'><br/>";
}

echo "<input type='submit' value='Enviar' name='Enviar'></form>";

?>