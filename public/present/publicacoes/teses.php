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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsTeses = 15;
$pageNum_rsTeses = 0;
if (isset($_GET['pageNum_rsTeses'])) {
  $pageNum_rsTeses = $_GET['pageNum_rsTeses'];
}
$startRow_rsTeses = $pageNum_rsTeses * $maxRows_rsTeses;

mysql_select_db($database_lmp, $lmp);
$query_rsTeses = "SELECT * FROM dissertacoes ORDER BY ano DESC";
$query_limit_rsTeses = sprintf("%s LIMIT %d, %d", $query_rsTeses, $startRow_rsTeses, $maxRows_rsTeses);
$rsTeses = mysql_query($query_limit_rsTeses, $lmp) or die(mysql_error());
$row_rsTeses = mysql_fetch_assoc($rsTeses);

if (isset($_GET['totalRows_rsTeses'])) {
  $totalRows_rsTeses = $_GET['totalRows_rsTeses'];
} else {
  $all_rsTeses = mysql_query($query_rsTeses);
  $totalRows_rsTeses = mysql_num_rows($all_rsTeses);
}
$totalPages_rsTeses = ceil($totalRows_rsTeses/$maxRows_rsTeses)-1;

$queryString_rsTeses = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsTeses") == false && 
        stristr($param, "totalRows_rsTeses") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsTeses = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsTeses = sprintf("&totalRows_rsTeses=%d%s", $totalRows_rsTeses, $queryString_rsTeses);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000099;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<p><a href="../home.html" target="mainFrame">LMP</a>&gt;<a href="publicacoes_principal.html">Publica&ccedil;&otilde;es</a>&gt;Teses</p>
<div align="center">
  <table width="85%" border="0" cellspacing="2" cellpadding="6">
    <?php do { ?>
      <tr>
        <td width="95%"><span class="style1"><?php echo $row_rsTeses['autor']; ?> <strong><?php echo $row_rsTeses['titulo']; ?> </strong><?php echo $row_rsTeses['complemento']; ?> <?php echo $row_rsTeses['ano']; ?> <a href="<?php echo $row_rsTeses['url']; ?>" target="_blank">
        <?php if ($row_rsTeses['url'] <> NULL) { // Show if recordset empty ?>
        <img src="../publicacoes/link_pqno.png" width="25" height="25" border="0" />
        <?php } // Show if recordset empty ?>
        </a></span></td>
      </tr>
      <?php } while ($row_rsTeses = mysql_fetch_assoc($rsTeses)); ?>
  </table>
  <p></p>
</div>
<div align="center" class="formulario"><a href="<?php printf("%s?pageNum_rsTeses=%d%s", $currentPage, 0, $queryString_rsTeses); ?>">&lt;&lt;</a> <a href="<?php printf("%s?pageNum_rsTeses=%d%s", $currentPage, max(0, $pageNum_rsTeses - 1), $queryString_rsTeses); ?>">&lt;</a>Mostrando Tese <?php echo ($startRow_rsTeses + 1) ?> até <?php echo min($startRow_rsTeses + $maxRows_rsTeses, $totalRows_rsTeses) ?> <a href="<?php printf("%s?pageNum_rsTeses=%d%s", $currentPage, min($totalPages_rsTeses, $pageNum_rsTeses + 1), $queryString_rsTeses); ?>">&gt;</a> <a href="<?php printf("%s?pageNum_rsTeses=%d%s", $currentPage, $totalPages_rsTeses, $queryString_rsTeses); ?>">&gt;&gt;</a><br />
Total de <?php echo $totalRows_rsTeses ?> teses.</div>
</body>
</html>
<?php
mysql_free_result($rsTeses);
?>
