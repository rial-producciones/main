<?php require_once('../Connections/rialprod.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_rialprod = new KT_connection($rialprod, $database_rialprod);

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

// Filter
$tfi_listtemas1 = new TFI_TableFilter($conn_rialprod, "tfi_listtemas1");
$tfi_listtemas1->addColumn("temas.id_artista", "NUMERIC_TYPE", "id_artista", "=");
$tfi_listtemas1->addColumn("temas.nombre", "STRING_TYPE", "nombre", "%");
$tfi_listtemas1->addColumn("temas.tipo", "NUMERIC_TYPE", "tipo", "=");
$tfi_listtemas1->addColumn("temas.precio", "NUMERIC_TYPE", "precio", "=");
$tfi_listtemas1->addColumn("temas.internacional", "NUMERIC_TYPE", "internacional", "=");
$tfi_listtemas1->addColumn("temas.id_rubro", "NUMERIC_TYPE", "id_rubro", "=");
$tfi_listtemas1->Execute();

// Sorter
$tso_listtemas1 = new TSO_TableSorter("rstemas1", "tso_listtemas1");
$tso_listtemas1->addColumn("temas.id_artista");
$tso_listtemas1->addColumn("temas.nombre");
$tso_listtemas1->addColumn("temas.tipo");
$tso_listtemas1->addColumn("temas.precio");
$tso_listtemas1->addColumn("temas.internacional");
$tso_listtemas1->addColumn("temas.id_rubro");
$tso_listtemas1->setDefault("temas.id_artista");
$tso_listtemas1->Execute();

// Navigation
$nav_listtemas1 = new NAV_Regular("nav_listtemas1", "rstemas1", "../", $_SERVER['PHP_SELF'], 30);

//NeXTenesio3 Special List Recordset
$maxRows_rstemas1 = $_SESSION['max_rows_nav_listtemas1'];
$pageNum_rstemas1 = 0;
if (isset($_GET['pageNum_rstemas1'])) {
  $pageNum_rstemas1 = $_GET['pageNum_rstemas1'];
}
$startRow_rstemas1 = $pageNum_rstemas1 * $maxRows_rstemas1;

// Defining List Recordset variable
$NXTFilter_rstemas1 = "1=1";
if (isset($_SESSION['filter_tfi_listtemas1'])) {
  $NXTFilter_rstemas1 = $_SESSION['filter_tfi_listtemas1'];
}
// Defining List Recordset variable
$NXTSort_rstemas1 = "temas.id_artista";
if (isset($_SESSION['sorter_tso_listtemas1'])) {
  $NXTSort_rstemas1 = $_SESSION['sorter_tso_listtemas1'];
}
mysql_select_db($database_rialprod, $rialprod);

$query_rstemas1 = "SELECT temas.id_artista, temas.nombre, temas.tipo, temas.precio, temas.internacional, temas.id_rubro, temas.id FROM temas WHERE {$NXTFilter_rstemas1} ORDER BY {$NXTSort_rstemas1}";
$query_limit_rstemas1 = sprintf("%s LIMIT %d, %d", $query_rstemas1, $startRow_rstemas1, $maxRows_rstemas1);
$rstemas1 = mysql_query($query_limit_rstemas1, $rialprod) or die(mysql_error());
$row_rstemas1 = mysql_fetch_assoc($rstemas1);

if (isset($_GET['totalRows_rstemas1'])) {
  $totalRows_rstemas1 = $_GET['totalRows_rstemas1'];
} else {
  $all_rstemas1 = mysql_query($query_rstemas1);
  $totalRows_rstemas1 = mysql_num_rows($all_rstemas1);
}
$totalPages_rstemas1 = ceil($totalRows_rstemas1/$maxRows_rstemas1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtemas1->checkBoundries();
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
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_id_artista {width:140px; overflow:hidden;}
  .KT_col_nombre {width:140px; overflow:hidden;}
  .KT_col_tipo {width:140px; overflow:hidden;}
  .KT_col_precio {width:140px; overflow:hidden;}
  .KT_col_internacional {width:140px; overflow:hidden;}
  .KT_col_id_rubro {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listtemas1">
  <h1> Temas
    <?php
  $nav_listtemas1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listtemas1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtemas1'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listtemas1']; ?>
          <?php 
  // else Conditional region1
  } else { ?>
          <?php echo NXT_getResource("all"); ?>
          <?php } 
  // endif Conditional region1
?>
        <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
        <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listtemas1'] == 1) {
?>
          <a href="<?php echo $tfi_listtemas1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listtemas1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="id_artista" class="KT_sorter KT_col_id_artista <?php echo $tso_listtemas1->getSortIcon('temas.id_artista'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.id_artista'); ?>">Id_artista</a></th>
            <th id="nombre" class="KT_sorter KT_col_nombre <?php echo $tso_listtemas1->getSortIcon('temas.nombre'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.nombre'); ?>">Nombre</a></th>
            <th id="tipo" class="KT_sorter KT_col_tipo <?php echo $tso_listtemas1->getSortIcon('temas.tipo'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.tipo'); ?>">Tipo</a></th>
            <th id="precio" class="KT_sorter KT_col_precio <?php echo $tso_listtemas1->getSortIcon('temas.precio'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.precio'); ?>">Precio</a></th>
            <th id="internacional" class="KT_sorter KT_col_internacional <?php echo $tso_listtemas1->getSortIcon('temas.internacional'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.internacional'); ?>">Internacional</a></th>
            <th id="id_rubro" class="KT_sorter KT_col_id_rubro <?php echo $tso_listtemas1->getSortIcon('temas.id_rubro'); ?>"> <a href="<?php echo $tso_listtemas1->getSortLink('temas.id_rubro'); ?>">Id_rubro</a></th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtemas1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listtemas1_id_artista" id="tfi_listtemas1_id_artista" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_id_artista']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtemas1_nombre" id="tfi_listtemas1_nombre" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_nombre']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listtemas1_tipo" id="tfi_listtemas1_tipo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_tipo']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtemas1_precio" id="tfi_listtemas1_precio" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_precio']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtemas1_internacional" id="tfi_listtemas1_internacional" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_internacional']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtemas1_id_rubro" id="tfi_listtemas1_id_rubro" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtemas1_id_rubro']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listtemas1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rstemas1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="8"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rstemas1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_temas" class="id_checkbox" value="<?php echo $row_rstemas1['id']; ?>" />
                  <input type="hidden" name="id" class="id_field" value="<?php echo $row_rstemas1['id']; ?>" /></td>
                <td><div class="KT_col_id_artista"><?php echo KT_FormatForList($row_rstemas1['id_artista'], 20); ?></div></td>
                <td><div class="KT_col_nombre"><?php echo KT_FormatForList($row_rstemas1['nombre'], 20); ?></div></td>
                <td><div class="KT_col_tipo"><?php echo KT_FormatForList($row_rstemas1['tipo'], 20); ?></div></td>
                <td><div class="KT_col_precio"><?php echo KT_FormatForList($row_rstemas1['precio'], 20); ?></div></td>
                <td><div class="KT_col_internacional"><?php echo KT_FormatForList($row_rstemas1['internacional'], 20); ?></div></td>
                <td><div class="KT_col_id_rubro"><?php echo KT_FormatForList($row_rstemas1['id_rubro'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="subirtemas2.php?id=<?php echo $row_rstemas1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
              </tr>
              <?php } while ($row_rstemas1 = mysql_fetch_assoc($rstemas1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listtemas1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="20">20</option>
        </select>
        <a class="KT_additem_op_link" href="subirtemas2.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rstemas1);
?>
