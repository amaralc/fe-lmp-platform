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
$query_rsGrupos = "SELECT * FROM grupos ORDER BY grupo_nome ASC";
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
<p class="titulogrande">Grupos <span class="formulario">(Somente Membros Atuais)</span></p>
<div align="center">
  <table width="90%" border="0" cellspacing="2" cellpadding="2">
    <tr class="tituloTabela">
      <td width="365">Nome</td>
      <td width="179"><div align="center">Resumo de Horários</div></td>
      <td width="165"><div align="center">Ver Membros</div></td>
      <td width="202"><div align="center">Lista de E-mail</div></td>
    </tr>
    <?php do { ?>
      <tr class="formulario">
        <td class="titulogrande"><?php echo $row_rsGrupos['grupo_nome']; ?></td>
        <td><div align="center"><a href="horario_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"><img src="icones/icon_clock.png" width="48" height="48" border="0" /></a><a href="horario_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"></a></div></td>
        <td><div align="center"><a href="membros_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"><img src="icones/group.jpg" width="48" height="48" border="0" /></a></div></td>
        <td><div align="center"><a href="email_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"><img src="icones/send_email_icon.gif" width="48" height="48" border="0" /></a></div></td>
      </tr>
      <?php } while ($row_rsGrupos = mysql_fetch_assoc($rsGrupos)); ?>
    <tr class="formulario">
      <td>Todos do Laboratório</td>
      <td><div align="center"><a href="horario_todos.php"><img src="icones/icon_clock.png" width="48" height="48" border="0" /></a></div></td>
      <td><div align="center"><a href="membros_todos.php"><img src="icones/group.jpg" width="48" height="48" border="0" /></a></div></td>
      <td><div align="center"><a href="email_todos.php"><img src="icones/send_email_icon.gif" width="48" height="48" border="0" /></a><a href="email_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"></a></div></td>
    </tr>
  </table>
</div>
<p align="center"><a href="cadastro_grupo.php">Criar Novo Grupo</a></p>
</body>
</html>
<?php
mysql_free_result($rsGrupos);
?>
