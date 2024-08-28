<?
function cnn(){
	$host="localhost";
	$usr="rodri";
	$clave="123456";
	$bd="rialprod";
	if (!($idconex = mysql_connect ($host,$usr,$clave))){
		echo "error conectando al servidor $host con el nombre $usr";
		exit ();
	}
	if (!mysql_select_db ($bd,$idconex)){
		echo "error seleccionando la base de datos $bd";
		exit();
	}
	return $idconex;
}

//abro la conexion
$idconex = cnn();
$q_insert = "INSERT INTO artistas (nombre) VALUES ('%s')";
$nombreArtista = $_POST["nombreArtista"];
if ($nombreArtista != ""){
	$q = sprintf($q_insert, $nombreArtista);
	if (mysql_query($q)) {
?>
<script type="text/javascript" language="javascript">
	alert("Se agrego el artista satifactoriamente.");
	window.close();
</script>
<?
	}
}
?>
<form class="simpleForm" action="" method="post" style="background:#E5E5E5; border:1px solid #000000; padding-left:10px;">
	<br /><br />
	<label>Nombre Artista</label>&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="nombreArtista" value="<?=$nombreArtista;?>"><br /><br />
	<input type="submit" name="newArtista" value="Agregar">
	<br /><br /><br />
</form>