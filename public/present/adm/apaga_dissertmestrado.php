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

$colname_rsDissertmestrado = "-1";
if (isset($_GET['id_dissermestrado'])) {
  $colname_rsDissertmestrado = $_GET['id_dissermestrado'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsDissertmestrado = sprintf("SELECT * FROM dissertmestrado WHERE id_dissermestrado = %s", GetSQLValueString($colname_rsDissertmestrado, "int"));
$rsDissertmestrado = mysql_query($query_rsDissertmestrado, $lmp) or die(mysql_error());
$row_rsDissertmestrado = mysql_fetch_assoc($rsDissertmestrado);
$totalRows_rsDissertmestrado = mysql_num_rows($rsDissertmestrado);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Deseja realmente apagar o seguinte dissertação?</p>
<p><?php echo $row_rsDissertmestrado['autor']; ?> <strong><?php echo $row_rsDissertmestrado['titulo']; ?></strong> <?php echo $row_rsDissertmestrado['complemento']; ?></p>
<p> Link: <?php echo $row_rsDissertmestrado['url']; ?><br />
</p>
<p>Ano: <?php echo $row_rsDissertmestrado['ano']; ?></p>
<p><a href="apaga_apaga_dissertmestrado.php?id_dissermestrado=<?php echo $row_rsDissertmestrado['id_dissermestrado']; ?>">Confirma</a></p>
<p><a href="cadastra_dissertmestrado.php">Voltar</a><br />
</p>
</body>
</html>
<?php
mysql_free_result($rsDissertmestrado);
?>
