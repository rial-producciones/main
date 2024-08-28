<?
$rubro = V("rubro");
$id_artista = V("id_artista");
$precioint = V("precioint");
$precio = V("precio");

if($rubro != "" && $id_artista != ""){
	$q_insert1 = "INSERT INTO temas (id_artista, nombre, tipo, precio, internacional, id_rubro) VALUES ('".$id_artista."', '";
	$q_insert2 = "' , 2, '".$precio."', '".$precioint."', '".$rubro."')";
	for($i=0;$i<10;$i++){
		if(V("nombreTema".$i) != ""){
			$sqlQuery = $q_insert1 . qPrep(V("nombreTema".$i)) . $q_insert2;
			if (mysql_query($sqlQuery)) {
				echo "<b>Tema: ".V("nombreTema".$i)." agregado correctamente.</b><br/>";
			}else{
				echo "<b>ERROR: ".V("nombreTema".$i)."</b><br/>";
			}
		}
	}
}

if (!empty($_GET["eliminar"])) {
	echo "<h2>".((mysql_query("DELETE FROM temas WHERE id = ".$_GET["eliminar"]." LIMIT 1")) ? "Tema eliminado" : "Ocurrio un error")."</h2>";
}

//$r = mysql_query("SELECT * FROM rubros ORDER BY nombre ASC");
//while($d=mysql_fetch_object($r)) {
//  	if ($d->id == $rubroEditar)
//		$selected = "selected='selected'";
//	else
//  		$selected = ""; 
//	$optionRu .= "<option value='{$d->id}' $selected>{$d->nombre}</option>";
//}
$optionRu .= "<option value='1'>Varios</option>";
$optionRu .= "<option value='14'>Tango</option>";
$optionRu .= "<option value='4'>Folklore</option>";
$optionRu .= "<option value='17'>Opera</option>";
$optionRu .= "<option value='22'>Comedias Musicales</option>";
?>
<script type="text/javascript" src="/autocomplete/bsn.AutoSuggest_2.1.3_comp.js" charset="utf-8"></script>
<script type="text/javascript" language="javascript">
	function validator(){
		if(document.getElementById("id_artista").value == ""){alert("Vuelva a seleccionar el artista.");return false;}
		if(document.getElementById("rubro").value == ""){alert("Seleccione un rubro");return false;}
		if(document.getElementById("nombreTema1").value == ""){alert("Complete el nombre del tema.");return false;}
		return true;
	}
	function openWin(){
		window.open("nuevoartista.php", "artist1", "width=400,height=160,scrollbars=NO,toolbar=0,top=400,left=400");
	}
</script>
<link rel="stylesheet" href="/autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<span onclick="javascript:openWin();" style="color:#0000FF; text-decoration:underline; cursor:pointer;">Cargar nuevo artista</span>
<form  action="index.php?ver=temasxartistas" method="post" onsubmit="javascript:return validator();" style="background:#E5E5E5; border:1px solid #000000; width:700px;">
	<table cellpadding="3" cellspacing="3">
		<tr>
			<td><label>Rubro</label><select class="input" name="rubro" id="rubro"><?=$optionRu;?></select><br /></td>
			<td><label>Artista</label><input type="text" id="nombreArtista"  name="nombreArtista" value="" class="input textbox" ><input type="hidden" name="id_artista" id="id_artista" value=""><br /></td>
			<td><label>Precio</label><input type="text" class="input" name="precio" value="15"><br /></td>
			<td><label>Precio Internacional</label><input type="text" class="input" name="precioint" value="66"><br /></td>
		</tr>
	</table>
	<table cellpadding="3" cellspacing="3">
		<tr>
			<td><label>Nombre Tema 1</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema1" id="nombreTema1" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 2</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema2" id="nombreTema2" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 3</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema3" id="nombreTema3" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 4</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema4" id="nombreTema4" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 5</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema5" id="nombreTema5" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 6</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema6" id="nombreTema6" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 7</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema7" id="nombreTema7" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 8</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema8" id="nombreTema8" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 9</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema9" id="nombreTema9" value=""><br /></td>
		</tr>
		<tr>
			<td><label>Nombre Tema 10</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreTema10" id="nombreTema10" value=""><br /></td>
		</tr>
	</table>
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