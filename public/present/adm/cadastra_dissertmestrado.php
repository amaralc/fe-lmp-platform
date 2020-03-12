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
  $insertSQL = sprintf("INSERT INTO dissertmestrado (autor, titulo, complemento, ano, url) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['autor'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['complemento'], "text"),
                       GetSQLValueString($_POST['ano'], "int"),
                       GetSQLValueString($_POST['url'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "cadastra_dissertmestrado.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_rsDissertmestrado = 15;
$pageNum_rsDissertmestrado = 0;
if (isset($_GET['pageNum_rsDissertmestrado'])) {
  $pageNum_rsDissertmestrado = $_GET['pageNum_rsDissertmestrado'];
}
$startRow_rsDissertmestrado = $pageNum_rsDissertmestrado * $maxRows_rsDissertmestrado;

mysql_select_db($database_lmp, $lmp);
$query_rsDissertmestrado = "SELECT * FROM dissertmestrado ORDER BY ano DESC";
$query_limit_rsDissertmestrado = sprintf("%s LIMIT %d, %d", $query_rsDissertmestrado, $startRow_rsDissertmestrado, $maxRows_rsDissertmestrado);
$rsDissertmestrado = mysql_query($query_limit_rsDissertmestrado, $lmp) or die(mysql_error());
$row_rsDissertmestrado = mysql_fetch_assoc($rsDissertmestrado);

if (isset($_GET['totalRows_rsDissertmestrado'])) {
  $totalRows_rsDissertmestrado = $_GET['totalRows_rsDissertmestrado'];
} else {
  $all_rsDissertmestrado = mysql_query($query_rsDissertmestrado);
  $totalRows_rsDissertmestrado = mysql_num_rows($all_rsDissertmestrado);
}
$totalPages_rsDissertmestrado = ceil($totalRows_rsDissertmestrado/$maxRows_rsDissertmestrado)-1;

$queryString_rsDissertmestrado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsDissertmestrado") == false && 
        stristr($param, "totalRows_rsDissertmestrado") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsDissertmestrado = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsDissertmestrado = sprintf("&totalRows_rsDissertmestrado=%d%s", $totalRows_rsDissertmestrado, $queryString_rsDissertmestrado);
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
<p class="titulogrande">Cadastra nova Dissertação de Mestrado</p>
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
  <input type="hidden" name="id_tese" value="" />
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<div align="center">
  <table width="85%" border="0" cellspacing="2" cellpadding="6">
    <?php do { ?>
      <tr>
        <td width="95%"><span class="style1"><?php echo $row_rsDissertmestrado['autor']; ?> <strong><?php echo $row_rsDissertmestrado['titulo']; ?> </strong><?php echo $row_rsDissertmestrado['complemento']; ?> <?php echo $row_rsDissertmestrado['ano']; ?> <a href="<?php echo $row_rsDissertmestrado['url']; ?>" target="_blank">
        <?php if ($row_rsDissertmestrado['url'] <> NULL) { // Show if recordset empty ?>
        <img src="../publicacoes/link_pqno.png" width="25" height="25" border="0" />
        <?php } // Show if recordset empty ?>
        </a></span></td>
        <td width="5%"><a href="apaga_dissertmestrado.php?id_dissermestrado=<?php echo $row_rsDissertmestrado['id_dissermestrado']; ?>"><img src="../publicacoes/delete_pqno.png" width="25" height="25" border="0" /></a></td>
      </tr>
      <?php } while ($row_rsDissertmestrado = mysql_fetch_assoc($rsDissertmestrado)); ?>
  </table>
  <p></p>
</div>
<div align="center" class="formulario"><a href="<?php printf("%s?pageNum_rsDissertmestrado=%d%s", $currentPage, 0, $queryString_rsDissertmestrado); ?>">&lt;&lt;</a> <a href="<?php printf("%s?pageNum_rsDissertmestrado=%d%s", $currentPage, max(0, $pageNum_rsDissertmestrado - 1), $queryString_rsDissertmestrado); ?>">&lt;</a>Mostrando dissertação <?php echo ($startRow_rsDissertmestrado + 1) ?> a <?php echo min($startRow_rsDissertmestrado + $maxRows_rsDissertmestrado, $totalRows_rsDissertmestrado) ?> <a href="<?php printf("%s?pageNum_rsDissertmestrado=%d%s", $currentPage, min($totalPages_rsDissertmestrado, $pageNum_rsDissertmestrado + 1), $queryString_rsDissertmestrado); ?>">&gt;</a> <a href="<?php printf("%s?pageNum_rsDissertmestrado=%d%s", $currentPage, $totalPages_rsDissertmestrado, $queryString_rsDissertmestrado); ?>">&gt;&gt;</a><br />
Total de <?php echo $totalRows_rsDissertmestrado ?> dissertações</div>
</body>
</html>
<?php
mysql_free_result($rsDissertmestrado);
?>
