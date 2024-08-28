<?
$q_insert="INSERT INTO artistas (nombre,imagen) VALUES ('%s','%s')";

$q_update="UPDATE artistas SET nombre='%s' , imagen='%s' WHERE id='%s' LIMIT 1";

if (!empty($_GET["eliminar"])) {
  echo "<h2>".((mysql_query("DELETE FROM artistas WHERE id=".$_GET["eliminar"]." LIMIT 1")) ? "Artista eliminado" : "Ocurrio un error")."</h2>";
	if (file_exists("../imgArtistas/".$_GET["imagen"])){@unlink("../imgArtistas/".$_GET["imagen"]);}

}
if (V("newArtista")!="" AND V("nombreArtista")!="") {

$imagen_hidden = $_POST["imagen_hidden"];
	$name_img = $_FILES['imagen']['name'];
	
	if($name_img==""){
		$name_img=$imagen_hidden ;
	}else {					
		if($_FILES['imagen']['error']==0){
			$tmp_name = $_FILES['imagen']['tmp_name'];	
			$name_img_ = str_replace(" ","_",basename($_FILES['imagen']['name']));		
			$renombrar = str_replace(" ","",(string)microtime());
			$renombrar_ = explode(".",$renombrar);
			$name_img = substr($renombrar_[1], 0 , 3)."_".$name_img_; 
			$names = explode(".",$name_img);
			$names = array_reverse($names);
			$extension = strtolower($names[0]);		
			if($extension == "jpg"){
				if(!move_uploaded_file($tmp_name,"../imgArtistas/".$name_img)){
					die("No se pudo subir el archivo");
				}		
			}else{
				die("La extension no es valida. El sistema solo admite *.jpg para la seccion.");
			}
		}	
	}
		
  if (V("editar")!="") $q=sprintf($q_update, qPrep(V("nombreArtista")),$name_img, qPrep(V("editar")));

  else $q=sprintf($q_insert, qPrep(V("nombreArtista")), $name_img);


  if (mysql_query($q)) {
	$_POST=array();
	$_GET=array();
	 
  }
		
	
}



if (V("id")!="") {
  	$r=mysql_query("SELECT * FROM artistas WHERE id=".V("id")." LIMIT 1");
 	$nombreArtista=mysql_result($r, 0, "nombre"); 
	$imagen=mysql_result($r, 0, "imagen");
}



//$r=mysql_query("SELECT * FROM rubros");

//$option="<option value='' ></option>";

//while ($d=mysql_fetch_object($r)) {

//if ($d->id==$rubroEditar) $selected="selected=selected";

//else $selected="";



//$option.="<option value='{$d->id}' $selected>{$d->nombre}</option>";

//}

?>



<form class="simpleFormA" action="" method="post" enctype="multipart/form-data">

<label>Nombre Artista</label><input type="text" class="input" name="nombreArtista" value="<?=$nombreArtista;?>"><br />
<label>Imagen:</label><input type="file" id="imagen" name="imagen" value="<?=$imagen;?>">
<input name="imagen_hidden" id="imagen_hidden" type="hidden" value="<?=$imagen;?>">
<br /><label>&nbsp;</label><? if($imagen!=''){ echo '<img src="../imgArtistas/'.$imagen.'" width="80px" height="80px"/>';} ?><br>


<!-- ME CARGA LA IMAGEN EN LA BASE PERO NO ME TOMA LA ANTERIOR SI CARGO SIN IMAGEN -->
<input type="submit" name="newArtista" value="Agregar">

<?

if (V("id")!="") echo '<input type="hidden" name="editar" value="'.V("id").'">';

?>

</form>


<h2>Buscar Artista</h2>
<form class="simpleForm" action="" method="post">
<label>Nombre Artista</label><input type="text" class="input" name="nombreArtistaBuscar" value="<?=$_POST["nombreArtistaBuscar"];?>"><br />
<input type="submit" name="newTema" value="Buscar">
</form>


<?

$q="SELECT a.id, a.imagen , a.nombre FROM artistas a";

if (!empty($_POST["nombreArtistaBuscar"])) $q.=" WHERE a.nombre LIKE '%".$_POST["nombreArtistaBuscar"]."%' ";

$q.=" LIMIT 100";

$r=mysql_query($q);



echo "<table class='tablaCpanel'>";

echo "<tr><th>Artista</th><th></th><th></th></tr>";

while ($d=mysql_fetch_object($r)) {

echo "<tr><td>{$d->nombre}</td><td><a href=\"?ver=artistas&id={$d->id}\">[Editar]</a></td><td><a href=\"?ver=artistas&eliminar={$d->id}&imagen={$d->imagen}\">[Eliminar]</a></td></tr>";

}

echo "</table>"

?>