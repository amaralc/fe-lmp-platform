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

$colname_rsGrupo = "-1";
if (isset($_GET['id_grupo'])) {
  $colname_rsGrupo = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsGrupo = sprintf("SELECT * FROM grupos WHERE id_grupo = %s", GetSQLValueString($colname_rsGrupo, "int"));
$rsGrupo = mysql_query($query_rsGrupo, $lmp) or die(mysql_error());
$row_rsGrupo = mysql_fetch_assoc($rsGrupo);
$totalRows_rsGrupo = mysql_num_rows($rsGrupo);

$colname_rsMembrosGrupo = "24";
if (isset($_GET['id_grupo'])) {
  $colname_rsMembrosGrupo = $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsMembrosGrupo = sprintf("SELECT M.membro_email FROM .membros M, .vinc_membros_grupos V WHERE V.v_id_grupo = %s AND V.v_id_membro = M.id_membro AND M.membro_tipo = '1' ORDER BY M.membro_nome ASC", GetSQLValueString($colname_rsMembrosGrupo, "int"));
$rsMembrosGrupo = mysql_query($query_rsMembrosGrupo, $lmp) or die(mysql_error());
$row_rsMembrosGrupo = mysql_fetch_assoc($rsMembrosGrupo);
$totalRows_rsMembrosGrupo = mysql_num_rows($rsMembrosGrupo);

$colname_rsEmails = "24";
if (isset( $_GET['id_grupo'])) {
  $colname_rsEmails =  $_GET['id_grupo'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsEmails = sprintf("SELECT M.membro_email FROM .membros M, .vinc_membros_grupos V WHERE V.v_id_grupo = %s AND V.v_id_membro = M.id_membro AND M.membro_tipo = '1' ORDER BY M.membro_nome ASC", GetSQLValueString($colname_rsEmails, "int"));
$rsEmails = mysql_query($query_rsEmails, $lmp) or die(mysql_error());
$row_rsEmails = mysql_fetch_assoc($rsEmails);
$totalRows_rsEmails = mysql_num_rows($rsEmails);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Lista de E-mails do Grupo &quot;<?php echo $row_rsGrupo['grupo_nome']; ?>&quot;</p>
<p>Copie e cole a lista de emails abaixo ou clique no envelope para enviar com o gerenciador de e-mails padrão.</p>
<p><a href="mailto:<?php do { ?>
<?php echo $row_rsMembrosGrupo['membro_email'];?>,<?php } while ($row_rsMembrosGrupo = mysql_fetch_assoc($rsMembrosGrupo));?>?subject=LMP-<?php echo $row_rsGrupo['grupo_nome'];?>&body=[Lista Gerada Automaticamente pelo Gerenciador de Membros do LMP]"><img src="icones/send_email_icon.gif" width="48" height="48" border="0" /></a></p>
<table width="644" border="0" cellspacing="0" cellpadding="0">
  <tr class="formulario">
    <td width="58" height="30">&nbsp;</td>
    <td>
      <?php do { ?>
      <span class="formulario"><?php echo $row_rsEmails['membro_email']; ?>,
    <?php } while ($row_rsEmails = mysql_fetch_assoc($rsEmails)); ?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
  <p><a href="grupos.php">Voltar</a></p>
</body>
</html>
<?php

mysql_free_result($rsGrupo);

mysql_free_result($rsMembrosGrupo);

mysql_free_result($rsEmails);

?>
