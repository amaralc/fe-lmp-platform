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

$colname_rsTese = "-1";
if (isset($_GET['id_dissert'])) {
  $colname_rsTese = $_GET['id_dissert'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsTese = sprintf("SELECT * FROM dissertacoes WHERE id_dissert = %s", GetSQLValueString($colname_rsTese, "int"));
$rsTese = mysql_query($query_rsTese, $lmp) or die(mysql_error());
$row_rsTese = mysql_fetch_assoc($rsTese);
$totalRows_rsTese = mysql_num_rows($rsTese);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Deseja realmente apagar o seguinte tese?</p>
<p><?php echo $row_rsTese['autor']; ?> <strong><?php echo $row_rsTese['titulo']; ?></strong> <?php echo $row_rsTese['complemento']; ?></p>
<p> Link: <?php echo $row_rsTese['url']; ?><br />
</p>
<p>Ano: <?php echo $row_rsTese['ano']; ?></p>
<p><a href="apaga_apaga_tese.php?id_dissert=<?php echo $row_rsTese['id_dissert']; ?>">Confirma</a></p>
<p><a href="cadastra_tese.php">Voltar</a><br />
</p>
</body>
</html>
<?php
mysql_free_result($rsTese);
?>
