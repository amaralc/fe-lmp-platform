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

if ((isset($_GET['id_exclui'])) && ($_GET['id_exclui'] != "")) {
  $deleteSQL = sprintf("DELETE FROM vinc_membros_grupos WHERE id_chave=%s",
                       GetSQLValueString($_GET['id_exclui'], "int"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($deleteSQL, $lmp) or die(mysql_error());

  $deleteGoTo = "membro_grupo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rsExcluiDoGrupo = "-1";
if (isset($_GET['id_exclui'])) {
  $colname_rsExcluiDoGrupo = $_GET['id_exclui'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsExcluiDoGrupo = sprintf("SELECT * FROM vinc_membros_grupos WHERE id_chave = %s", GetSQLValueString($colname_rsExcluiDoGrupo, "int"));
$rsExcluiDoGrupo = mysql_query($query_rsExcluiDoGrupo, $lmp) or die(mysql_error());
$row_rsExcluiDoGrupo = mysql_fetch_assoc($rsExcluiDoGrupo);
$totalRows_rsExcluiDoGrupo = mysql_num_rows($rsExcluiDoGrupo);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exclui Membro do Grupo</title>
</head>

<body>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsExcluiDoGrupo);
?>
