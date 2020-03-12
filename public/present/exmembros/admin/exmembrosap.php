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
 size="+1">Ex-membros</font></font></font>
<hr width="100%"></div>
<p><br>
</p>
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
      <td align="left"><b><font face="Helvetica, Arial, sans-serif">Publicar Email?<br>
      </font></b></td>
    </tr>
<?php
$entrada = file("../arquivos/EXMEMBROS");
$total = sizeof($entrada);
for($i = 0; $i < $total; $i++)
{
$dados = explode(";",$entrada[$i]);
echo("
   <tr>
      <td><a href=\"mostra.php?num=$i\">$dados[0]</a>
      </td>
      <td>$dados[1]
      </td>
      <td>$dados[2]
      </td>
      <td>$dados[3]
      </td>

     <td><a href=\"aprova.php?num=$i\">[APROVA]</a> - <a href=\"apaga.php?num=$i\">[APAGA]</a>
      </td>
   </tr>
");
}
?>
</tbody>
</table>
<br><br>
<a href="exmembros.php">CONSULTAR/REMOVER CADASTROS JA APROVADOS</a>
<br><a href="../admin.php">PAGINA PRINCIPAL DE ADMIN EX MEMBROS</a>
</center>
<br>
</body>
</html>
