<!DOCTYPE doctype PUBLIC "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
   
  <meta http-equiv="Content-Type"
 content="text/html; charset=iso-8859-1">
   
  <meta name="Generator" content="Microsoft Word 97">
   
  <meta name="GENERATOR"
 content="Mozilla/4.74 [en] (WinNT; U) [Netscape]">
   
  <meta name="Author" content="Daniel Campos dos Santos">
   
  <meta name="Description" content="Equipe do LMP">
  <title>LMP - Laborat&oacute;rio de Mec&acirc;nica de Precis&atilde;o</title>
</head>
<body text="#000000" bgcolor="#ffffff" link="#0000ff" vlink="#551a8b"
 alink="#000088" background="http://www.lmp.ufsc.br/figuras/backg.jpg"
 nosave="">
<div align="right"><font face="Arial,Helvetica"><font color="#3333ff"><font
 size="+1">Ex-integrantes</font></font></font>
<hr width="100%"></div>
<p><br>
</p>
<center>
<table cellspacing="0" cellpadding="0" width="90%" bordercolor="#c0c0c0">
  <tbody>
<?php
$num = $_GET['num'];
$entrada = file("./arquivos/CADASTRO");
sort($entrada);
$dados = explode(";",$entrada[$num]);
echo("
<center><h3>$dados[0]</h3></center>
<h4>Entrada: $dados[13] - Sa�da: $dados[14]</h4>
<tr>
<td><b>Nome:</b> $dados[0]
</td>
<td><b>Grupo:</b> $dados[1]
</td>
");
if ("$dados[3]" != "SIM")
{
echo ("<td><b>Email:</b> N�O DISPON�VEL</td>");
}
else
{
echo("      <td><b>Email:</b> $dados[2]");
echo("      </td>");
}
   echo("</tr>
<tr>
<td>
<b>Telefone 1 ($dados[4]):</b>
");
if ("$dados[6]" != "SIM")
{
echo ("N\xc3O DISPON\xcdVEL");
}
else
{
echo("      $dados[5]");
}
echo("
</td>
<td>
<b>Telefone 2 ($dados[7]):</b>
");
if ("$dados[9]" != "SIM")
{
echo ("N\xc3O DISPON\xcdVEL");
}
else
{
echo("      $dados[8]");
}
echo("
</td>
</tr>
<tr>
<td>
<b>Data de Nascimento:</b> $dados[10]/$dados[11]/$dados[12]
</td>
</tr>
<tr>
<td>
<br>
</td>
</tr>
<tr>
<td colspan=\"3\">
<b>Endere\xe7o Comercial:</b>
");
if ($dados[20] != SIM)
{
echo("
</td>
</tr>
<tr>
<td>
N�O DISPON�VEL
</td>
</tr>");
}
else
{
echo("
$dados[21]
</td>
</tr>
<tr>
<td>
$dados[22]
</td>
<td>
<b>Cidade/Estado:</b> $dados[23]/$dados[24]
</td>
</tr>
<tr>
<td>
<b>Pa\xeds:</b> $dados[25]
</td>
<td>
<b>CEP:</b> $dados[26]
</td>
</tr>

");
}
if ($dados[27] != "")
{
echo("
<tr>
<td>
<br>
</td>
</tr>
<tr>
<td colspan=\"3\">
<b>Observa��es:</b> $dados[27]
</td>
</tr>
");
}
?>



    <tr>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
  
</tbody>
</table>
<a href="exmembros.php">VOLTAR PARA LISTA DE EX-INTEGRANTES</a>
</center>
<br>
</body>
</html>
