<?php require_once('../../Connections/lmp.php'); ?>
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
			$imagem=$_FILES['foto']['tmp_name'];
//			$imagem_name=$_FILES['foto']['name'];
    		$imagem_name=$_POST['hiddenField'];
    		$imagem_name=$_POST['hiddenField'].".jpg";

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE membros SET foto='$imagem_name' WHERE id_membro=%s",
                       GetSQLValueString($_POST['hiddenField'], "int"));
				//copy ($imagem,$imagem_name);
			
			//$imagem=$_FILES['foto']['name'];
   					  // $imagem=$thumb;
                       //DEFINE OS PARÂMETROS DA MINIATURA
                       $largura = 90;
                       $altura = 120;
 
                       //NOME DO ARQUIVO DA MINIATURA
                       $imagem_gerada = explode(".", $imagem_name);
                       $imagem_gerada = $imagem_gerada[0].".jpg";
					   
                       //CRIA UMA NOVA IMAGEM
                       $imagem_orig = ImageCreateFromJPEG($imagem);
                       //LARGURA
                       $pontoX = ImagesX($imagem_orig);
                       //ALTURA
                       $pontoY = ImagesY($imagem_orig);

                       //CRIA O THUMBNAIL
                       $imagem_fin = ImageCreateTrueColor($largura, $altura);

                       //COPIA A IMAGEM ORIGINAL PARA DENTRO
                       ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0, $largura+1, $altura+1, $pontoX, $pontoY);

                       //SALVA A IMAGEM
                       ImageJPEG($imagem_fin, $imagem_gerada);

                       //LIBERA A MEMÓRIA
                       ImageDestroy($imagem_orig);
                       ImageDestroy($imagem_fin);
					   
					   
  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($updateSQL, $lmp) or die(mysql_error());

  $updateGoTo = "edita_foto.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsEditaFoto = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsEditaFoto = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsEditaFoto = sprintf("SELECT id_membro, membro_nome, foto FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsEditaFoto, "int"));
$rsEditaFoto = mysql_query($query_rsEditaFoto, $lmp) or die(mysql_error());
$row_rsEditaFoto = mysql_fetch_assoc($rsEditaFoto);
$totalRows_rsEditaFoto = mysql_num_rows($rsEditaFoto);

$colname_rsNomeMembro = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsNomeMembro = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsNomeMembro = sprintf("SELECT id_membro, membro_apelido FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsNomeMembro, "int"));
$rsNomeMembro = mysql_query($query_rsNomeMembro, $lmp) or die(mysql_error());
$row_rsNomeMembro = mysql_fetch_assoc($rsNomeMembro);
$totalRows_rsNomeMembro = mysql_num_rows($rsNomeMembro);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edita foto</title>
<link href="../../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="titulogrande">Foto Atual de <?php echo $row_rsNomeMembro['membro_apelido']; ?></p>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <table width="624" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="324"><p>
        <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_rsEditaFoto['id_membro']; ?>" />
        <img src="<?php echo $row_rsEditaFoto['foto']; ?>" alt="Foto" />      </p>
        <label>
        <input name="foto" type="file" id="foto" />
        </label>
        <p>
          <label>
          <input type="submit" name="button" id="button" value="Submit" />
          </label>
          <input type="hidden" name="MM_update" value="form1" />
        </p></td>
      <td width="300"><img src="../../adm/dica_foto.jpg" width="341" height="298" border="0" /></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<p><a href="../../adm/membro_lista.php">Voltar para lista de membros</a></p>
</body>

</html>
<?php
mysql_free_result($rsEditaFoto);

mysql_free_result($rsNomeMembro);

mysql_free_result($rsEditaFoto);
?>
