<?
//$q_insert="INSERT INTO temas (id_artista, nombre, tipo, precio, internacional, id_rubro) VALUES (%s, '%s', 2, '%s', '%s', %s)";

//$q_update="UPDATE temas SET nombre='%s', id_artista=%s, precio='%s', internacional='%s', id_rubro=%s WHERE id='%s' AND tipo=2 LIMIT 1";

//$q_insert_carrito="INSERT INTO articulos (id_articulo, tipo) VALUES (%s, 2)";

if (!empty($_GET["eliminar"])) {
	echo "<h2>".((mysql_query("DELETE FROM temas WHERE id=".$_GET["eliminar"]." LIMIT 1")) ? "Tema eliminado" : "Ocurrio un error")."</h2>";
}
if (V("newTema")!="" AND V("nombreTema")!="" AND V("id_artista")!="" AND V("precio")!="" AND V("rubro")!="") {
	$preciointEditar = (V("precioint")!="") ? V("precioint") : 66;
	//if (V("editar")!="")
	//$q=sprintf($q_update, qPrep(V("nombreTema")), qPrep(V("id_artista")), qPrep(V("precio")), qPrep($preciointEditar), qPrep(V("rubro")), qPrep(V("editar")));
	//else {
	//$q=sprintf($q_insert, qPrep(V("id_artista")), qPrep(V("nombreTema")), qPrep(V("precio")), qPrep($preciointEditar), qPrep(V("rubro")));
	//}
	if (mysql_query($q)) {
		/*
		if (!V("editar")!="") {
		$q_articulos=sprintf($q_insert_carrito, mysql_insert_id());
		mysql_query($q_articulos);
		echo "<h2>Tema editado correctamente.</h2>";
		} else echo "<h2>Tema agregado correctamente.</h2>";
		*/
		echo "<h2>Tema agregado correctamente.</h2>";
		$_POST=array();
		$_GET=array();
	}else
  		echo "<h2>ERROR</h2>";
}else
	echo "<h2>Debes completar todos los campos</h2>";
if (V("id") != "") {
	$r = mysql_query("SELECT nombre, id_artista, precio, internacional, id_rubro FROM temas WHERE id=".V("id")." LIMIT 1");
	$nombreTema = mysql_result($r, 0, "nombre");
	$artistaEditar = mysql_result($r, 0, "id_artista");
	$precioEditar = mysql_result($r, 0, "precio");
	$preciointEditar = mysql_result($r, 0, "internacional");
	$rubroEditar = mysql_result($r, 0, "id_rubro");
}
if($precioEditar == ""){
	$precioEditar = "66";
}
if($preciointEditar == ""){
	$preciointEditar = "15";
}
$r = mysql_query("SELECT * FROM artistas ORDER BY nombre ASC");
$optionAr = "<option value='' ></option>";
while($d=mysql_fetch_object($r)) {
	if ($d->id == $artistaEditar)
		$selected = "selected='selected'";
	else
		$selected = "";
	$optionAr .= "<option value='{$d->id}' $selected>{$d->nombre}</option>";
}
$r = mysql_query("SELECT * FROM rubros ORDER BY nombre ASC");
$optionRu = "<option value='' ></option>";
while($d=mysql_fetch_object($r)) {
  	if ($d->id == $rubroEditar)
		$selected = "selected='selected'";
	else
  		$selected = ""; 
	$optionRu .= "<option value='{$d->id}' $selected>{$d->nombre}</option>";
}
?>
<script type="text/javascript" src="/autocomplete/bsn.AutoSuggest_2.1.3_comp.js" charset="utf-8"></script>
<script type="text/javascript" language="javascript">
	function validator(){
		if(document.getElementById("nombreTema").value == ""){alert("Complete el nombre del tema.");return false;}
		if(document.getElementById("id_artista").value == ""){alert("Vuelva a seleccionar el artista.");return false;}
		if(document.getElementById("rubro").value == ""){alert("Seleccione un rubro");return false;}
		return true;
	}
</script>
<link rel="stylesheet" href="/autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<form class="simpleForm" action="index.php?ver=temas" method="post" onsubmit="javascript:return validator();">
	<label>Nombre Tema</label>
	<input type="text" class="input" name="nombreTema" id="nombreTema" value="<?=$nombreTema;?>"><br />
	<label>Artista</label>
	<input type="text" id="nombreArtista"  name="nombreArtista" value="" class="input textbox" >
	<input type="hidden" name="id_artista" id="id_artista" value="<?=$id_artista;?>"><br />
	<label>Rubro</label>
	<select class="input" name="rubro" id="rubro"><?=$optionRu;?></select><br />
	<label>Precio</label>
	<input type="text" class="input" name="precio" value="<?=$precioEditar;?>"><br />
	<label>Precio Internacional</label>
	<input type="text" class="input" name="precioint" value="<?=$preciointEditar;?>"><br />
	<input type="submit" name="newTema" value="Agregar">
	<?
if (V("id") != "")
	echo '<input type="hidden" name="editar" value="'.V("id").'">';
?>
</form>
<script type="text/javascript">
	var options_xml = {
		script: function (input){
			return "/autocomplete/autocomplete.php?tipoAu=5236&input="+input;
		},
		varname:"id_artista",
		callback:function (data){
			document.getElementById('id_artista').value = data.id;
		}
	};
	var as_xml = new bsn.AutoSuggest('nombreArtista', options_xml);
</script>
<h2>Buscar Tema</h2>
<form class="simpleForm" action="index.php?ver=temas" method="post">
	<label>Nombre Tema</label>
	<input type="text" class="input" name="nombreTemaBuscar" value="<?=$_POST["nombreTemaBuscar"];?>"><br />
	<input type="submit" name="newTema" value="Buscar">
</form>
<?
$q = "SELECT t.id, t.nombre, a.nombre as artista FROM temas t LEFT JOIN artistas a ON t.id_artista = a.id WHERE t.tipo = 2";
if(!empty($_POST["nombreTemaBuscar"]))
	$q .= " AND t.nombre LIKE '%".$_POST["nombreTemaBuscar"]."%'";
$q .= " LIMIT 100";
$r = mysql_query($q);
echo "<table class='tablaCpanel'><tr><th>Tema</th><th>Artista</th><th></th><th></th></tr>";
while ($d=mysql_fetch_object($r)) {
	echo "<tr><td>{$d->nombre}</td><td>{$d->artista}</td><td><a href=\"?ver=temas&id={$d->id}\">[Editar]</a></td><td><a href=\"?ver=temas&eliminar={$d->id}\">[Eliminar]</a></td></tr>";
}
echo "</table>"
?>