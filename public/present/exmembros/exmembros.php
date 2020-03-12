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
<center><h4>Clique no nome para exibir mais informações sobre o ex-integrante</h4></center>
<center><b>
Para entrar em contato com ex-integrantes que não disponibilizaram seu email
você pode enviar um email para <img src=/lmpemail.gif align=middle> 
<br>
<br>
Consultar Cadastros por ano de  
<a href="exmembrosae.php">entrada</a> ou de
<a href="exmembrosas.php">saída</a> do LMP 
</b></center><br>
<center>
<table cellspacing="0" cellpadding="0" width="90%" bordercolor="#c0c0c0">
  <tbody>
    <tr>
      <td align="left"><b><font face="Helvetica, Arial, sans-serif">Nome
Completo<br>
      </font></b></td>
      <td align="left"><b><font face="Helvetica, Arial, sans-serif">Grupo<br>
      </font></b></td>
      <td align="left"><b><font face="Helvetica, Arial, sans-serif">Email<br>
      </font></b></td>
    </tr>
<?php

$entrada = file("./arquivos/CADASTRO");
sort($entrada);
$total = sizeof($entrada);
for($i = 0; $i < $total; $i++)
{
$dados = explode(";",$entrada[$i]);
$LETRA_I = substr($dados[0],0,1);
echo("<tr>");
echo("      <td><a href=\"mostra.php?num=$i\">$dados[0]</a>");
echo("      </td>");
echo("      <td>$dados[1]");
echo("      </td>");
if ($dados[3] != "SIM")
{
echo ("<td>NÃO DISPONÍVEL</td>");
}
else
{
echo("      <td>$dados[2]");
echo("      </td>");
}
   echo("</tr>");
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
<a href="principal.html">VOLTAR PARA PÁGINA DE EX-INTEGRANTES</a>
</center>
<br>
</body>
</html>
