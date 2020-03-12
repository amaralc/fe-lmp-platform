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

$colname_rsNome = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsNome = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsNome = sprintf("SELECT id_membro, membro_nome FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsNome, "int"));
$rsNome = mysql_query($query_rsNome, $lmp) or die(mysql_error());
$row_rsNome = mysql_fetch_assoc($rsNome);
$totalRows_rsNome = mysql_num_rows($rsNome);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmação de Exclusão</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Deseja realmente excluir
  <?php echo $row_rsNome['membro_nome']; ?> do Banco de Dados?</p>
<p class="formulario">Dica: Você pode <a href="membro_edita.php?id_membro=<?php echo $row_rsNome['id_membro']; ?>">editar </a>o Usuário e cadastrar como &quot;Inativo&quot; ou como &quot;Ex-Membro&quot;.</p>
<p class="formulario"><a href="exclui_membro.php?id_membro=<?php echo $row_rsNome['id_membro']; ?>">EXCLUIR</a></p>
</body>
</html>
<?php
mysql_free_result($rsNome);
?>
