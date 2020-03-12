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

$colname_rsMembro = "-1";
if (isset($_GET['id_membro'])) {
  $colname_rsMembro = $_GET['id_membro'];
}
mysql_select_db($database_lmp, $lmp);
$query_rsMembro = sprintf("SELECT * FROM membros WHERE id_membro = %s", GetSQLValueString($colname_rsMembro, "int"));
$rsMembro = mysql_query($query_rsMembro, $lmp) or die(mysql_error());
$row_rsMembro = mysql_fetch_assoc($rsMembro);
$totalRows_rsMembro = mysql_num_rows($rsMembro);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detalhe do Membro</title>
<link href="../estilo-texto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <table width="633" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td width="155" rowspan="11" align="center" valign="top" class="formulario"><img src="../estrutura/fotos_equipe/<?php echo $row_rsMembro['foto']; ?>" /></td>
      <td colspan="2" class="tituloTabela"><?php echo $row_rsMembro['membro_nome']; ?> (<?php echo $row_rsMembro['membro_apelido']; ?>)</td>
    </tr>
    <tr>
      <td width="155" class="formularioSite"><div align="left">Data de Nascimento:</div></td>
      <td width="323" class="formularioSite"><?php echo $row_rsMembro['membro_nasc']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Nivel:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_nivel']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Curso:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_curso']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Endereço:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_endereco']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">CPF:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_cpf']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">RG:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_rg']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">e-mail:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_email']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Telefone 1:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_telefone1']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Telefone 2:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_telefone2']; ?></td>
    </tr>
    <tr>
      <td class="formularioSite"><div align="left">Observações:</div></td>
      <td class="formularioSite"><?php echo $row_rsMembro['membro_obs']; ?></td>
    </tr>
  </table>
</div>
<div align="center"><a href="membro_grupo.php?id_membro=<?php echo $row_rsMembro['id_membro']; ?>">Ver/Editar Grupos de <span class="formulario"><?php echo $row_rsMembro['membro_apelido']; ?></span>.</a><span class="titulogrande"><br />
  <br />
  Horário de Laboratório </span>
</div>
<div align="center">
<table width="10%" border="0" cellspacing="2" cellpadding="2">
      <tr class="tituloTabela">
        <td class="tituloTabela">&nbsp;</td>
        <td>Segunda</td>
        <td>Terça</td>
        <td>Quarta</td>
        <td>Quinta</td>
        <td>Sexta</td>
      </tr>
      <tr>
        <td class="tituloTabela">7h30</td>
        <td><?php if ($row_rsMembro['se_01'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_01'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
          <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_01'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_01'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_01'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">8h20</td>
        <td><?php if ($row_rsMembro['se_02'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_02'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_02'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_02'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_02'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">9h10</td>
        <td><?php if ($row_rsMembro['se_03'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_03'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_03'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_03'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_03'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">10h20</td>
        <td><?php if ($row_rsMembro['se_04'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_04'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_04'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_04'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_04'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">11h10</td>
        <td><?php if ($row_rsMembro['se_05'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_05'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_05'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_05'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_05'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr class="tituloTabela">
        <td colspan="6">Almoço</td>
      </tr>
      <tr>
        <td class="tituloTabela">13h30</td>
        <td><?php if ($row_rsMembro['se_06'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_06'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_06'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_06'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_06'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">14h20</td>
        <td><?php if ($row_rsMembro['se_07'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_07'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_07'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_07'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_07'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">15h10</td>
        <td><?php if ($row_rsMembro['se_08'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_08'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_08'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_08'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_08'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">16h20</td>
        <td><?php if ($row_rsMembro['se_09'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_09'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_09'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_09'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_09'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr>
        <td class="tituloTabela">17h10</td>
        <td><?php if ($row_rsMembro['se_10'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['te_10'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qa_10'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['qi_10'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
        <td><?php if ($row_rsMembro['sx_10'] == 'Y') { // Mostra se Igual a Y ?>
          <img src="horario_lmp.png" alt="" width="120" height="40" />
        <?php } ?></td>
      </tr>
      <tr class="tituloTabela">
        <td colspan="6">Feierabend</td>
      </tr>
    </table>
  </div>
</body>
</html>
<?php
mysql_free_result($rsMembro);
?>
