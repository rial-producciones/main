<?
$q_insert_cd="INSERT INTO cds (nombre, imagen, rubro, demo, precio) VALUES ('%s', '%s', '%s', '%s', '%s')";
$q_update_cd="UPDATE cds SET nombre='%s', imagen='%s', rubro='%s', demo='%s', precio='%s' WHERE id='%s' LIMIT 1";

$q_insert_tema="INSERT INTO temas (id_artista, nombre, tipo) VALUES (%s, '%s', 1)";
$q_update_tema="UPDATE temas SET nombre='%s', id_artista=%s WHERE id='%s' AND tipo=1 LIMIT 1";

$q_insert_carrito="INSERT INTO articulos (id_articulo, tipo) VALUES (%s, 1)";

if (V("paso2")=="Crear") {

if (sizeof($_POST["tema"])>0) {
foreach ($_POST["tema"] as $v) {
if (!empty($v)) $temasValidos[]=$v;
}
}
if (sizeof($temasValidos)>0 AND V("titulo")!="" AND $_FILES["imagen"]["name"]!="" AND V("rubro")!="" AND V("precio")!="") {


		$uploaddir = 'C:\Inetpub\vhosts\e-bpc.net\httpdocs\rial\imagenes\\';
		$uploadfile = $uploaddir . $_FILES['imagen']['name'];
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadfile)) {
				$url_imagen     = 'http://e-bpc.net/rial/imagenes/' . $_FILES['imagen']['name'];
		} else {
		    echo $error = "Problema encontrado con la imagen";
		}
		
		if (!empty($_FILES['demo']['name'])) {
		$uploaddemo = $uploaddir . $_FILES['demo']['name'];
		if (move_uploaded_file($_FILES['demo']['tmp_name'], $uploaddemo)) {
				$url_demo     = 'http://e-bpc.net/rial/imagenes/' . $_FILES['demo']['name'];
		}
    } else $url_demo="";



$q=sprintf($q_insert_cd, V("titulo"), $url_imagen, V("rubro"), $url_demo,  V("precio"));
mysql_query($q);
$id=mysql_insert_id();

$q_articulos=sprintf($q_insert_carrito, $id);
mysql_query($q_articulos);

foreach ($temasValidos as $v) {
$q=sprintf($q_insert_tema, $id, $v);
mysql_query($q);
}

echo "<h2>CD agregado correctamente.</h2>";

} else echo "<h2>Debes completar todos los campos.</h2>";

}

if (V("paso2")=="") {
?>
<a onclick="javascript: document.getElementById('newCD').style.display='block';" href="#">Nuevo CD</a>
<form id="newCD" style="display: none;" class="simpleForm" action="" method="post">
<label>Cantidad de temas</label><input type="text" value="" class="input" name="cantidad"><br />
<input type="submit" name="paso2" value="Enviar">
</form>
<?
} elseif (V("paso2")=="Enviar" ){
if (V("cantidad")!="" AND is_numeric( V("cantidad"))) {
?>
<form class="simpleForm" action="" method="post" enctype="multipart/form-data">
<label>Titulo</label><input type="text" class="input" value="" name="titulo"><br />
<?
$r=mysql_query("SELECT * FROM rubros");
$option="<option value='' ></option>";
while ($d=mysql_fetch_object($r)) {
if ($d->id==$rubroEditar) $selected="selected=selected";
else $selected="";

$option.="<option value='{$d->id}' $selected>{$d->nombre}</option>";
}
?>
<label>Rubro</label><select class="input" name="rubro"><?=$option;?></select><br />
<label>Imagen</label><input type="file" class="input" name="imagen"><br />
<label>Demo</label><input type="file" class="input" name="demo"><br />
<label>Precio</label><input type="text" class="input" name="precio"><br />
<?
$h=V("cantidad");
for ($i=0; $i<$h; $i++) {
echo '<label>Tema '.($i+1).'</label><input type="text" class="input" value="" name="tema[]"><br />';
}
?>

<input type="submit" name="paso2" value="Crear">
</form>
<?
} else echo "<h2>Debes completar todos los campos.</h2>";
}

if (V("id")!="") {
$q="SELECT cds.nombre, cds.precio, r.nombre as rubro, cds.imagen, t.id as id_tema, t.nombre as ntema 
FROM cds 
LEFT JOIN temas t ON t.id_artista=cds.id 
LEFT JOIN rubros r ON r.id=cds.rubro
WHERE cds.id=".V("id")." AND t.tipo=1";
$r=mysql_query($q);

echo "<table class='tablaCpanel'>";
$unavez=true;
while ($d=mysql_fetch_object($r)) {
if ($unavez) {
echo "<tr><td><b>Titulo</b> {$d->nombre}</td></tr>";
echo "<tr><td><b>Rubro</b> {$d->rubro}</td></tr>";
echo "<tr><td><b>Precio</b> {$d->precio}</td></tr>";
echo "<tr><td><img src='{$d->imagen}'></td></tr>";
echo "<tr><td><b>Temas:</b></td></tr>";
$unavez=false;
}
echo "<tr><td>{$d->ntema}</td></tr>";


}
echo "</table>";
}

$q="SELECT * FROM cds";
$r=mysql_query($q);

echo "<table class='tablaCpanel'>";
echo "<tr><th>CD</th><th></th></tr>";
while ($d=mysql_fetch_object($r)) {
echo "<tr><td>{$d->nombre}</td><td><a href=\"?ver=cd&id={$d->id}\">[Ver]</a></td></tr>";
}
echo "</table>"
?>

