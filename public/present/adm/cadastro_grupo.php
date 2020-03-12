<?php require_once('../Connections/lmp.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO grupos (grupo_nome) VALUES (%s)",
                       GetSQLValueString($_POST['nomegrupo'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "cadastro_grupo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_lmp, $lmp);
$query_rsGrupos = "SELECT * FROM grupos ORDER BY grupo_nome ASC";
$rsGrupos = mysql_query($query_rsGrupos, $lmp) or die(mysql_error());
$row_rsGrupos = mysql_fetch_assoc($rsGrupos);
$totalRows_rsGrupos = mysql_num_rows($rsGrupos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastra Grupos</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Cria novo grupo</p>
<p class="formulario">&nbsp;</p>
<table width="335" border="0" cellpadding="0" cellspacing="0" class="formulario">
  <tr class="tituloTabela">
    <td>&nbsp;</td>
    <td>Grupos Existentes:</td>
  </tr>
  <?php do { ?>
    <tr>
      <td width="60">&nbsp;</td>
      <td width="275"><?php echo $row_rsGrupos['grupo_nome']; ?></td>
    </tr>
    <?php } while ($row_rsGrupos = mysql_fetch_assoc($rsGrupos)); ?>
</table>
<p class="titulogrande">&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p><span class="formulario">Nome do Grupo</span>		
    <input name="nomegrupo" type="text" class="caixatexto" id="nomegrupo" />
  </p>
  <p>
    <label>
    <input name="button" type="submit" class="caixatexto" id="button" value="Inserir Novo Grupo" />
    </label>
</p>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($rsGrupos);

mysql_free_result($rsGrupos);
?>
