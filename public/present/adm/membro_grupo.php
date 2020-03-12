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
  $insertSQL = sprintf("INSERT INTO vinc_membros_grupos (v_id_membro, v_id_grupo) VALUES (%s, %s)",
                       GetSQLValueString($_POST['hiddenField'], "int"),
                       GetSQLValueString($_POST['grupos'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "membro_grupo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rsMembro = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsMembro = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsMembro = sprintf("SELECT id_membro, membro_nome FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsMembro, "int"));
$rsMembro = mysql_query($query_rsMembro, $lmp) or die(mysql_error());
$row_rsMembro = mysql_fetch_assoc($rsMembro);
$totalRows_rsMembro = mysql_num_rows($rsMembro);

$colname_rsVinc = "38";
if (isset($_GET['id_membro'])) {
  $colname_rsVinc = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsVinc = sprintf("SELECT G.*, V.id_chave FROM .vinc_membros_grupos V, .grupos G WHERE V.v_id_membro = %s AND V.v_id_grupo = G.id_grupo", GetSQLValueString($colname_rsVinc, "int"));
$rsVinc = mysql_query($query_rsVinc, $lmp) or die(mysql_error());
$row_rsVinc = mysql_fetch_assoc($rsVinc);
$totalRows_rsVinc = mysql_num_rows($rsVinc);

mysql_select_db($database_lmp, $lmp);
$query_rsGrupos = "SELECT * FROM grupos";
$rsGrupos = mysql_query($query_rsGrupos, $lmp) or die(mysql_error());
$row_rsGrupos = mysql_fetch_assoc($rsGrupos);
$totalRows_rsGrupos = mysql_num_rows($rsGrupos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<label>
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <p class="titulogrande"> Grupos de Trabalho de <?php echo $row_rsMembro['membro_nome']; ?> 
    <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_rsMembro['id_membro']; ?>" />
  </p>
  
  <?php if ($totalRows_rsVinc > 0) { // Show if recordset not empty ?>
  <table width="276" border="0" cellspacing="0" cellpadding="0">
        <tr class="tituloTabela">
          <td width="138">Grupos</td>
          <td width="138">&nbsp;</td>
        </tr>
        <?php do { ?>
        <tr class="formulario">
          <td><?php echo $row_rsVinc['grupo_nome']; ?></td>
          <td><label><a href="exclui_membro_do_grupo.php?id_exclui=<?php echo $row_rsVinc['id_chave']; ?>&amp;id_membro= <?php echo $row_rsMembro['id_membro']; ?>">Excluir</a></label></td>
        </tr>
        <?php } while ($row_rsVinc = mysql_fetch_assoc($rsVinc)); ?>
    </table>
    <?php } // Show if recordset not empty ?>
<p class="titulogrande">Adicionar Grupo de trabalho</p>
<table width="100" border="0" cellspacing="0" cellpadding="0">
      <tr class="tituloTabela">
        <td>&nbsp;</td>
        <td>Grupo</td>
      </tr>
      <?php do { ?>
        <tr class="formulario">
          <td><input type="radio" name="grupos" id="grupos" value="<?php echo $row_rsGrupos['id_grupo']; ?>" /></td>
          <td><?php echo $row_rsGrupos['grupo_nome']; ?></td>
      </tr>
        <?php } while ($row_rsGrupos = mysql_fetch_assoc($rsGrupos)); ?>
    </table>
<p>
      <label>
      <input name="button" type="submit" class="caixatexto" id="button" value="Adiciona" />
      </label>
  </p>
    <p><a href="membro_lista.php">Voltar para lista de membros</a></p>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</label></body>

</html>
<?php
mysql_free_result($rsGrupos);

mysql_free_result($rsMembro);

mysql_free_result($rsVinc);

mysql_free_result($rsGrupos);
?>
