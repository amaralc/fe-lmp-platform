<head>
<title></title>
</head>

<body background="http://www.lmp.ufsc.br/figuras/backg.jpg" bgcolor="#FFFFFF" topmargin="0" leftmargin="0">

<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
  <title>Sistema de Publica&ccedil;&atilde;o de Notas</title>
</head>
<body
 style="background-image: url(http://www.lmp.ufsc.br/figuras/backg.jpg);">
<div style="text-align: center;"><img
 src="http://www.lmp.ufsc.br/figuras/lmphp.gif" title="" alt="LMP"
 style="width: 87px; height: 110px;"><br>
<br>
<big><big><span style="font-weight: bold;">Sistema de
Publica&ccedil;&atilde;o de Notas<br>
<small>P&aacute;gina de Controle do Sistema de Publica&ccedil;&atilde;o
de Notas do LMP<br>
<br>
<big>ENVIO DE ARQUIVOS DE NOTAS<br>
<br>
</big></small></span></big></big><big><big><span
 style="font-weight: bold;"></span></big></big>
<table cellpadding="2" cellspacing="2" border="0"
 style="text-align: left; width: 80%; margin-right: auto; margin-left: auto;">
  <tbody>
    <tr>
      <td style="vertical-align: top;">

<center>
<table border="0" cellspacing="5" width="610">
  <tr>
 <br><br>
<b><font color=red>IMPORTANTE:</font>LEIA AS <a href="ajuda.php">INSTRUÇÕES</a> ANTES DE ENVIAR UM ARQUIVO DE DADOS!!! </b> 
</td>
</tr>
  <tr>
    <td>
      <form method="POST" action="add-up.php" ENCTYPE="multipart/form-data">
        <table border="0" width="592" cellpadding="2">
          <tr>
<?php
$frasef = $_POST['frasef'];
$frasel = $_POST['frasel'];
?>
            <td align="center" width="574" colspan="2"><font size="2" face="Verdana" color="#FF0000"><b><?echo$frasef;?><br><?echo$frasel;?></b></font></td>
          </tr>
          <tr>
            <td bgcolor="#0277BD" align="right" width="219"><font face="Verdana" size="2" color="#FFFFFF"><b>Local
              de Destino:</b></font></td>
            <td width="355">
        <select size="1" name="local">
        <option value="não selecionado"               selected >--- Selecione
        ---</option>
<?
        //Crie lista de diretórios onde a pessoa pode inserir os arquivos
        //<option value="caminho virtual">Nome para a pessoa reconhecer
?>
M
         <option value="/usr/local/www/data/notas/arquivos" selected>NOTAS</option>
          </select>
            </td>
          </tr>
          <tr>
            <td bgcolor="#0277BD" align="right" width="219"><font face="Verdana" size="2" color="#FFFFFF"><b>Selecione o arquivo:</b></font></td>
            <td width="355">
              <input type="file" name="file">
            </td>
          </tr>
          <tr>
            <td width="219"></td>
            <td width="355"><font face="Verdana"><input type="submit" value="Enviar Arquivo" name="Enviar Arquivo">
        </font>
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
<a href=index.php>VOLTAR</a>
</center>
</td></tr>
</table>
<?php include("copyright.php"); ?>
