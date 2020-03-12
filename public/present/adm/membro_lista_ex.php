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

mysql_select_db($database_lmp, $lmp);
$query_rsMembros = "SELECT id_membro, membro_nome, membro_apelido, membro_nivel FROM membros WHERE membro_tipo = 2 ORDER BY membro_nome ASC";
$rsMembros = mysql_query($query_rsMembros, $lmp) or die(mysql_error());
$row_rsMembros = mysql_fetch_assoc($rsMembros);
$totalRows_rsMembros = mysql_num_rows($rsMembros);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Membros do LMP</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><span class="titulogrande">Ex-Membros  do LMP</span>
  <table width="47%" border="0" cellspacing="1" cellpadding="1">
    <tr class="tituloTabela">
      <td width="40%">Nome</td>
      <td width="21%">&nbsp;</td>
      <td width="10%">Grupos</td>
      <td width="8%">Editar</td>
      <td width="11%">Foto</td>
      <td width="10%">Horário</td>
      <td width="10%">Excluir</td>
    </tr>
    <?php do { ?>
      <tr class="texto">
        <td><a href="membro_detalhe.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><?php echo $row_rsMembros['membro_nome']; ?> (<?php echo $row_rsMembros['membro_apelido']; ?>)</a></td>
        <td>&nbsp;</td>
        <td><a href="membro_grupo.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><img src="icones/group.jpg" alt="Grupo" width="48" height="48" border="0" /></a></td>
        <td><a href="membro_edita.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><img src="icones/editar.jpg" alt="Editar" width="40" height="40" border="0" /></a></td>
        <td><a href="../estrutura/fotos_equipe/edita_foto.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><img src="icones/icon_gallery.gif" alt="Foto" width="48" height="48" border="0" /></a></td>
        <td><a href="edita_horario.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><img src="icones/icon_clock.png" alt="Horário" width="48" height="48" border="0" /></a></td>
        <td><a href="conf_excluir.php?id_membro=<?php echo $row_rsMembros['id_membro']; ?>"><img src="icones/50px-Delete_icon.png" width="50" height="50" border="0" /></a></td>
      </tr>
      <?php } while ($row_rsMembros = mysql_fetch_assoc($rsMembros)); ?>
    </table>
</div>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsMembros);
?>
