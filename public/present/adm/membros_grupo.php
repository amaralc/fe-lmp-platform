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
$query_rsMembrosGrupo = sprintf("SELECT M.id_membro, M.membro_nome, M.membro_apelido, M.membro_nivel, M.membro_email, M.membro_telefone1, M.foto FROM .membros M, .vinc_membros_grupos V WHERE V.v_id_grupo = %s AND V.v_id_membro = M.id_membro AND M.membro_tipo = '1' ORDER BY M.membro_nome ASC", GetSQLValueString($colname_rsMembrosGrupo, "int"));
$rsMembrosGrupo = mysql_query($query_rsMembrosGrupo, $lmp) or die(mysql_error());
$row_rsMembrosGrupo = mysql_fetch_assoc($rsMembrosGrupo);
$totalRows_rsMembrosGrupo = mysql_num_rows($rsMembrosGrupo);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Lista de Membros do Grupo &quot;<?php echo $row_rsGrupo['grupo_nome']; ?>&quot;</p>
<table width="76%" border="0" cellspacing="2" cellpadding="2">
  <tr class="tituloTabela">
    <td width="4%">&nbsp;</td>
    <td width="28%">Nome</td>
    <td width="21%">&nbsp;</td>
    <td width="22%">E-mail</td>
    <td width="25%">Telefone</td>
  </tr>
  <?php do { ?>
    <tr class="tabelaHorario">
      <td><img src="../estrutura/fotos_equipe/<?php echo $row_rsMembrosGrupo['foto']; ?>" /></td>
      <td><a href="membro_detalhe.php?id_membro=<?php echo $row_rsMembrosGrupo['id_membro']; ?>"><?php echo $row_rsMembrosGrupo['membro_nome']; ?> (<?php echo $row_rsMembrosGrupo['membro_apelido']; ?>)</a></td>
      <td><?php echo $row_rsMembrosGrupo['membro_nivel']; ?></td>
      <td><a href="mailto:<?php echo $row_rsMembrosGrupo['membro_email']; ?>"><?php echo $row_rsMembrosGrupo['membro_email']; ?></a></td>
      <td><?php echo $row_rsMembrosGrupo['membro_telefone1']; ?></td>
    </tr>
    <?php } while ($row_rsMembrosGrupo = mysql_fetch_assoc($rsMembrosGrupo)); ?>
</table>
<p><a href="grupos.php">Voltar</a></p>
</body>
</html>
<?php

mysql_free_result($rsGrupo);

mysql_free_result($rsMembrosGrupo);

?>
