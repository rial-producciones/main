<?php
session_start();
$v=$_POST['valor'];
$nc=$_POST['nc'];
$int=$_POST['int'];
?>      <script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/jquery.form.js"></script> 
 
<script type="text/javascript">
    $('document').ready(function(){	
	$('#f').ajaxForm( {
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
						
            });
        </script> 
<style type="text/css">
.dondeo{/*para Firefox*/
-moz-border-radius: 5px 5px 5px 5px;
/*para Safari y Chrome*/
-webkit-border-radius: 5px 5px 5px 5px;
/* para Opera */
border-radius: 5px 5px 5px 5px;
}
.cont-sistema-cuotas{ width:235px; color:#FFF; font-size:11px; font-family:Arial, Helvetica, sans-serif; position:relative;}
.cont-sistema-cuotas .sistema-cuotas{ padding:10px; background-color:#000; text-align:left; }
.cont-sistema-cuotas .titulos-mini{ font-size:12px; color:#FFF;}
.cont-sistema-cuotas label{ font-size:10px; color:#FFF;}
.cont-sistema-cuotas input{ border:1px solid #C00; margin:5px; padding:5px;}
.cont-sistema-cuotas #nc { border:1px solid #C00; margin:5px; padding:5px;}
.cont-sistema-cuotas #buscar { border:1px solid #C00; margin:2px; padding:2px; cursor:pointer;}
.cont-sistema-cuotas .resultado { width:170px; background-color:#FFF; border:#999 1px solid; color:#000; font-size:12px; padding:5px;}
.cont-sistema-cuotas p { margin:0; padding:0px;}
.cont-sistema-cuotas .frase{
	color: #F00;
	font-size: 15px;
	text-align: center;
	line-height: 25px;
}

</style>

<div class="cont-sistema-cuotas">
<div id="preview" style="position:absolute; width:198px; height:210px; left: 232px; top: 0px;"> </div>
  <div class="sistema-cuotas dondeo">
    <p class="titulos-mini">
      
      <script language="javascript">
function copy_address() {
    document.getElementById('totalcuotas').value = document.getElementById('pcuota').value;
}
</script>
      <script type="text/javascript">

function setOptions(chosen) {
var selbox = document.f.int;

selbox.options.length = 0;
if (chosen == "") {
  selbox.options[selbox.options.length] = new Option('seleccione las cuotas',' ');
}
if (chosen == "1") {
  selbox.options[selbox.options.length] = new Option('1','1');
}
if (chosen == "2") {
  selbox.options[selbox.options.length] = new Option('1','1');
}
if (chosen == "3") {
  selbox.options[selbox.options.length] = new Option('1','1');
}
if (chosen == "6") {
  selbox.options[selbox.options.length] = new Option('25','25');
}
if (chosen == "12") {
  selbox.options[selbox.options.length] = new Option('50','50');
}
if (chosen == "18") {
  selbox.options[selbox.options.length] = new Option('75','75');
}
if (chosen == "24") {
  selbox.options[selbox.options.length] = new Option('100','100');
}
}
      </script>
      
      <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    </p>
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
   <div id="formbo">
  <form action='intereses-r.php' name="f" method="post" id="f">
    <p><span id="sprytextfield01">IMPORTE ACTUAL<br>
     
  <input name='valor' id='valor' size=5 class="dondeo" value="<?php echo $costoTotal; ?>">

      <br>
      <span class="textfieldRequiredMsg">Ingrese Total de la compra</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></p>
    <p>&nbsp;</p>
    <p><span id="spryselect1">
      <label>SELECCIONE LA CANTIDAD DE CUOTAS<br>
        </label>
      <select class="dondeo" name="nc" id="nc" size="1" onChange="setOptions(document.f.nc.options[document.f.nc.selectedIndex].value);">
        <option value="">Cuotas</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="12">12</option>
        <option value="18">18</option>
        <option value="24">24</option>
        </select>
      <br>
  <span class="selectRequiredMsg">Debe seleccionar las cuotas</span></span><br>&nbsp;<br>
      
      <select name="int" size="1" style="display:none; visibility:hidden;">
        <option selected="selected" value="oneone" style="display:none; visibility:hidden;"></option>
        <option value="onetwo" style="display:none; visibility:hidden;" ></option>
        </select>
      </p>
    <p>                 
      <input type='submit' class="dondeo" id="buscar" value='Calcular' name='buscar'><br>
      </p>
  </form>
  </div>

  
</div>
</div>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
</script>