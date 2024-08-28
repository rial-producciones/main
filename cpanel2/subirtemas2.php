<?php require_once('../Connections/rialprod.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_rialprod = new KT_connection($rialprod, $database_rialprod);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_rialprod, $rialprod);
$query_artista = "SELECT * FROM artistas";
$artista = mysql_query($query_artista, $rialprod) or die(mysql_error());
$row_artista = mysql_fetch_assoc($artista);
$totalRows_artista = mysql_num_rows($artista);

mysql_select_db($database_rialprod, $rialprod);
$query_rubro = "SELECT * FROM rubros";
$rubro = mysql_query($query_rubro, $rialprod) or die(mysql_error());
$row_rubro = mysql_fetch_assoc($rubro);
$totalRows_rubro = mysql_num_rows($rubro);

// Make an insert transaction instance
$ins_temas = new tNG_multipleInsert($conn_rialprod);
$tNGs->addTransaction($ins_temas);
// Register triggers
$ins_temas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_temas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_temas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_temas->setTable("temas");
$ins_temas->addColumn("id_artista", "NUMERIC_TYPE", "POST", "id_artista");
$ins_temas->addColumn("nombre", "STRING_TYPE", "POST", "nombre");
$ins_temas->addColumn("tipo", "NUMERIC_TYPE", "POST", "tipo");
$ins_temas->addColumn("precio", "NUMERIC_TYPE", "POST", "precio");
$ins_temas->addColumn("internacional", "NUMERIC_TYPE", "POST", "internacional");
$ins_temas->addColumn("id_rubro", "NUMERIC_TYPE", "POST", "id_rubro");
$ins_temas->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_temas = new tNG_multipleUpdate($conn_rialprod);
$tNGs->addTransaction($upd_temas);
// Register triggers
$upd_temas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_temas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_temas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_temas->setTable("temas");
$upd_temas->addColumn("id_artista", "NUMERIC_TYPE", "POST", "id_artista");
$upd_temas->addColumn("nombre", "STRING_TYPE", "POST", "nombre");
$upd_temas->addColumn("tipo", "NUMERIC_TYPE", "POST", "tipo");
$upd_temas->addColumn("precio", "NUMERIC_TYPE", "POST", "precio");
$upd_temas->addColumn("internacional", "NUMERIC_TYPE", "POST", "internacional");
$upd_temas->addColumn("id_rubro", "NUMERIC_TYPE", "POST", "id_rubro");
$upd_temas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_temas = new tNG_multipleDelete($conn_rialprod);
$tNGs->addTransaction($del_temas);
// Register triggers
$del_temas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_temas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_temas->setTable("temas");
$del_temas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstemas = $tNGs->getRecordset("temas");
$row_rstemas = mysql_fetch_assoc($rstemas);
$totalRows_rstemas = mysql_num_rows($rstemas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Temas </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rstemas > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="id_artista_<?php echo $cnt1; ?>">Id_artista:</label></td>
            <td><select name="id_artista_<?php echo $cnt1; ?>" id="id_artista_<?php echo $cnt1; ?>">
              <option value="menuitem1" <?php if (!(strcmp("menuitem1", KT_escapeAttribute($row_rstemas['id_artista'])))) {echo "selected=\"selected\"";} ?>>[ Etiqueta ]</option>
              <option value="menuitem2" <?php if (!(strcmp("menuitem2", KT_escapeAttribute($row_rstemas['id_artista'])))) {echo "selected=\"selected\"";} ?>>[ Etiqueta ]</option>
              <?php
do {  
?>
              <option value="<?php echo $row_artista['id']?>"<?php if (!(strcmp($row_artista['id'], KT_escapeAttribute($row_rstemas['id_artista'])))) {echo "selected=\"selected\"";} ?>><?php echo $row_artista['nombre']?></option>
              <?php
} while ($row_artista = mysql_fetch_assoc($artista));
  $rows = mysql_num_rows($artista);
  if($rows > 0) {
      mysql_data_seek($artista, 0);
	  $row_artista = mysql_fetch_assoc($artista);
  }
?>
            </select>
              <?php echo $tNGs->displayFieldError("temas", "id_artista", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="nombre_<?php echo $cnt1; ?>">Nombre:</label></td>
            <td><input type="text" name="nombre_<?php echo $cnt1; ?>" id="nombre_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstemas['nombre']); ?>" size="32" maxlength="255" />
              <?php echo $tNGs->displayFieldHint("nombre");?> <?php echo $tNGs->displayFieldError("temas", "nombre", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="tipo_<?php echo $cnt1; ?>">Tipo:</label></td>
            <td><input type="text" name="tipo_<?php echo $cnt1; ?>" id="tipo_<?php echo $cnt1; ?>" value="2" size="6" />
            <?php echo $tNGs->displayFieldHint("tipo");?> <?php echo $tNGs->displayFieldError("temas", "tipo", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="precio_<?php echo $cnt1; ?>">Precio:</label></td>
            <td><input type="text" name="precio_<?php echo $cnt1; ?>" id="precio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstemas['precio']); ?>" size="6" />
              <?php echo $tNGs->displayFieldHint("precio");?> <?php echo $tNGs->displayFieldError("temas", "precio", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="internacional_<?php echo $cnt1; ?>">Internacional:</label></td>
            <td><input type="text" name="internacional_<?php echo $cnt1; ?>" id="internacional_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstemas['internacional']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("internacional");?> <?php echo $tNGs->displayFieldError("temas", "internacional", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="id_rubro_<?php echo $cnt1; ?>">Id_rubro:</label></td>
            <td><select name="id_rubro_<?php echo $cnt1; ?>" id="id_rubro_<?php echo $cnt1; ?>">
              <option value="menuitem1" <?php if (!(strcmp("menuitem1", KT_escapeAttribute($row_rstemas['id_rubro'])))) {echo "selected=\"selected\"";} ?>>[ Etiqueta ]</option>
              <option value="menuitem2" <?php if (!(strcmp("menuitem2", KT_escapeAttribute($row_rstemas['id_rubro'])))) {echo "selected=\"selected\"";} ?>>[ Etiqueta ]</option>
              <?php
do {  
?>
              <option value="<?php echo $row_rubro['id']?>"<?php if (!(strcmp($row_rubro['id'], KT_escapeAttribute($row_rstemas['id_rubro'])))) {echo "selected=\"selected\"";} ?>><?php echo $row_rubro['nombre']?></option>
              <?php
} while ($row_rubro = mysql_fetch_assoc($rubro));
  $rows = mysql_num_rows($rubro);
  if($rows > 0) {
      mysql_data_seek($rubro, 0);
	  $row_rubro = mysql_fetch_assoc($rubro);
  }
?>
            </select>
              <?php echo $tNGs->displayFieldError("temas", "id_rubro", $cnt1); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_temas_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstemas['kt_pk_temas']); ?>" />
        <?php } while ($row_rstemas = mysql_fetch_assoc($rstemas)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
<input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($artista);

mysql_free_result($rubro);
?>
