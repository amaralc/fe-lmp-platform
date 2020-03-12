<?php require_once('../Connections/lmp.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$colname_rsse_01 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_01 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_01 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_01 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_01, "int"));
$rsse_01 = mysql_query($query_rsse_01, $lmp) or die(mysql_error());
$row_rsse_01 = mysql_fetch_assoc($rsse_01);
$totalRows_rsse_01 = mysql_num_rows($rsse_01);

$colname_rsse_02 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_02 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_02 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_02 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_02, "int"));
$rsse_02 = mysql_query($query_rsse_02, $lmp) or die(mysql_error());
$row_rsse_02 = mysql_fetch_assoc($rsse_02);
$totalRows_rsse_02 = mysql_num_rows($rsse_02);

$colname_rsse_03 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_03 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_03 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_03 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_03, "int"));
$rsse_03 = mysql_query($query_rsse_03, $lmp) or die(mysql_error());
$row_rsse_03 = mysql_fetch_assoc($rsse_03);
$totalRows_rsse_03 = mysql_num_rows($rsse_03);

$colname_rsse_04 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_04 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_04 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_04 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_04, "int"));
$rsse_04 = mysql_query($query_rsse_04, $lmp) or die(mysql_error());
$row_rsse_04 = mysql_fetch_assoc($rsse_04);
$totalRows_rsse_04 = mysql_num_rows($rsse_04);

$colname_rsse_05 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_05 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_05 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_05 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_05, "int"));
$rsse_05 = mysql_query($query_rsse_05, $lmp) or die(mysql_error());
$row_rsse_05 = mysql_fetch_assoc($rsse_05);
$totalRows_rsse_05 = mysql_num_rows($rsse_05);

$colname_rsse_06 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_06 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_06 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_06 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_06, "int"));
$rsse_06 = mysql_query($query_rsse_06, $lmp) or die(mysql_error());
$row_rsse_06 = mysql_fetch_assoc($rsse_06);
$totalRows_rsse_06 = mysql_num_rows($rsse_06);

$colname_rsse_07 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_07 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_07 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_07 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_07, "int"));
$rsse_07 = mysql_query($query_rsse_07, $lmp) or die(mysql_error());
$row_rsse_07 = mysql_fetch_assoc($rsse_07);
$totalRows_rsse_07 = mysql_num_rows($rsse_07);

$colname_rsse_08 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_08 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_08 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_08 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_08, "int"));
$rsse_08 = mysql_query($query_rsse_08, $lmp) or die(mysql_error());
$row_rsse_08 = mysql_fetch_assoc($rsse_08);
$totalRows_rsse_08 = mysql_num_rows($rsse_08);

$colname_rsse_09 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_09 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_09 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_09 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_09, "int"));
$rsse_09 = mysql_query($query_rsse_09, $lmp) or die(mysql_error());
$row_rsse_09 = mysql_fetch_assoc($rsse_09);
$totalRows_rsse_09 = mysql_num_rows($rsse_09);

$colname_rsse_10 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsse_10 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsse_10 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.se_10 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsse_10, "int"));
$rsse_10 = mysql_query($query_rsse_10, $lmp) or die(mysql_error());
$row_rsse_10 = mysql_fetch_assoc($rsse_10);
$totalRows_rsse_10 = mysql_num_rows($rsse_10);

$colname_rste_01 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_01 = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rste_01 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_01 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_01, "int"));
$rste_01 = mysql_query($query_rste_01, $lmp) or die(mysql_error());
$row_rste_01 = mysql_fetch_assoc($rste_01);
$totalRows_rste_01 = mysql_num_rows($rste_01);

$colname_rsGrupo = "-1";
if (isset($_GET['id_grupo'])) {
  $colname_rsGrupo = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsGrupo = sprintf("SELECT * FROM grupos WHERE id_grupo = %s", GetSQLValueString($colname_rsGrupo, "int"));
$rsGrupo = mysql_query($query_rsGrupo, $lmp) or die(mysql_error());
$row_rsGrupo = mysql_fetch_assoc($rsGrupo);
$totalRows_rsGrupo = mysql_num_rows($rsGrupo);

$colname_rste_02 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_02 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_02 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_02 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_02, "int"));
$rste_02 = mysql_query($query_rste_02, $lmp) or die(mysql_error());
$row_rste_02 = mysql_fetch_assoc($rste_02);
$totalRows_rste_02 = mysql_num_rows($rste_02);

$colname_rste_03 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_03 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_03 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_03 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_03, "int"));
$rste_03 = mysql_query($query_rste_03, $lmp) or die(mysql_error());
$row_rste_03 = mysql_fetch_assoc($rste_03);
$totalRows_rste_03 = mysql_num_rows($rste_03);

$colname_rste_04 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_04 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_04 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_04 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_04, "int"));
$rste_04 = mysql_query($query_rste_04, $lmp) or die(mysql_error());
$row_rste_04 = mysql_fetch_assoc($rste_04);
$totalRows_rste_04 = mysql_num_rows($rste_04);

$colname_rste_05 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_05 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_05 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_05 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_05, "int"));
$rste_05 = mysql_query($query_rste_05, $lmp) or die(mysql_error());
$row_rste_05 = mysql_fetch_assoc($rste_05);
$totalRows_rste_05 = mysql_num_rows($rste_05);

$colname_rste_06 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_06 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_06 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_06 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_06, "int"));
$rste_06 = mysql_query($query_rste_06, $lmp) or die(mysql_error());
$row_rste_06 = mysql_fetch_assoc($rste_06);
$totalRows_rste_06 = mysql_num_rows($rste_06);

$colname_rste_07 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_07 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_07 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_07 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_07, "int"));
$rste_07 = mysql_query($query_rste_07, $lmp) or die(mysql_error());
$row_rste_07 = mysql_fetch_assoc($rste_07);
$totalRows_rste_07 = mysql_num_rows($rste_07);

$colname_rste_08 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_08 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_08 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_08 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_08, "int"));
$rste_08 = mysql_query($query_rste_08, $lmp) or die(mysql_error());
$row_rste_08 = mysql_fetch_assoc($rste_08);
$totalRows_rste_08 = mysql_num_rows($rste_08);

$colname_rste_09 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_09 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_09 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_09 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_09, "int"));
$rste_09 = mysql_query($query_rste_09, $lmp) or die(mysql_error());
$row_rste_09 = mysql_fetch_assoc($rste_09);
$totalRows_rste_09 = mysql_num_rows($rste_09);

$colname_rste_10 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rste_10 = $_GET['id_grupo'];
}
mysql_select_db($databate_lmp, $lmp);
$query_rste_10 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.te_10 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rste_10, "int"));
$rste_10 = mysql_query($query_rste_10, $lmp) or die(mysql_error());
$row_rste_10 = mysql_fetch_assoc($rste_10);
$totalRows_rste_10 = mysql_num_rows($rste_10);

$colname_rsqa_01 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_01 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_01 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_01 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_01, "int"));
$rsqa_01 = mysql_query($query_rsqa_01, $lmp) or die(mysql_error());
$row_rsqa_01 = mysql_fetch_assoc($rsqa_01);
$totalRows_rsqa_01 = mysql_num_rows($rsqa_01);

$colname_rsqa_02 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_02 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_02 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_02 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_02, "int"));
$rsqa_02 = mysql_query($query_rsqa_02, $lmp) or die(mysql_error());
$row_rsqa_02 = mysql_fetch_assoc($rsqa_02);
$totalRows_rsqa_02 = mysql_num_rows($rsqa_02);

$colname_rsqa_03 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_03 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_03 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_03 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_03, "int"));
$rsqa_03 = mysql_query($query_rsqa_03, $lmp) or die(mysql_error());
$row_rsqa_03 = mysql_fetch_assoc($rsqa_03);
$totalRows_rsqa_03 = mysql_num_rows($rsqa_03);

$colname_rsqa_04 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_04 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_04 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_04 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_04, "int"));
$rsqa_04 = mysql_query($query_rsqa_04, $lmp) or die(mysql_error());
$row_rsqa_04 = mysql_fetch_assoc($rsqa_04);
$totalRows_rsqa_04 = mysql_num_rows($rsqa_04);

$colname_rsqa_05 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_05 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_05 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_05 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_05, "int"));
$rsqa_05 = mysql_query($query_rsqa_05, $lmp) or die(mysql_error());
$row_rsqa_05 = mysql_fetch_assoc($rsqa_05);
$totalRows_rsqa_05 = mysql_num_rows($rsqa_05);

$colname_rsqa_06 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_06 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_06 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_06 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_06, "int"));
$rsqa_06 = mysql_query($query_rsqa_06, $lmp) or die(mysql_error());
$row_rsqa_06 = mysql_fetch_assoc($rsqa_06);
$totalRows_rsqa_06 = mysql_num_rows($rsqa_06);

$colname_rsqa_07 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_07 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_07 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_07 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_07, "int"));
$rsqa_07 = mysql_query($query_rsqa_07, $lmp) or die(mysql_error());
$row_rsqa_07 = mysql_fetch_assoc($rsqa_07);
$totalRows_rsqa_07 = mysql_num_rows($rsqa_07);

$colname_rsqa_08 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_08 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_08 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_08 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_08, "int"));
$rsqa_08 = mysql_query($query_rsqa_08, $lmp) or die(mysql_error());
$row_rsqa_08 = mysql_fetch_assoc($rsqa_08);
$totalRows_rsqa_08 = mysql_num_rows($rsqa_08);

$colname_rsqa_09 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_09 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_09 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_09 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_09, "int"));
$rsqa_09 = mysql_query($query_rsqa_09, $lmp) or die(mysql_error());
$row_rsqa_09 = mysql_fetch_assoc($rsqa_09);
$totalRows_rsqa_09 = mysql_num_rows($rsqa_09);

$colname_rsqa_10 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqa_10 = $_GET['id_grupo'];
}
mysql_select_db($databaqa_lmp, $lmp);
$query_rsqa_10 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qa_10 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqa_10, "int"));
$rsqa_10 = mysql_query($query_rsqa_10, $lmp) or die(mysql_error());
$row_rsqa_10 = mysql_fetch_assoc($rsqa_10);
$totalRows_rsqa_10 = mysql_num_rows($rsqa_10);

$colname_rsqi_01 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_01 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_01 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_01 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_01, "int"));
$rsqi_01 = mysql_query($query_rsqi_01, $lmp) or die(mysql_error());
$row_rsqi_01 = mysql_fetch_assoc($rsqi_01);
$totalRows_rsqi_01 = mysql_num_rows($rsqi_01);

$colname_rsqi_02 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_02 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_02 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_02 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_02, "int"));
$rsqi_02 = mysql_query($query_rsqi_02, $lmp) or die(mysql_error());
$row_rsqi_02 = mysql_fetch_assoc($rsqi_02);
$totalRows_rsqi_02 = mysql_num_rows($rsqi_02);

$colname_rsqi_03 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_03 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_03 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_03 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_03, "int"));
$rsqi_03 = mysql_query($query_rsqi_03, $lmp) or die(mysql_error());
$row_rsqi_03 = mysql_fetch_assoc($rsqi_03);
$totalRows_rsqi_03 = mysql_num_rows($rsqi_03);

$colname_rsqi_04 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_04 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_04 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_04 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_04, "int"));
$rsqi_04 = mysql_query($query_rsqi_04, $lmp) or die(mysql_error());
$row_rsqi_04 = mysql_fetch_assoc($rsqi_04);
$totalRows_rsqi_04 = mysql_num_rows($rsqi_04);

$colname_rsqi_05 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_05 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_05 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_05 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_05, "int"));
$rsqi_05 = mysql_query($query_rsqi_05, $lmp) or die(mysql_error());
$row_rsqi_05 = mysql_fetch_assoc($rsqi_05);
$totalRows_rsqi_05 = mysql_num_rows($rsqi_05);

$colname_rsqi_06 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_06 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_06 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_06 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_06, "int"));
$rsqi_06 = mysql_query($query_rsqi_06, $lmp) or die(mysql_error());
$row_rsqi_06 = mysql_fetch_assoc($rsqi_06);
$totalRows_rsqi_06 = mysql_num_rows($rsqi_06);

$colname_rsqi_07 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_07 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_07 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_07 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_07, "int"));
$rsqi_07 = mysql_query($query_rsqi_07, $lmp) or die(mysql_error());
$row_rsqi_07 = mysql_fetch_assoc($rsqi_07);
$totalRows_rsqi_07 = mysql_num_rows($rsqi_07);

$colname_rsqi_08 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_08 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_08 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_08 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_08, "int"));
$rsqi_08 = mysql_query($query_rsqi_08, $lmp) or die(mysql_error());
$row_rsqi_08 = mysql_fetch_assoc($rsqi_08);
$totalRows_rsqi_08 = mysql_num_rows($rsqi_08);

$colname_rsqi_09 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_09 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_09 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_09 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_09, "int"));
$rsqi_09 = mysql_query($query_rsqi_09, $lmp) or die(mysql_error());
$row_rsqi_09 = mysql_fetch_assoc($rsqi_09);
$totalRows_rsqi_09 = mysql_num_rows($rsqi_09);

$colname_rsqi_10 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsqi_10 = $_GET['id_grupo'];
}
mysql_select_db($databaqi_lmp, $lmp);
$query_rsqi_10 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.qi_10 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rsqi_10, "int"));
$rsqi_10 = mysql_query($query_rsqi_10, $lmp) or die(mysql_error());
$row_rsqi_10 = mysql_fetch_assoc($rsqi_10);
$totalRows_rsqi_10 = mysql_num_rows($rsqi_10);

$colname_rssx_01 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_01 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_01 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_01 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_01, "int"));
$rssx_01 = mysql_query($query_rssx_01, $lmp) or die(mysql_error());
$row_rssx_01 = mysql_fetch_assoc($rssx_01);
$totalRows_rssx_01 = mysql_num_rows($rssx_01);

$colname_rssx_02 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_02 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_02 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_02 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_02, "int"));
$rssx_02 = mysql_query($query_rssx_02, $lmp) or die(mysql_error());
$row_rssx_02 = mysql_fetch_assoc($rssx_02);
$totalRows_rssx_02 = mysql_num_rows($rssx_02);

$colname_rssx_03 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_03 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_03 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_03 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_03, "int"));
$rssx_03 = mysql_query($query_rssx_03, $lmp) or die(mysql_error());
$row_rssx_03 = mysql_fetch_assoc($rssx_03);
$totalRows_rssx_03 = mysql_num_rows($rssx_03);

$colname_rssx_04 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_04 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_04 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_04 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_04, "int"));
$rssx_04 = mysql_query($query_rssx_04, $lmp) or die(mysql_error());
$row_rssx_04 = mysql_fetch_assoc($rssx_04);
$totalRows_rssx_04 = mysql_num_rows($rssx_04);

$colname_rssx_05 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_05 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_05 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_05 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_05, "int"));
$rssx_05 = mysql_query($query_rssx_05, $lmp) or die(mysql_error());
$row_rssx_05 = mysql_fetch_assoc($rssx_05);
$totalRows_rssx_05 = mysql_num_rows($rssx_05);

$colname_rssx_06 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_06 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_06 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_06 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_06, "int"));
$rssx_06 = mysql_query($query_rssx_06, $lmp) or die(mysql_error());
$row_rssx_06 = mysql_fetch_assoc($rssx_06);
$totalRows_rssx_06 = mysql_num_rows($rssx_06);

$colname_rssx_07 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_07 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_07 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_07 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_07, "int"));
$rssx_07 = mysql_query($query_rssx_07, $lmp) or die(mysql_error());
$row_rssx_07 = mysql_fetch_assoc($rssx_07);
$totalRows_rssx_07 = mysql_num_rows($rssx_07);

$colname_rssx_08 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_08 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_08 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_08 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_08, "int"));
$rssx_08 = mysql_query($query_rssx_08, $lmp) or die(mysql_error());
$row_rssx_08 = mysql_fetch_assoc($rssx_08);
$totalRows_rssx_08 = mysql_num_rows($rssx_08);

$colname_rssx_09 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_09 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_09 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_09 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_09, "int"));
$rssx_09 = mysql_query($query_rssx_09, $lmp) or die(mysql_error());
$row_rssx_09 = mysql_fetch_assoc($rssx_09);
$totalRows_rssx_09 = mysql_num_rows($rssx_09);

$colname_rssx_10 = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rssx_10 = $_GET['id_grupo'];
}
mysql_select_db($databasx_lmp, $lmp);
$query_rssx_10 = sprintf("SELECT M.membro_apelido FROM .membros M WHERE M.sx_10 = 'Y' AND M.membro_tipo = '1' ORDER BY M.membro_apelido ASC", GetSQLValueString($colname_rssx_10, "int"));
$rssx_10 = mysql_query($query_rssx_10, $lmp) or die(mysql_error());
$row_rssx_10 = mysql_fetch_assoc($rssx_10);
$totalRows_rssx_10 = mysql_num_rows($rssx_10);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Horário de Todos os Membros do Laboratório</p>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr class="tituloTabela">
    <td class="tituloTabela">Horário</td>
    <td>Segunda-Feira</td>
    <td>Terça-Feira</td>
    <td>Quarta-Feira</td>
    <td>Quinta Feira</td>
    <td>Sexta-Feira</td>
  </tr>
  <tr>
    <td class="tituloTabela">7h30</td>
  <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsse_01['membro_apelido']; ?><br />
    <?php } while ($row_rsse_01 = mysql_fetch_assoc($rsse_01)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rste_01['membro_apelido']; ?><br />
    <?php } while ($row_rste_01 = mysql_fetch_assoc($rste_01)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqa_01['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_01 = mysql_fetch_assoc($rsqa_01)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqi_01['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_01 = mysql_fetch_assoc($rsqi_01)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rssx_01['membro_apelido']; ?><br />
    <?php } while ($row_rssx_01 = mysql_fetch_assoc($rssx_01)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">8h20</td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsse_02['membro_apelido']; ?><br />
    <?php } while ($row_rsse_02 = mysql_fetch_assoc($rsse_02)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rste_02['membro_apelido']; ?><br />
    <?php } while ($row_rste_02 = mysql_fetch_assoc($rste_02)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqa_02['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_02 = mysql_fetch_assoc($rsqa_02)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqi_02['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_02 = mysql_fetch_assoc($rsqi_02)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rssx_02['membro_apelido']; ?><br />
    <?php } while ($row_rssx_02 = mysql_fetch_assoc($rssx_02)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">9h10</td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsse_03['membro_apelido']; ?><br />
    <?php } while ($row_rsse_03 = mysql_fetch_assoc($rsse_03)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rste_03['membro_apelido']; ?><br />
    <?php } while ($row_rste_03 = mysql_fetch_assoc($rste_03)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqa_03['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_03 = mysql_fetch_assoc($rsqa_03)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqi_03['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_03 = mysql_fetch_assoc($rsqi_03)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rssx_03['membro_apelido']; ?><br />
    <?php } while ($row_rssx_03 = mysql_fetch_assoc($rssx_03)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">10h20</td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsse_04['membro_apelido']; ?><br />
    <?php } while ($row_rsse_04 = mysql_fetch_assoc($rsse_04)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rste_04['membro_apelido']; ?><br />
    <?php } while ($row_rste_04 = mysql_fetch_assoc($rste_04)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqa_04['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_04 = mysql_fetch_assoc($rsqa_04)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqi_04['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_04 = mysql_fetch_assoc($rsqi_04)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rssx_04['membro_apelido']; ?><br />
    <?php } while ($row_rssx_04 = mysql_fetch_assoc($rssx_04)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">11h10</td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsse_05['membro_apelido']; ?><br />
    <?php } while ($row_rsse_05 = mysql_fetch_assoc($rsse_05)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rste_05['membro_apelido']; ?><br />
    <?php } while ($row_rste_05 = mysql_fetch_assoc($rste_05)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqa_05['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_05 = mysql_fetch_assoc($rsqa_05)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqi_05['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_05 = mysql_fetch_assoc($rsqi_05)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rssx_05['membro_apelido']; ?><br />
    <?php } while ($row_rssx_05 = mysql_fetch_assoc($rssx_05)); ?><br /></td>
  </tr>
  <tr class="tituloTabela">
    <td colspan="6">Almoço</td>
  </tr>
  <tr>
    <td class="tituloTabela">13h30</td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsse_06['membro_apelido']; ?><br />
    <?php } while ($row_rsse_06 = mysql_fetch_assoc($rsse_06)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rste_06['membro_apelido']; ?><br />
    <?php } while ($row_rste_06 = mysql_fetch_assoc($rste_06)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqa_06['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_06 = mysql_fetch_assoc($rsqa_06)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqi_06['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_06 = mysql_fetch_assoc($rsqi_06)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rssx_06['membro_apelido']; ?><br />
    <?php } while ($row_rssx_06 = mysql_fetch_assoc($rssx_06)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">14h20</td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsse_07['membro_apelido']; ?><br />
    <?php } while ($row_rsse_07 = mysql_fetch_assoc($rsse_07)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rste_07['membro_apelido']; ?><br />
    <?php } while ($row_rste_07 = mysql_fetch_assoc($rste_07)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqa_07['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_07 = mysql_fetch_assoc($rsqa_07)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqi_07['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_07 = mysql_fetch_assoc($rsqi_07)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rssx_07['membro_apelido']; ?><br />
    <?php } while ($row_rssx_07 = mysql_fetch_assoc($rssx_07)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">15h10</td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsse_08['membro_apelido']; ?><br />
    <?php } while ($row_rsse_08 = mysql_fetch_assoc($rsse_08)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rste_08['membro_apelido']; ?><br />
    <?php } while ($row_rste_08 = mysql_fetch_assoc($rste_08)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqa_08['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_08 = mysql_fetch_assoc($rsqa_08)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqi_08['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_08 = mysql_fetch_assoc($rsqi_08)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rssx_08['membro_apelido']; ?><br />
    <?php } while ($row_rssx_08 = mysql_fetch_assoc($rssx_08)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">16h20</td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsse_09['membro_apelido']; ?><br />
    <?php } while ($row_rsse_09 = mysql_fetch_assoc($rsse_09)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rste_09['membro_apelido']; ?><br />
    <?php } while ($row_rste_09 = mysql_fetch_assoc($rste_09)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqa_09['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_09 = mysql_fetch_assoc($rsqa_09)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rsqi_09['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_09 = mysql_fetch_assoc($rsqi_09)); ?><br /></td>
    <td class="tabelaHorario"><?php do { ?>
          <?php echo $row_rssx_09['membro_apelido']; ?><br />
    <?php } while ($row_rssx_09 = mysql_fetch_assoc($rssx_09)); ?><br /></td>
  </tr>
  <tr>
    <td class="tituloTabela">17h21</td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsse_10['membro_apelido']; ?><br />
    <?php } while ($row_rsse_10 = mysql_fetch_assoc($rsse_10)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rste_10['membro_apelido']; ?><br />
    <?php } while ($row_rste_10 = mysql_fetch_assoc($rste_10)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqa_10['membro_apelido']; ?><br />
    <?php } while ($row_rsqa_10 = mysql_fetch_assoc($rsqa_10)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rsqi_10['membro_apelido']; ?><br />
    <?php } while ($row_rsqi_10 = mysql_fetch_assoc($rsqi_10)); ?><br /></td>
    <td class="tabelaHorario2"><?php do { ?>
          <?php echo $row_rssx_10['membro_apelido']; ?><br />
    <?php } while ($row_rssx_10 = mysql_fetch_assoc($rssx_10)); ?><br /></td>
  </tr>
  <tr class="tituloTabela">
    <td colspan="6">Feierabend</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsse_01);

mysql_free_result($rsse_02);

mysql_free_result($rsse_04);

mysql_free_result($rsse_06);

mysql_free_result($rsse_07);

mysql_free_result($rsse_08);

mysql_free_result($rsse_09);

mysql_free_result($rsse_10);

mysql_free_result($rste_01);

mysql_free_result($rsGrupo);

mysql_free_result($rsse_05);

mysql_free_result($rsse_03);

mysql_free_result($rsSe_01);
?>
