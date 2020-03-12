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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE membros SET se_01=%s, se_02=%s, se_03=%s, se_04=%s, se_05=%s, se_06=%s, se_07=%s, se_08=%s, se_09=%s, se_10=%s, te_01=%s, te_02=%s, te_03=%s, te_04=%s, te_05=%s, te_06=%s, te_07=%s, te_08=%s, te_09=%s, te_10=%s, qa_01=%s, qa_02=%s, qa_03=%s, qa_04=%s, qa_05=%s, qa_06=%s, qa_07=%s, qa_08=%s, qa_09=%s, qa_10=%s, qi_01=%s, qi_02=%s, qi_03=%s, qi_04=%s, qi_05=%s, qi_06=%s, qi_07=%s, qi_08=%s, qi_09=%s, qi_10=%s, sx_01=%s, sx_02=%s, sx_03=%s, sx_04=%s, sx_05=%s, sx_06=%s, sx_07=%s, sx_08=%s, sx_09=%s, sx_10=%s WHERE id_membro=%s",
                       GetSQLValueString(isset($_POST['se_01']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_02']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_03']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_04']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_05']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_06']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_07']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_08']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_09']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['se_10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_01']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_02']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_03']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_04']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_05']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_06']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_07']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_08']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_09']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['te_10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_01']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_02']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_03']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_04']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_05']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_06']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_07']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_08']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_09']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qa_10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_01']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_02']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_03']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_04']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_05']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_06']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_07']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_08']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_09']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['qi_10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_01']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_02']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_03']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_04']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_05']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_06']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_07']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_08']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_09']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['sx_10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['hiddenField'], "int"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($updateSQL, $lmp) or die(mysql_error());

  $updateGoTo = "membro_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsHorario = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsHorario = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsHorario = sprintf("SELECT id_membro, membro_apelido, se_01, se_02, se_03, se_04, se_05, se_06, se_07, se_08, se_09, se_10, te_01, te_02, te_03, te_04, te_05, te_06, te_07, te_08, te_09, te_10, qa_01, qa_02, qa_03, qa_04, qa_05, qa_06, qa_07, qa_08, qa_09, qa_10, qi_01, qi_02, qi_03, qi_04, qi_05, qi_06, qi_07, qi_08, qi_09, qi_10, sx_01, sx_02, sx_03, sx_04, sx_05, sx_06, sx_07, sx_08, sx_09, sx_10 FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsHorario, "int"));
$rsHorario = mysql_query($query_rsHorario, $lmp) or die(mysql_error());
$row_rsHorario = mysql_fetch_assoc($rsHorario);
$totalRows_rsHorario = mysql_num_rows($rsHorario);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edita </title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <span class="titulogrande">Edita Horários de <?php echo $row_rsHorario['membro_apelido']; ?>  </span>
  <p>&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="300" height="302" cellpadding="1" cellspacing="1">
    <tr>
      <td width="50" class="tituloTabela"><div align="center"></div></td>
      <td width="27" class="tituloTabela"><div align="center">seg</div></td>
      <td width="22" class="tituloTabela"><div align="center">ter</div></td>
      <td width="29" class="tituloTabela"><div align="center">qua</div></td>
      <td width="24" class="tituloTabela"><div align="center">qui</div></td>
      <td width="30" class="tituloTabela"><div align="center">sex</div></td>
    </tr>
    <tr>
      <td class="tituloTabela"><div align="center">7h30</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_01'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_01" type="checkbox" id="se_01" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_01'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_01" type="checkbox" id="te_01" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_01'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_01" type="checkbox" id="qa_01" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_01'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_01" type="checkbox" id="qi_01" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_01'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_01" type="checkbox" id="sx_01" value="Y" />
      </div></td>
    </tr>
    <tr>
      <td class="tituloTabela"><div align="center">8h20</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_02'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_02" type="checkbox" id="se_02" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_02'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_02" type="checkbox" id="te_02" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_02'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_02" type="checkbox" id="qa_02" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_02'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_02" type="checkbox" id="qi_02" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_02'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_02" type="checkbox" id="sx_02" value="Y" />
      </div></td>
    </tr>
    <tr>
      <td class="tituloTabela"><div align="center">9h10</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_03'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_03" type="checkbox" id="se_03" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_03'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_03" type="checkbox" id="te_03" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_03'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_03" type="checkbox" id="qa_03" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_03'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_03" type="checkbox" id="qi_03" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_03'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_03" type="checkbox" id="sx_03" value="Y" />
      </div></td>    </tr>
    <tr>
      <td class="tituloTabela"><div align="center">10h20</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_04'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_04" type="checkbox" id="se_04" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_04'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_04" type="checkbox" id="te_04" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_04'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_04" type="checkbox" id="qa_04" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_04'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_04" type="checkbox" id="qi_04" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_04'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_04" type="checkbox" id="sx_04" value="Y" />
      </div></td>    </tr>

    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr>
      <td class="tituloTabela"><div align="center">11h10</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_05'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_05" type="checkbox" id="se_05" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_05'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_05" type="checkbox" id="te_05" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_05'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_05" type="checkbox" id="qa_05" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_05'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_05" type="checkbox" id="qi_05" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_05'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_05" type="checkbox" id="sx_05" value="Y" />
      </div></td>    </tr>

    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr class="tituloTabela">
      <td colspan="6"><div align="center">Almoço</div></td>
    </tr>
    <tr>
      <td class="tituloTabela"><div align="center">13h30</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_06'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_06" type="checkbox" id="se_06" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_06'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_06" type="checkbox" id="te_06" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_06'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_06" type="checkbox" id="qa_06" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_06'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_06" type="checkbox" id="qi_06" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_06'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_06" type="checkbox" id="sx_06" value="Y" />
      </div></td>    </tr>
    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr>
      <td class="tituloTabela"><div align="center">14h20</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_07'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_07" type="checkbox" id="se_07" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_07'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_07" type="checkbox" id="te_07" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_07'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_07" type="checkbox" id="qa_07" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_07'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_07" type="checkbox" id="qi_07" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_07'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_07" type="checkbox" id="sx_07" value="Y" />
      </div></td>    </tr>
    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr>
      <td class="tituloTabela"><div align="center">15h10</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_08'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_08" type="checkbox" id="se_08" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_08'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_08" type="checkbox" id="te_08" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_08'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_08" type="checkbox" id="qa_08" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_08'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_08" type="checkbox" id="qi_08" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_08'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_08" type="checkbox" id="sx_08" value="Y" />
      </div></td>    </tr>
    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr>
      <td class="tituloTabela"><div align="center">16h20</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_09'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_09" type="checkbox" id="se_09" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_09'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_09" type="checkbox" id="te_09" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_09'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_09" type="checkbox" id="qa_09" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_09'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_09" type="checkbox" id="qi_09" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_09'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_09" type="checkbox" id="sx_09" value="Y" />
      </div></td>    </tr>
    <tr class="tituloTabela"></tr>
      <div align="center"></div>
    
    <tr>
      <td class="tituloTabela"><div align="center">17h10</div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['se_10'],"Y"))) {echo "checked=\"checked\"";} ?> name="se_10" type="checkbox" id="se_10" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['te_10'],"Y"))) {echo "checked=\"checked\"";} ?> name="te_10" type="checkbox" id="te_10" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qa_10'],"Y"))) {echo "checked=\"checked\"";} ?> name="qa_10" type="checkbox" id="qa_10" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['qi_10'],"Y"))) {echo "checked=\"checked\"";} ?> name="qi_10" type="checkbox" id="qi_10" value="Y" />
      </div></td>
      <td><div align="center">
        <input <?php if (!(strcmp($row_rsHorario['sx_10'],"Y"))) {echo "checked=\"checked\"";} ?> name="sx_10" type="checkbox" id="sx_10" value="Y" />
      </div></td>    </tr>
    </tr>
      <div align="center"></div>
    
    <tr>
      <td colspan="6" class="tituloTabela"><div align="center">Feierabend</div></td>
    </tr>
  </table>
  <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_rsHorario['id_membro']; ?>" />
  <p>
    <label>
    <input type="submit" name="button" id="button" value="Submit" />
    </label>
  </p>
  <p><a href="membro_lista.php">Voltar</a></p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p>&nbsp; </p>
</body>
</html>
<?php
mysql_free_result($rsHorario);
?>
