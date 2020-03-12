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
$query_rsGrad = "SELECT M.id_membro, M.membro_nome, M.membro_curso, M.membro_email, M.foto FROM .membros M WHERE M.membro_nivel = 'Graduando' AND M.membro_tipo = '1' ORDER BY M.membro_nome";
$rsGrad = mysql_query($query_rsGrad, $lmp) or die(mysql_error());
$row_rsGrad = mysql_fetch_assoc($rsGrad);
$totalRows_rsGrad = mysql_num_rows($rsGrad);

$maxRows_rsPesquisadores = 10;
$pageNum_rsPesquisadores = 0;
if (isset($_GET['pageNum_rsPesquisadores'])) {
  $pageNum_rsPesquisadores = $_GET['pageNum_rsPesquisadores'];
}
$startRow_rsPesquisadores = $pageNum_rsPesquisadores * $maxRows_rsPesquisadores;

mysql_select_db($database_lmp, $lmp);
$query_rsPesquisadores = "SELECT id_membro, membro_nome, membro_curso, membro_nivel, membro_tipo, membro_email, foto FROM membros WHERE membro_nivel = 'Pesquisador' AND membro_tipo = '1' ORDER BY membro_nome";
$query_limit_rsPesquisadores = sprintf("%s LIMIT %d, %d", $query_rsPesquisadores, $startRow_rsPesquisadores, $maxRows_rsPesquisadores);
$rsPesquisadores = mysql_query($query_limit_rsPesquisadores, $lmp) or die(mysql_error());
$row_rsPesquisadores = mysql_fetch_assoc($rsPesquisadores);

if (isset($_GET['totalRows_rsPesquisadores'])) {
  $totalRows_rsPesquisadores = $_GET['totalRows_rsPesquisadores'];
} else {
  $all_rsPesquisadores = mysql_query($query_rsPesquisadores);
  $totalRows_rsPesquisadores = mysql_num_rows($all_rsPesquisadores);
}
$totalPages_rsPesquisadores = ceil($totalRows_rsPesquisadores/$maxRows_rsPesquisadores)-1;

mysql_select_db($database_lmp, $lmp);
$query_rsDoutorandos = "SELECT id_membro, membro_nome, membro_curso, membro_nivel, membro_tipo, membro_email, foto FROM membros WHERE membro_nivel = 'Doutorando' AND membro_tipo = '1' ORDER BY id_membro ASC";
$rsDoutorandos = mysql_query($query_rsDoutorandos, $lmp) or die(mysql_error());
$row_rsDoutorandos = mysql_fetch_assoc($rsDoutorandos);
$totalRows_rsDoutorandos = mysql_num_rows($rsDoutorandos);

mysql_select_db($database_lmp, $lmp);
$query_rsMestrando = "SELECT id_membro, membro_nome, membro_curso, membro_email, foto FROM membros WHERE membro_nivel = 'Mestrando' AND membro_tipo = '1' ORDER BY membro_nome ASC";
$rsMestrando = mysql_query($query_rsMestrando, $lmp) or die(mysql_error());
$row_rsMestrando = mysql_fetch_assoc($rsMestrando);
$totalRows_rsMestrando = mysql_num_rows($rsMestrando);

mysql_select_db($database_lmp, $lmp);
$query_rsApoio = "SELECT id_membro, membro_nome, membro_curso, membro_email, foto FROM membros WHERE membro_nivel = 'Apoio' AND membro_tipo = '1' ORDER BY membro_nome ASC";
$rsApoio = mysql_query($query_rsApoio, $lmp) or die(mysql_error());
$row_rsApoio = mysql_fetch_assoc($rsApoio);
$totalRows_rsApoio = mysql_num_rows($rsApoio);

mysql_select_db($database_lmp, $lmp);
$query_rsAlunointercambio = "SELECT id_membro, membro_nome, membro_curso, membro_nivel, membro_tipo, membro_email, foto, membro_obs FROM membros WHERE membro_tipo = 3";
$rsAlunointercambio = mysql_query($query_rsAlunointercambio, $lmp) or die(mysql_error());
$row_rsAlunointercambio = mysql_fetch_assoc($rsAlunointercambio);
$totalRows_rsAlunointercambio = mysql_num_rows($rsAlunointercambio);

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>LMP - Estrutura - Equipe</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../estilo-texto.css" rel="stylesheet" type="text/css">
</head>

<body>
<p><a href="../home.html" target="mainFrame">LMP</a>&gt;<a href="estrutura_principal.html">Estrutura</a>&gt;Equipe</p>
<h4 align="center">Equipe</h4>
<div align="center">
  <table width="85%" cellspacing="0">
    <tr class="tituloTabela">
      <td colspan="3">Coordenadores</td>
    </tr>
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="8%" valign="top" bordercolor="#000000"><div align="center"><a href="../perfil/pessoal/walter.html"><img src="fotos_equipe/ww.jpg" alt="ww" width="100" height="137" border="0"></a></div></td>
      <td width="81%" valign="middle" bordercolor="#000000"><ul>
        <li><a href="../perfil/pessoal/walter.html">Prof. Dr.-Ing. Walter Lindolfo Weingaertner</a></li>
      </ul>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><div align="center"><a href="../perfil/pessoal/rolf.html"><img src="fotos_equipe/rolf.jpg" alt="rolf" width="100" height="133" border="0"></a></div></td>
      <td valign="middle"><ul>
        <li><a href="../perfil/pessoal/rolf.html">Prof. Dr. Eng. Rolf Bertrand Schroeter</a></li>
      </ul>      </td>
    </tr>
    <tr class="tituloTabela">
      <td colspan="3">Apoio</td>
    </tr>
    <?php do { ?>
      <tr>
        <td>&nbsp;</td>
        <td valign="middle"><div align="center"><img src="fotos_equipe/<?php echo $row_rsApoio['foto']; ?>" alt=""></div></td>
        <td valign="middle"><ul>
          <li><strong><?php echo $row_rsApoio['membro_nome']; ?></strong><br>
            <?php echo $row_rsApoio['membro_curso']; ?><br>
            <a href="mailto:<?php echo $row_rsApoio['membro_email']; ?>"><?php echo $row_rsApoio['membro_email']; ?></a><br>
            </li>
        </ul></td>
      </tr>
      <?php } while ($row_rsApoio = mysql_fetch_assoc($rsApoio)); ?>
    <tr class="tituloTabela">
      <td colspan="3">Pesquisadores</td>
    </tr>
    <?php do { 
	$colname_rsGruposdomembro = $row_rsPesquisadores['id_membro'];
mysql_select_db($database_lmp, $lmp);
$query_rsGruposdomembro = sprintf("SELECT G.grupo_nome FROM .vinc_membros_grupos V, .grupos G WHERE v_id_membro = %s AND G.id_grupo = V.v_id_grupo", GetSQLValueString($colname_rsGruposdomembro, "int"));
$rsGruposdomembro = mysql_query($query_rsGruposdomembro, $lmp) or die(mysql_error());
$row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro);
$totalRows_rsGruposdomembro = mysql_num_rows($rsGruposdomembro);?>
      <tr>
        <td>&nbsp;</td>
        <td valign="middle"><div align="center"><img src="fotos_equipe/<?php echo $row_rsPesquisadores['foto']; ?>" alt=""></div></td>
        <td valign="middle"><ul>
          <li><strong><?php echo $row_rsPesquisadores['membro_nome']; ?></strong><br>
            <?php echo $row_rsPesquisadores['membro_curso']; ?><br>
            Grupo(s) de Trabalho: 
            <?php do { echo $row_rsGruposdomembro['grupo_nome']; ?> 
			<?php } while ($row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro));?><br>
            <a href="mailto:<?php echo $row_rsPesquisadores['membro_email']; ?>"><?php echo $row_rsPesquisadores['membro_email']; ?></a><br>
            </li>
        </ul></td>
      </tr>
      <?php } while ($row_rsPesquisadores = mysql_fetch_assoc($rsPesquisadores)); ?>
    <tr>
      <td colspan="3" class="tituloTabela">Alunos Doutorado</td>
    </tr>
    <?php

	 do {
$colname_rsGruposdomembro = $row_rsDoutorandos['id_membro'];
mysql_select_db($database_lmp, $lmp);
$query_rsGruposdomembro = sprintf("SELECT G.grupo_nome FROM .vinc_membros_grupos V, .grupos G WHERE v_id_membro = %s AND G.id_grupo = V.v_id_grupo", GetSQLValueString($colname_rsGruposdomembro, "int"));
$rsGruposdomembro = mysql_query($query_rsGruposdomembro, $lmp) or die(mysql_error());
$row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro);
$totalRows_rsGruposdomembro = mysql_num_rows($rsGruposdomembro);
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td valign="middle"><div align="center"><img src="fotos_equipe/<?php echo $row_rsDoutorandos['foto']; ?>" alt=""></div></td>
        <td valign="middle"><ul>
          <li><strong><?php echo $row_rsDoutorandos['membro_nome']; ?></strong><br>
            Curso: <?php echo $row_rsDoutorandos['membro_curso']; ?><br>
            Grupo(s) de Trabalho: 
            <?php do { echo $row_rsGruposdomembro['grupo_nome']; ?> 
			<?php } while ($row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro));?><br>
            <a href="mailto:<?php echo $row_rsDoutorandos['membro_email']; ?>"><?php echo $row_rsDoutorandos['membro_email']; ?></a><br>
            </li>
        </ul></td>
      </tr>
      <?php } while ($row_rsDoutorandos = mysql_fetch_assoc($rsDoutorandos)); ?>
    <tr class="tituloTabela">
      <td colspan="3">Alunos Mestrado</td>
    </tr>
    <?php do { 
	$colname_rsGruposdomembro = $row_rsMestrando['id_membro'];
mysql_select_db($database_lmp, $lmp);
$query_rsGruposdomembro = sprintf("SELECT G.grupo_nome FROM .vinc_membros_grupos V, .grupos G WHERE v_id_membro = %s AND G.id_grupo = V.v_id_grupo", GetSQLValueString($colname_rsGruposdomembro, "int"));
$rsGruposdomembro = mysql_query($query_rsGruposdomembro, $lmp) or die(mysql_error());
$row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro);
$totalRows_rsGruposdomembro = mysql_num_rows($rsGruposdomembro);
	?>
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle"><img src="fotos_equipe/<?php echo $row_rsMestrando['foto']; ?>"></td>
        <td valign="middle"><ul>
          <li><strong><?php echo $row_rsMestrando['membro_nome']; ?></strong><br>
            Curso: <?php echo $row_rsMestrando['membro_curso']; ?><br>
            Grupo(s) de Trabalho: 
            <?php do { echo $row_rsGruposdomembro['grupo_nome']; ?> 
			<?php } while ($row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro));?><br>
            <a href="mailto:<?php echo $row_rsMestrando['membro_email']; ?>"><?php echo $row_rsMestrando['membro_email']; ?></a><br>
            </li>
        </ul></td>
      </tr>
      <?php } while ($row_rsMestrando = mysql_fetch_assoc($rsMestrando)); ?>
    <tr class="tituloTabela">
      <td colspan="3">Alunos Gradua&ccedil;&atilde;o</td>
    </tr>
    <?php do { 
$colname_rsGruposdomembro = $row_rsGrad['id_membro'];
mysql_select_db($database_lmp, $lmp);
$query_rsGruposdomembro = sprintf("SELECT G.grupo_nome FROM .vinc_membros_grupos V, .grupos G WHERE v_id_membro = %s AND G.id_grupo = V.v_id_grupo", GetSQLValueString($colname_rsGruposdomembro, "int"));
$rsGruposdomembro = mysql_query($query_rsGruposdomembro, $lmp) or die(mysql_error());
$row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro);
$totalRows_rsGruposdomembro = mysql_num_rows($rsGruposdomembro);


	?>
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle"><img src="fotos_equipe/<?php echo $row_rsGrad['foto']; ?>"></td>
        <td valign="middle"><ul>
          <li><span class="contato"><strong><?php echo $row_rsGrad['membro_nome']; ?></strong><br>
            Curso: <?php echo $row_rsGrad['membro_curso']; ?><br>
            Grupo(s) de Trabalho: 
            <?php do { echo $row_rsGruposdomembro['grupo_nome']; ?> 
			<?php } while ($row_rsGruposdomembro = mysql_fetch_assoc($rsGruposdomembro));?><br>
            <a href="mailto:<?php echo $row_rsGrad['membro_email']; ?>"><?php echo $row_rsGrad['membro_email']; ?></a><br>
            </span></li>
        </ul></td>
      </tr>
      <?php } while ($row_rsGrad = mysql_fetch_assoc($rsGrad)); ?>
    <tr class="tituloTabela">
      <td colspan="3">Alunos em Interc&acirc;mbio</td>
    </tr>
    <?php do { ?>
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle"><img src="fotos_equipe/<?php echo $row_rsAlunointercambio['foto']; ?>" border="0"></td>
        <td valign="middle"><ul>
            <li><strong><?php echo $row_rsAlunointercambio['membro_nome']; ?></strong><br>
                <?php echo $row_rsAlunointercambio['membro_nivel']; ?> em <?php echo $row_rsAlunointercambio['membro_curso']; ?><br>
                <?php echo $row_rsAlunointercambio['membro_obs']; ?><br>
                <a href="mailto:<?php echo $row_rsAlunointercambio['membro_email']; ?>"><?php echo $row_rsAlunointercambio['membro_email']; ?></a><br>
            </li>
        </ul></td>
      </tr>
      <?php } while ($row_rsAlunointercambio = mysql_fetch_assoc($rsAlunointercambio)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($rsGrad);

mysql_free_result($rsGruposdomembro);

mysql_free_result($rsAlunointercambio);

mysql_free_result($rsApoio);

mysql_free_result($rsMestrando);

mysql_free_result($rsPesquisadores);

mysql_free_result($rsDoutorandos);
?>
