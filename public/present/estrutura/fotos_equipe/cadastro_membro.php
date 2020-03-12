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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO membros (membro_nome, membro_apelido, membro_nasc, membro_curso, membro_nivel, membro_cpf, membro_rg, membro_endereco, membro_tipo, membro_email, membro_telefone1, membro_telefone2, se_01, se_02, se_03, se_04, se_05, se_06, se_07, se_08, se_09, se_10, te_01, te_02, te_03, te_04, te_05, te_06, te_07, te_08, te_09, te_10, qa_01, qa_02, qa_03, qa_04, qa_05, qa_06, qa_07, qa_08, qa_09, qa_10, qi_01, qi_02, qi_03, qi_04, qi_05, qi_06, qi_07, qi_08, qi_09, qi_10,sx_01, sx_02, sx_03, sx_04, sx_05, sx_06, sx_07, sx_08, sx_09, sx_10, membro_obs) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['apelido'], "text"),
                       GetSQLValueString($_POST['data_nasc'], "date"),
                       GetSQLValueString($_POST['curso'], "text"),
                       GetSQLValueString($_POST['nivel'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
                       GetSQLValueString($_POST['tipo'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefone1'], "text"),
                       GetSQLValueString($_POST['telefone2'], "text"),
					   GetSQLValueString($_POST['se_01'], "text"),
                       GetSQLValueString($_POST['se_02'], "text"),
                       GetSQLValueString($_POST['se_03'], "text"),
                       GetSQLValueString($_POST['se_04'], "text"),
                       GetSQLValueString($_POST['se_05'], "text"),
                       GetSQLValueString($_POST['se_06'], "text"),
                       GetSQLValueString($_POST['se_07'], "text"),
                       GetSQLValueString($_POST['se_08'], "text"),
                       GetSQLValueString($_POST['se_09'], "text"),
                       GetSQLValueString($_POST['se_10'], "text"),
                       GetSQLValueString($_POST['te_01'], "text"),
                       GetSQLValueString($_POST['te_02'], "text"),
                       GetSQLValueString($_POST['te_03'], "text"),
                       GetSQLValueString($_POST['te_04'], "text"),
                       GetSQLValueString($_POST['te_05'], "text"),
                       GetSQLValueString($_POST['te_06'], "text"),
                       GetSQLValueString($_POST['te_07'], "text"),
                       GetSQLValueString($_POST['te_08'], "text"),
                       GetSQLValueString($_POST['te_09'], "text"),
                       GetSQLValueString($_POST['te_10'], "text"),
                       GetSQLValueString($_POST['qa_01'], "text"),
                       GetSQLValueString($_POST['qa_02'], "text"),
                       GetSQLValueString($_POST['qa_03'], "text"),
                       GetSQLValueString($_POST['qa_04'], "text"),
                       GetSQLValueString($_POST['qa_05'], "text"),
                       GetSQLValueString($_POST['qa_06'], "text"),
                       GetSQLValueString($_POST['qa_07'], "text"),
                       GetSQLValueString($_POST['qa_08'], "text"),
                       GetSQLValueString($_POST['qa_09'], "text"),
                       GetSQLValueString($_POST['qa_10'], "text"),
                       GetSQLValueString($_POST['qi_01'], "text"),
                       GetSQLValueString($_POST['qi_02'], "text"),
                       GetSQLValueString($_POST['qi_03'], "text"),
                       GetSQLValueString($_POST['qi_04'], "text"),
                       GetSQLValueString($_POST['qi_05'], "text"),
                       GetSQLValueString($_POST['qi_06'], "text"),
                       GetSQLValueString($_POST['qi_07'], "text"),
                       GetSQLValueString($_POST['qi_08'], "text"),
                       GetSQLValueString($_POST['qi_09'], "text"),
                       GetSQLValueString($_POST['qi_10'], "text"),
                       GetSQLValueString($_POST['sx_01'], "text"),
                       GetSQLValueString($_POST['sx_02'], "text"),
                       GetSQLValueString($_POST['sx_03'], "text"),
                       GetSQLValueString($_POST['sx_04'], "text"),
                       GetSQLValueString($_POST['sx_05'], "text"),
                       GetSQLValueString($_POST['sx_06'], "text"),
                       GetSQLValueString($_POST['sx_07'], "text"),
                       GetSQLValueString($_POST['sx_08'], "text"),
                       GetSQLValueString($_POST['sx_09'], "text"),
                       GetSQLValueString($_POST['sx_10'], "text"),
                       GetSQLValueString($_POST['observacoes'], "text"));

  mysql_select_db($database_lmp, $lmp);
  $Result1 = mysql_query($insertSQL, $lmp) or die(mysql_error());

  $insertGoTo = "../../adm/membro_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_lmp, $lmp);
$query_rsGrupos = "SELECT * FROM grupos ORDER BY id_grupo ASC";
$rsGrupos = mysql_query($query_rsGrupos, $lmp) or die(mysql_error());
$row_rsGrupos = mysql_fetch_assoc($rsGrupos);
$totalRows_rsGrupos = mysql_num_rows($rsGrupos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro novo Membro</title>
<link href="../../estilo-texto.css" rel="stylesheet" type="text/css" />
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <span class="titulogrande">Cadastro de Novo Membro  </span>
  <p>Campos em <span class="formularioSite">AZUL</span> serão publicados no site.</p>
  <div align="center">
    <table width="68%" border="0" cellpadding="1" cellspacing="1" class="formulario">
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Nome:</div></td>
        <td width="538"><label>
          <input name="nome" type="text" class="caixatexto" id="nome" />
        </label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Apelido:</div></td>
        <td><label>
          <input name="apelido" type="text" class="caixatexto" id="apelido" />
        <span class="contatoesq">Como é conhecido no Laboratório.          </span></label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Data de Nascimento:</div></td>
        <td><span id="sprytextfield1">
        <label>
        <input name="data_nasc" type="text" class="caixatexto" id="data_nasc" size="10" maxlength="10" />
        </label>
        <span class="textfieldInvalidFormatMsg">Formato Incorreto. Insira no formato DD/MM/AAAA.</span></span></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Curso:</div></td>
        <td><label>
          <input name="curso" type="text" class="caixatexto" id="curso" value="Engenharia Mecânica" />
        </label></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right">Categoria:</div></td>
        <td><table width="363" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label>
                <input name="nivel" type="radio" id="nivel_0" value="Graduando" checked="checked" />
Graduando</label></td>
            </tr>
            <tr>
              <td><label>
                <input type="radio" name="nivel" value="Mestrando" id="nivel_1" />
Mestrando</label></td>
            </tr>
            <tr>
              <td height="21"><label>
                <input type="radio" name="nivel" value="Doutorando" id="nivel_2" />
Doutorando</label></td>
            </tr>
            <tr>
              <td height="21"><input type="radio" name="nivel" value="Pesquisador" id="nivel_3" />
Pesquisador</td>
            </tr>
          </table>          </td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">CPF:</div></td>
        <td><span id="sprytextfield2">
        <label>
        <input name="cpf" type="text" class="caixatexto" id="cpf" size="14" />
        </label>
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top">RG:</td>
        <td><label>
          <input name="rg" type="text" class="caixatexto" id="rg" size="14" />
        </label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Endereço</div></td>
        <td>
          <input name="endereco" type="text" class="caixatexto" id="endereco" value="Rua , Número, Bairro, Florianópolis, SC, 88" size="50" /></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right" class="formularioSite">Tipo de Membro</div></td>
        <td><label></label>
          <table width="239" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="239"><input name="tipo" type="radio" id="tipo" value="1" checked="checked" />
Equipe Atual</td>
            </tr>
            <tr>
              <td><input type="radio" name="tipo" id="tipo2" value="2" />
Ex-Membro</td>
            </tr>
            <tr>
              <td><input type="radio" name="tipo" id="tipo3" value="3" />
Em intercâmbio</td>
            </tr>
            <tr>
              <td><label>
                <input type="radio" name="tipo" id="tipo4" value="4" />
Inativo</label></td>
            </tr>
          </table></td>
      </tr>
      <tr class="formularioSite">
        <td width="121" height="1" align="right" valign="top"><div align="right" class="formularioSite">E-mail</div></td>
        <td><span id="sprytextfield3">
        <label>
        <input name="email" type="text" class="caixatexto" id="email" />
        </label>
        <span class="textfieldRequiredMsg">Campo Obrigatorio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Telefone 1</div></td>
        <td><span id="sprytextfield4">
        <label>
        <input name="telefone1" type="text" class="caixatexto" id="telefone1" size="18" />
        </label>
        <span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Telefone 2</div></td>
        <td><span id="sprytextfield5">
        <label>
        <input name="telefone2" type="text" class="caixatexto" id="telefone2" size="18" />
        </label>
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Observações Gerais</div> 
        (Palavras Chaves)</td>
        <td><label>
          <textarea name="observacoes" cols="45" rows="5" class="caixatexto" id="observacoes"></textarea>
          <br />
          <span class="contatoesq">Exemplo:  Estágio IPT, Fala Alemão, Inglês, Bolsa CNPQ</span></label></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right">Horário LMP</div></td>
        <td align="left">  
          
          <div align="left">
            <table width="220" border="0" align="left" cellpadding="1" cellspacing="1">
              <tr class="tituloTabela">
                <td class="tituloTabela"><div align="center"></div></td>
                <td><div align="center">seg</div></td>
                <td><div align="center">ter</div></td>
                <td><div align="center">qua</div></td>
                <td><div align="center">qui</div></td>
                <td><div align="center">sex</div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">7h30</div></td>
                <td><input name="se_01" type="checkbox" class="largerCheckbox" id="se_01" value="Y" /></td>
                <td><div align="center">
                    <input name="te_01" type="checkbox" class="largerCheckbox" id="te_01" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_01" type="checkbox" class="largerCheckbox" id="qa_01" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_01" type="checkbox" class="largerCheckbox" id="qi_01" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_01" type="checkbox" class="largerCheckbox" id="sx_01" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">8h20</div></td>
                <td><div align="center">
                    <input name="se_02" type="checkbox" class="largerCheckbox" id="se_02" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_02" type="checkbox" class="largerCheckbox" id="te_02" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_02" type="checkbox" class="largerCheckbox" id="qa_02" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_02" type="checkbox" class="largerCheckbox" id="qi_02" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_02" type="checkbox" class="largerCheckbox" id="sx_02" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">9h10</div></td>
                <td><div align="center">
                    <input name="se_03" type="checkbox" class="largerCheckbox" id="se_03" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_03" type="checkbox" class="largerCheckbox" id="te_03" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_03" type="checkbox" class="largerCheckbox" id="qa_03" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_03" type="checkbox" class="largerCheckbox" id="qi_03" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_03" type="checkbox" class="largerCheckbox" id="sx_03" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">10h20</div></td>
                <td><div align="center">
                    <input name="se_04" type="checkbox" class="largerCheckbox" id="se_04" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_04" type="checkbox" class="largerCheckbox" id="te_04" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_04" type="checkbox" class="largerCheckbox" id="qa_04" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_04" type="checkbox" class="largerCheckbox" id="qi_04" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_04" type="checkbox" class="largerCheckbox" id="sx_04" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">11h10</div></td>
                <td><div align="center">
                    <input name="se_05" type="checkbox" class="largerCheckbox" id="se_05" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_05" type="checkbox" class="largerCheckbox" id="te_05" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_05" type="checkbox" class="largerCheckbox" id="qa_05" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_05" type="checkbox" class="largerCheckbox" id="qi_05" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_05" type="checkbox" class="largerCheckbox" id="sx_05" value="Y" />
                    </div></td>
              </tr>
              <tr class="tituloTabela">
                <td colspan="6"><div align="center">Almoço</div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">13h30</div></td>
                <td><div align="center">
                    <input name="se_06" type="checkbox" class="largerCheckbox" id="se_06" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_06" type="checkbox" class="largerCheckbox" id="te_06" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_06" type="checkbox" class="largerCheckbox" id="qa_06" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_06" type="checkbox" class="largerCheckbox" id="qi_06" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_06" type="checkbox" class="largerCheckbox" id="sx_06" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">14h20</div></td>
                <td><div align="center">
                    <input name="se_07" type="checkbox" class="largerCheckbox" id="se_07" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_07" type="checkbox" class="largerCheckbox" id="te_07" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_07" type="checkbox" class="largerCheckbox" id="qa_07" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_07" type="checkbox" class="largerCheckbox" id="qi_07" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_07" type="checkbox" class="largerCheckbox" id="sx_07" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">15h10</div></td>
                <td><div align="center">
                    <input name="se_08" type="checkbox" class="largerCheckbox" id="se_08" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_08" type="checkbox" class="largerCheckbox" id="te_08" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_08" type="checkbox" class="largerCheckbox" id="qa_08" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_08" type="checkbox" class="largerCheckbox" id="qi_08" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_08" type="checkbox" class="largerCheckbox" id="sx_08" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">16h20</div></td>
                <td><div align="center">
                    <input name="se_09" type="checkbox" class="largerCheckbox" id="se_09" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_09" type="checkbox" class="largerCheckbox" id="te_09" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_09" type="checkbox" class="largerCheckbox" id="qa_09" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_09" type="checkbox" class="largerCheckbox" id="qi_09" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_09" type="checkbox" class="largerCheckbox" id="sx_09" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td class="tituloTabela"><div align="center">17h10</div></td>
                <td><div align="center">
                    <input name="se_10" type="checkbox" class="largerCheckbox" id="se_10" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="te_10" type="checkbox" class="largerCheckbox" id="te_10" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qa_10" type="checkbox" class="largerCheckbox" id="qa_10" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="qi_10" type="checkbox" class="largerCheckbox" id="qi_10" value="Y" />
                    </div></td>
                <td><div align="center">
                    <input name="sx_10" type="checkbox" class="largerCheckbox" id="sx_10" value="Y" />
                    </div></td>
              </tr>
              <tr>
                <td colspan="6"><div align="center" class="tituloTabela">Feierabend</div></td>
              </tr>
                                              </table>
        </div></td>
      </tr>
      <tr>
        <td width="121" height="1" align="right" valign="top"><div align="right"></div></td>
        <td><input type="submit" name="button" id="button" value="Inserir" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
  </div>
</form>
<p align="center">
  <label></label>
  <br />
</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"dd/mm/yyyy", validateOn:["change"], isRequired:false, useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {pattern:"000.000.000-00", useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {format:"phone_custom", pattern:"+00 (00) 0000-0000", isRequired:false, useCharacterMasking:true});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "phone_number", {isRequired:false, useCharacterMasking:true, format:"phone_custom", pattern:"+00 (00) 0000-0000"});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsGrupos);
?>
