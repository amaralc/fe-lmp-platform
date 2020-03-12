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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="estilo-menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #05376C;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<p align="center"><a href="inicial.php" target="mainFrame"><img src="../logo_lmp_semflash.png" width="115" height="115" border="0" /></a></p>
<div align="left"><span class="titulo"> Membros<br />
  </span>
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="middle"><div align="left"><a href="cadastro_membro.php" target="mainFrame"><img src="icones/arrow-icon-20.png" width="20" height="20" border="0" />CADASTRO</a></div></td>
    </tr>
    <tr>
      <td valign="middle"><div align="left"><a href="membro_lista.php" target="mainFrame"><img src="icones/arrow-icon-20.png" alt="seta" width="20" height="20" border="0" /></a><a href="membro_lista.php" target="mainFrame">Completar/Editar Dados</a></div></td>
    </tr>
    <tr>
      <td valign="middle"><div align="left"><a href="submenu_membros.php" target="mainFrame">+Opções</a></div></td>
    </tr>
            </table>
</div>
<p align="left"><span class="titulo">Grupos<br />
</span></p>


<div align="center">
  <table width="80%" border="0" cellspacing="0" cellpadding="0">
    <?php do { ?>
      <tr class="formulario">
        <td width="94%" background="icones/linha.png" class="titulogrande"><div align="left"><a href="membros_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>" target="mainFrame"><?php echo $row_rsGrupos['grupo_nome']; ?></a></div></td>
        <td width="2%" background="icones/linha.png"><div align="center"><a href="horario_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>" target="mainFrame"><img src="icones/icon_clock_15.png" alt="Horário do Grupo" border="0" /></a><a href="horario_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"></a></div></td>
        <td width="2%" background="icones/linha.png"><div align="center"><a href="membros_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>" target="mainFrame"><img src="icones/group_15.png" alt="Membros do Grupo" width="15" height="15" border="0" /></a><a href="membros_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>"></a></div></td>
        <td width="2%" background="icones/linha.png"><div align="center"><a href="email_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>" target="mainFrame"><img src="icones/email-15.png" alt="Lista de Email" width="15" height="15" border="0" /></a><a href="email_grupo.php?id_grupo=<?php echo $row_rsGrupos['id_grupo']; ?>" target="mainFrame"></a></div></td>
      </tr>
      <?php } while ($row_rsGrupos = mysql_fetch_assoc($rsGrupos)); ?>
    <tr>
      <td height="15" background="icones/linha.png"><div align="left"><a href="membros_todos.php" target="mainFrame">Todos do LMP</a></div></td>
      <td background="icones/linha.png"><div align="center"><a href="horario_todos.php" target="mainFrame"><img src="icones/icon_clock_15.png" alt="Horário do Grupo" border="0" /></a></div></td>
      <td background="icones/linha.png"><div align="center"><a href="membros_todos.php" target="mainFrame"><img src="icones/group_15.png" alt="Membros do Grupo" width="15" height="15" border="0" /></a></div></td>
      <td background="icones/linha.png"><div align="center"><a href="email_todos.php" target="mainFrame"><img src="icones/email-15.png" alt="Lista de Email" width="16" height="15" border="0" /></a></div></td>
    </tr>
  </table>
  </div>
<p align="left"><a href="cadastro_grupo.php" target="mainFrame">+ Grupo</a></p>
<p align="left"><span class="titulo">Publicações</span><br />
<a href="cadastra_artigo.php" target="mainFrame">Cadastra novo Artigo</a><br />
<a href="cadastra_tese.php" target="mainFrame">Cadastra nova Tese</a><br />
<a href="cadastra_dissertmestrado.php" target="mainFrame">Cadastra nova Dissertação</a></p>
<p align="left"><span class="titulo">Site<br />
</span><a href="../estrutura/estrutura_equipe.php" target="mainFrame">Ver lista de membros no site</a></p>
<p align="left"><a href="logout.php" target="_parent">Logout</a></p>
<p align="center" class="nota">Desenvolvido por Leonardo Oliveira.<br />
leo.oliveira@hotmail.de</p>
</body>


</html>
<?php
mysql_free_result($rsGrupos);
?>
