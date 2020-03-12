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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO artigos (id_artigo, autor, titulo, complemento, ano, url) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_artigo'], "int"),
                       GetSQLValueString($_POST['autor'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['complemento'], "text"),
                       GetSQLValueString($_POST['ano'], "int"),
                       GetSQLValueString($_POST['url'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "cadastra_artigo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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
<p class="titulogrande">Cadastra novo Artigo</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">Autor:</td>
      <td class="formulario"><input name="autor" type="text" class="caixatexto" value="" size="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">Titulo:</td>
      <td class="formulario"><input name="titulo" type="text" class="caixatexto" value="" size="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">Complemento:</td>
      <td class="formulario"><input name="complemento" type="text" class="caixatexto" value="" size="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">Url:</td>
      <td class="formulario"><label>
        <input name="url" type="text" class="caixatexto" id="url" size="50" />
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">Ano:</td>
      <td class="formulario"><input name="ano" type="text" class="caixatexto" value="" size="4" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="formulario">&nbsp;</td>
      <td class="formulario"><input type="submit" class="caixatexto" value="Inserir" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_artigo" value="" />
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<div align="center">
  <table width="85%" border="0" cellspacing="2" cellpadding="6">
    <?php do { ?>
      <tr>
        <td width="95%"><span class="style1"><?php echo $row_rsArtigos['autor']; ?> <strong><?php echo $row_rsArtigos['titulo']; ?> </strong><?php echo $row_rsArtigos['complemento']; ?> <?php echo $row_rsArtigos['ano']; ?> <a href="<?php echo $row_rsArtigos['url']; ?>" target="_blank">
        <?php if ($row_rsArtigos['url'] <> NULL) { // Show if recordset empty ?>
        <img src="../publicacoes/link_pqno.png" width="25" height="25" border="0" />
        <?php } // Show if recordset empty ?>
        </a></span></td>
        <td width="5%"><a href="apaga_artigo.php?id_artigo=<?php echo $row_rsArtigos['id_artigo']; ?>"><img src="../publicacoes/delete_pqno.png" width="25" height="25" border="0" /></a></td>
      </tr>
      <?php } while ($row_rsArtigos = mysql_fetch_assoc($rsArtigos)); ?>
  </table>
  <p></p>
</div>
<div align="center" class="formulario"><a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, 0, $queryString_rsArtigos); ?>">&lt;&lt;</a> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, max(0, $pageNum_rsArtigos - 1), $queryString_rsArtigos); ?>">&lt;</a>Mostrando artigo <?php echo ($startRow_rsArtigos + 1) ?> a <?php echo min($startRow_rsArtigos + $maxRows_rsArtigos, $totalRows_rsArtigos) ?> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, min($totalPages_rsArtigos, $pageNum_rsArtigos + 1), $queryString_rsArtigos); ?>">&gt;</a> <a href="<?php printf("%s?pageNum_rsArtigos=%d%s", $currentPage, $totalPages_rsArtigos, $queryString_rsArtigos); ?>">&gt;&gt;</a><br />
Total de <?php echo $totalRows_rsArtigos ?></div>
</body>
</html>
<?php
mysql_free_result($rsArtigos);
?>
