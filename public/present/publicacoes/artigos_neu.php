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

$maxRows_rsArtigos = 15;
$pageNum_rsArtigos = 0;
if (isset($_GET['pageNum_rsArtigos'])) {
  $pageNum_rsArtigos = $_GET['pageNum_rsArtigos'];
}
$startRow_rsArtigos = $pageNum_rsArtigos * $maxRows_rsArtigos;

mysql_select_db($database_lmp, $lmp);
$query_rsArtigos = "SELECT * FROM artigos ORDER BY ano DESC";
$query_limit_rsArtigos = sprintf("%s LIMIT %d, %d", $query_rsArtigos, $startRow_rsArtigos, $maxRows_rsArtigos);
$rsArtigos = mysql_query($query_limit_rsArtigos, $lmp) or die(mysql_error());
$row_rsArtigos = mysql_fetch_assoc($rsArtigos);

if (isset($_GET['totalRows_rsArtigos'])) {
  $totalRows_rsArtigos = $_GET['totalRows_rsArtigos'];
} else {
  $all_rsArtigos = mysql_query($query_rsArtigos);
  $totalRows_rsArtigos = mysql_num_rows($all_rsArtigos);
}
$totalPages_rsArtigos = ceil($totalRows_rsArtigos/$maxRows_rsArtigos)-1;

$queryString_rsArtigos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsArtigos") == false && 
        stristr($param, "totalRows_rsArtigos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsArtigos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsArtigos = sprintf("&totalRows_rsArtigos=%d%s", $totalRows_rsArtigos, $queryString_rsArtigos);
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
<p><a href="../home.html" target="mainFrame">LMP</a>&gt;<a href="publicacoes_principal.html">Publica&ccedil;&otilde;es</a>&gt;Artigos
Publicados</p>
<div align="center">
  <table width="85%" border="0" cellspacing="2" cellpadding="6">
    <?php do { ?>
      <tr>
        <td width="95%"><span class="style1"><?php echo $row_rsArtigos['autor']; ?> <strong><?php echo $row_rsArtigos['titulo']; ?> </strong><?php echo $row_rsArtigos['complemento']; ?> <?php echo $row_rsArtigos['ano']; ?> <a href="<?php echo $row_rsArtigos['url']; ?>" target="_blank">
        <?php if ($row_rsArtigos['url'] <> NULL) { // Show if recordset empty ?>
        <img src="../publicacoes/link_pqno.png" width="25" height="25" border="0" />
        <?php } // Show if recordset empty ?>
        </a></span></td>
      </tr>
      <?php } while ($row_rsArtigos = mysql_fetch_assoc($rsArtigos)); ?>
  </table>
  <p></p>
</div>
<div align="center" class="formulario"><a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, 0, $queryString_rsArtigos); ?>">&lt;&lt;</a> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, max(0, $pageNum_rsArtigos - 1), $queryString_rsArtigos); ?>">&lt;</a>Mostrando artigo <?php echo ($startRow_rsArtigos + 1) ?> até <?php echo min($startRow_rsArtigos + $maxRows_rsArtigos, $totalRows_rsArtigos) ?> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, min($totalPages_rsArtigos, $pageNum_rsArtigos + 1), $queryString_rsArtigos); ?>">&gt;</a> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, $totalPages_rsArtigos, $queryString_rsArtigos); ?>">&gt;&gt;</a><br />
Total de <?php echo $totalRows_rsArtigos ?> artigos.</div>
</body>
</html>
<?php
mysql_free_result($rsArtigos);
?>
