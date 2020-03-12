<?php require_once('../../Connections/lmp.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO membros (id_membro, membro_nome, membro_apelido, membro_nasc, membro_curso, membro_nivel, membro_cpf, membro_rg, membro_endereco, membro_tipo, membro_email, membro_telefone1, membro_telefone2, membro_grupo, membro_obs, foto) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, '$foto_name')",
                       GetSQLValueString($_POST['id_membro'], "int"),
                       GetSQLValueString($_POST['membro_nome'], "text"),
                       GetSQLValueString($_POST['membro_apelido'], "text"),
                       GetSQLValueString($_POST['membro_nasc'], "date"),
                       GetSQLValueString($_POST['membro_curso'], "text"),
                       GetSQLValueString($_POST['membro_nivel'], "text"),
                       GetSQLValueString($_POST['membro_cpf'], "text"),
                       GetSQLValueString($_POST['membro_rg'], "text"),
                       GetSQLValueString($_POST['membro_endereco'], "text"),
                       GetSQLValueString($_POST['membro_tipo'], "int"),
                       GetSQLValueString($_POST['membro_email'], "text"),
                       GetSQLValueString($_POST['membro_telefone1'], "text"),
                       GetSQLValueString($_POST['membro_telefone2'], "text"),
                       GetSQLValueString($_POST['membro_grupo'], "text"),
                       GetSQLValueString($_POST['membro_obs'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "../../adm/ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_lmp, $lmp);
$query_rsGrupos = "SELECT * FROM grupos";
$rsGrupos = mysql_query($query_rsGrupos, $lmp) or die(mysql_error());
$row_rsGrupos = mysql_fetch_assoc($rsGrupos);
$totalRows_rsGrupos = mysql_num_rows($rsGrupos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro novo Membro</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_nome:</td>
      <td><input type="text" name="membro_nome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_apelido:</td>
      <td><input type="text" name="membro_apelido" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_nasc:</td>
      <td><input type="text" name="membro_nasc" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_curso:</td>
      <td><input type="text" name="membro_curso" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_nivel:</td>
      <td><input type="text" name="membro_nivel" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_cpf:</td>
      <td><input type="text" name="membro_cpf" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_rg:</td>
      <td><input type="text" name="membro_rg" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_endereco:</td>
      <td><input type="text" name="membro_endereco" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_tipo:</td>
      <td><input type="text" name="membro_tipo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_email:</td>
      <td><input type="text" name="membro_email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_telefone1:</td>
      <td><input type="text" name="membro_telefone1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_telefone2:</td>
      <td><input type="text" name="membro_telefone2" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_grupo:</td>
      <td><input type="checkbox" name="membro_grupo" value="1" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Membro_obs:</td>
      <td><input type="text" name="membro_obs" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input type="file" name="foto" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="id_membro" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsGrupos);
?>