<?
$q_insert="INSERT INTO rubros (nombre, nombre_en) VALUES ('%s', '%s')";

$q_update="UPDATE rubros SET nombre='%s', nombre_en='%s' WHERE id='%s' LIMIT 1";

if (!empty($_GET["eliminar"])) {
  echo "<h2>".((mysql_query("DELETE FROM rubros WHERE id=".$_GET["eliminar"]." LIMIT 1")) ? "Rubro eliminado" : "Ocurrio un error")."</h2>";
}

if (V("newRubro")!="" AND V("nombreRubro")!="" AND V("nombreRubroEn")!="") {
  if (V("editar")!="") {
  	 $q=sprintf($q_update, qPrep(V("nombreRubro")), qPrep(V("nombreRubroEn")), qPrep(V("editar")));
  } else $q=sprintf($q_insert, qPrep(V("nombreRubro")), qPrep(V("nombreRubroEn")));

  if (mysql_query($q)) echo "<h2>Rubro agregado correctamente</h2>";
	else echo "<h2>ERROR</h2>";
}

if (V("id")!="") {
  $r=mysql_query("SELECT nombre, nombre_en FROM rubros WHERE id=".V("id")." LIMIT 1");

  $nombreRubro=mysql_result($r, 0, "nombre");
  $nombreRubroEn=mysql_result($r, 0, "nombre_en");
}
?>



<form class="simpleForm" action="" method="post" enctype="multipart/form-data">
<label>Nombre</label><input type="text" class="input" name="nombreRubro" value="<?=$nombreRubro;?>"><br />
<label>Nombre ingles</label><input type="text" class="input" name="nombreRubroEn" value="<?=$nombreRubroEn;?>"><br />
<input type="submit" name="newRubro" value="Agregar">
<?
if (V("id")!="") echo '<input type="hidden" name="editar" value="'.V("id").'">';
?>

</form>

<?
$q="SELECT * FROM rubros";
$r=mysql_query($q);

echo "<table class='tablaCpanel'>";
echo "<tr><th>Rubro</th><th></th><th></th></tr>";
while ($d=mysql_fetch_object($r)) {
  echo "<tr><td>{$d->nombre}</td><td><a href=\"?ver=rubros&id={$d->id}\">[Editar]</a></td><td><a href=\"?ver=rubros&eliminar={$d->id}\">[Eliminar]</a></td></tr>";
}
echo "</table>"
?>