<?php function error_handler($errno, $errstr, $errfile, $errline, $errctx) {

    //echo $errstr;

}

set_error_handler("error_handler");

error_reporting(E_ALL);  ?>

<?

function V ($v) {

	global $_POST;

	global $_GET;

	if (!empty($_POST[$v]))

		return $_POST[$v];

	else if (!empty($_GET[$v]))

		return $_GET[$v];

	else

		return "";

}

function qPrep($v) {

	return addslashes(trim($v));

}

function cnn(){

//$host="50.62.209.40";

//$usr="RialProd_2014";

//$clave="21fifikiWE";

//$bd="RialProd_";



$host="198.12.148.3";

$usr="rialprod_2014";

$clave="21fifikiWE";

$bd="rialprod_rial";





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

/*

$a[]="CREATE TABLE IF NOT EXISTS `articulos` (

  `id` int(6) NOT NULL auto_increment,

  `id_articulo` int(6) default NULL,

  `tipo` int(6) default NULL,

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `artistas` (

  `id` int(6) NOT NULL auto_increment,

  `nombre` varchar(255) NOT NULL default '',

  `id_rubro` int(5) NOT NULL default '0',

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `carrito` (

  `id_producto` int(11) NOT NULL auto_increment,

  `nombre` varchar(50) default NULL,

  `precio` int(6) default NULL,

  PRIMARY KEY  (`id_producto`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `cds` (

  `id` int(6) NOT NULL auto_increment,

  `nombre` varchar(255) default NULL,

  `imagen` varchar(255) default NULL,

  `rubro` int(6) default NULL,

  `demo` varchar(255) default NULL,

  `precio` int(6) default NULL,

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `compras_realizadas` (

  `id` int(6) NOT NULL auto_increment,

  `nombre` varchar(255) default NULL,

  `direccion` varchar(255) default NULL,

  `localidad` varchar(255) default NULL,

  `codigop` varchar(255) default NULL,

  `tel1` varchar(50) default NULL,

  `tel2` varchar(50) default NULL,

  `email` varchar(255) default NULL,

  `provincia` varchar(255) default NULL,

  `pais` varchar(255) default NULL,

  `formaPago` int(6) default NULL COMMENT '1=tarjeta de credito; 2=Deposito Bancario; 3= Western Union',

  `envio` int(6) default NULL COMMENT '1=correo expreso; 2=correo rapido; 3=mail; 4=personalmente',

  `mensaje` text,

  `fecha` timestamp NULL default CURRENT_TIMESTAMP,

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `rubros` (

  `id` int(6) NOT NULL auto_increment,

  `nombre` varchar(255) NOT NULL default '',

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



$a[]="CREATE TABLE IF NOT EXISTS `temas` (

  `id` int(6) NOT NULL auto_increment,

  `id_artista` int(6) NOT NULL default '0',

  `nombre` varchar(255) NOT NULL default '',

  `tipo` int(6) default NULL COMMENT '1: pertenece a un cd; 2: se vende por separado',

  `precio` int(6) default NULL,

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";



foreach ($a as $v) {

	var_dump(mysql_query($v));

}

*/

$rutas = array(

	"rubros"=>"rubros.php",

	"artistas"=>"artistas.php",

	"temas"=>"temas.php",

	"temasnuevo"=>"temasNew.php",

	"temasxartistas"=>"temasxartistas.php",

	"cd"=>"cd.php",

	"ventas"=>"ventas.php",

	"monedas"=>"monedas.php"

);

?>

<style>

html {

	font-size:62.5%;

}

body {

	color:#000000;

	font-family:sans-serif;

	font-size:1.2em;

}



.simpleFormA {

	background:#E5E5E5 none repeat scroll 0 0;

	border:1px solid #000000;

	margin-top:1em;

	padding:0.5em;

	width: 810px;

}

.simpleFormA label {

	display: block;

	float: left;

	width: 200px;

	margin-bottom: 10px;

}

.simpleFormA .input {

	display: block;

	float: left;

	width: 200px;

}

.simpleFormA br {

	clear: left;

}



.simpleForm {

	background:#E5E5E5 none repeat scroll 0 0;

	border:1px solid #000000;

	margin-top:1em;

	padding:0.5em;

	width: 410px;

}

.simpleForm label {

	display: block;

	float: left;

	width: 200px;

	margin-bottom: 10px;

}

.simpleForm .input {

	display: block;

	float: left;

	width: 200px;

}

.simpleForm br {

	clear: left;

}

.tablaCpanel {

}

.tablaCpanel th, .tablaCpanel td {

	font-size:0.8em;

	margin:0.1em;

	padding:0.1em 0.5em;

	vertical-align:top;

}

.tablaCpanel th {

	background:#D3DCE3 none repeat scroll 0 0;

	color:#000000;

	font-weight:bold;

}

.tablaCpanel td {

	background:#E5E5E5 none repeat scroll 0 0;

}

</style>

<ul>

	<li><a href="?ver=rubros">Rubros</a></li>

	<li><a href="?ver=artistas">Artistas</a></li>

	<li><a href="?ver=temas">Temas</a></li>

	<li><a href="?ver=temasnuevo">Temas Nuevo</a></li>

	<li><a href="?ver=temasxartistas">Temas X Artista</a></li>

	<li><a href="?ver=cd">CD's</a></li>

	<li><a href="?ver=ventas">Ventas Realizadas</a></li>

	<li><a href="?ver=monedas">Monedas</a></li>

</ul>

<?

if (array_key_exists(V("ver"), $rutas)) {

	include $rutas[V("ver")];

}

?>