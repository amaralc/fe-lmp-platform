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
  $updateSQL = sprintf("UPDATE membros SET membro_nome=%s, membro_apelido=%s, membro_nasc=%s, membro_curso=%s, membro_nivel=%s, membro_cpf=%s, membro_rg=%s, membro_endereco=%s, membro_tipo=%s, membro_email=%s, membro_telefone1=%s, membro_telefone2=%s, membro_obs=%s WHERE id_membro=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['apelido'], "text"),
                       GetSQLValueString($_POST['data_nasc'], "text"),
                       GetSQLValueString($_POST['curso'], "text"),
                       GetSQLValueString($_POST['nivel'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
                       GetSQLValueString($_POST['tipo'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefone1'], "text"),
                       GetSQLValueString($_POST['telefone2'], "text"),
                       GetSQLValueString($_POST['observacoes'], "text"),
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

$colname_rsMembro = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsMembro = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsMembro = sprintf("SELECT id_membro, membro_nome, membro_apelido, membro_nasc, membro_curso, membro_nivel, membro_cpf, membro_rg, membro_endereco, membro_tipo, membro_email, membro_telefone1, membro_telefone2, membro_obs FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsMembro, "int"));
$rsMembro = mysql_query($query_rsMembro, $lmp) or die(mysql_error());
$row_rsMembro = mysql_fetch_assoc($rsMembro);
$totalRows_rsMembro = mysql_num_rows($rsMembro);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro novo Membro</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <span class="titulogrande">Edita Membro  </span>
  <p>Campos em <span class="formularioSite">AZUL</span> serão publicados no site.</p>
  <p>Os demais dados serão utilizados apenas para controle interno do Laboratório.<br />
  </p>
  <div align="center">
    <table width="68%" border="0" cellpadding="1" cellspacing="1" class="formulario">
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Nome:</div></td>
        <td width="538"><label>
          <input name="nome" type="text" class="caixatexto" id="nome" value="<?php echo $row_rsMembro['membro_nome']; ?>" />
          <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_rsMembro['id_membro']; ?>" />
        </label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Apelido:</div></td>
        <td><label>
          <input name="apelido" type="text" class="caixatexto" id="apelido" value="<?php echo $row_rsMembro['membro_apelido']; ?>" />
        <span class="contatoesq">Como é conhecido no Laboratório.          </span></label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Data de Nascimento:</div></td>
        <td><span id="sprytextfield1">
        <label>
        <input name="data_nasc" type="text" class="caixatexto" id="data_nasc" value="<?php echo $row_rsMembro['membro_nasc']; ?>" size="10" maxlength="10" />
        </label>
        <span class="textfieldInvalidFormatMsg">Formato Incorreto. Insira no formato DD/MM/AAAA.</span></span></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Curso:</div></td>
        <td><label>
          <input name="curso" type="text" class="caixatexto" id="curso" value="<?php echo $row_rsMembro['membro_curso']; ?>" />
        </label></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Categoria:</div></td>
        <td><table width="363" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label>
                <input <?php if (!(strcmp($row_rsMembro['membro_nivel'],"Graduando"))) {echo "checked=\"checked\"";} ?> name="nivel" type="radio" id="nivel_0" value="Graduando" checked="checked" />
Graduando</label></td>
            </tr>
            <tr>
              <td><label>
                <input <?php if (!(strcmp($row_rsMembro['membro_nivel'],"Mestrando"))) {echo "checked=\"checked\"";} ?> type="radio" name="nivel" value="Mestrando" id="nivel_1" />
Mestrando</label></td>
            </tr>
            <tr>
              <td height="21"><label>
                <input <?php if (!(strcmp($row_rsMembro['membro_nivel'],"Doutorando"))) {echo "checked=\"checked\"";} ?> type="radio" name="nivel" value="Doutorando" id="nivel_2" />
Doutorando</label></td>
            </tr>
            <tr>
              <td height="21"><input <?php if (!(strcmp($row_rsMembro['membro_nivel'],"Pesquisador"))) {echo "checked=\"checked\"";} ?> type="radio" name="nivel" value="Pesquisador" id="nivel_3" />
Pesquisador</td>
            </tr>
            <tr>
              <td height="21"><input <?php if (!(strcmp($row_rsMembro['membro_nivel'],"Apoio"))) {echo "checked=\"checked\"";} ?> type="radio" name="nivel" value="Apoio" id="nivel_4" />
              Apoio</td>
            </tr>
        </table>          </td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">CPF:</div></td>
        <td><span id="sprytextfield2">
        <label>
        <input name="cpf" type="text" class="caixatexto" id="cpf" value="<?php echo $row_rsMembro['membro_cpf']; ?>" size="14" />
        </label>
        <span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top">RG:</td>
        <td><label>
          <input name="rg" type="text" class="caixatexto" id="rg" value="<?php echo $row_rsMembro['membro_rg']; ?>" size="14" />
        </label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Endereço</div></td>
        <td>
          <input name="endereco" type="text" class="caixatexto" id="endereco" value="<?php echo $row_rsMembro['membro_endereco']; ?>" size="50" /></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right" class="formularioSite">Tipo de Membro</div></td>
        <td><label></label>
          <table width="484" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="239"><input <?php if (!(strcmp($row_rsMembro['membro_tipo'],"1"))) {echo "checked=\"checked\"";} ?> name="tipo" type="radio" id="tipo" value="1" checked="checked" />
Equipe Atual</td>
            </tr>
            <tr>
              <td><input <?php if (!(strcmp($row_rsMembro['membro_tipo'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="tipo" id="tipo2" value="2" />
Ex-Membro - <span class="formularioSite">Preencher Observações.</span></td>
            </tr>
            <tr>
              <td><input <?php if (!(strcmp($row_rsMembro['membro_tipo'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="tipo" id="tipo3" value="3" />
Em intercâmbio - <span class="formularioSite">Preencher Observações.</span></td>
            </tr>
            <tr>
              <td><label>
                <input <?php if (!(strcmp($row_rsMembro['membro_tipo'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="tipo" id="tipo4" value="4" />
Inativo</label></td>
            </tr>
          </table></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right" class="formularioSite">E-mail</div></td>
        <td><span id="sprytextfield3">
        <label>
        <input name="email" type="text" class="caixatexto" id="email" value="<?php echo $row_rsMembro['membro_email']; ?>" />
        </label>
        <span class="textfieldRequiredMsg">Campo Obrigatorio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Telefone 1</div></td>
        <td><span id="sprytextfield4">
        <label>
        <input name="telefone1" type="text" class="caixatexto" id="telefone1" value="<?php echo $row_rsMembro['membro_telefone1']; ?>" size="18" />
        </label>
        <span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span><span class="contatoesq">Insira no padrão internacional. Ex.: &quot;+55 (48) 9999 9999&quot;</span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Telefone 2</div></td>
        <td><span id="sprytextfield5">
        <label>
        <input name="telefone2" type="text" class="caixatexto" id="telefone2" value="<?php echo $row_rsMembro['membro_telefone2']; ?>" size="18" />
        </label>
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Observações Gerais</div> 
        (Palavras Chaves)</td>
        <td><label>
          <textarea name="observacoes" cols="45" rows="5" class="caixatexto" id="observacoes"><?php echo $row_rsMembro['membro_obs']; ?></textarea>
          <br />
          <span class="contatoesq">Exemplo:  Estágio IPT, Fala Alemão, Inglês, Bolsa CNPQ</span></label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right"></div></td>
        <td><input type="submit" name="button" id="button" value="Atualizar" /></td>
      </tr>
    </table>
    
  </div>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p align="center">
  <label></label>
  <br />
</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"dd/mm/yyyy", validateOn:["change"], isRequired:false, useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {pattern:"000.000.000-00", useCharacterMasking:true, isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom", pattern:"+00 (00) 0000-0000", isRequired:false, useCharacterMasking:true});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "phone_number", {isRequired:false, useCharacterMasking:true, format:"phone_custom", pattern:"+00 (00) 0000-0000"});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsMembro);
?>