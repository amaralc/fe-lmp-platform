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
<big>LOGs (Registro de Publica&ccedil;&otilde;es de Notas)<br>
<br>
</big></small></span></big></big>
<b><font color=blue>ATENÇÃO: As mensagens de erro no login não são necessariamente tentativas de invasão do sistema. Os navegadores de internet costumam tentar informar uma senha armazenada no seu cache ou logar com senha e login nulos antes de requisitar uma senha ao usuário. Se existir alguma suspeita de tentativa de invasão, informe o CPD que tomará as medidas necessárias.</font></b>
<br><big><big><span
 style="font-weight: bold;"></span></big></big>
<table cellpadding="2" cellspacing="2" border="0"
 style="text-align: left; width: 80%; margin-right: auto; margin-left: auto;">
  <tbody>
    <tr>
      <td style="vertical-align: top;">
<table border=1 width="100%">
<tr><td>Data</td><td>Arquivo</td><td>IP</td></tr>
<?php
$entradas = file("../arquivos/LOG");
$N = sizeof($entradas);
for($i=0;$i<$N;$i++)
{
	$dado=explode(";",$entradas[$i]);
	echo("<tr><td>$dado[1]</td><td>$dado[0]</td><td>$dado[2]</td></tr>");
}

?>
</table>
 <br><br>     
<div style="text-align: center;"><a href="index.php">Voltar</a><br>
      </div>
      <span style="font-weight: bold;"></span></td>
    </tr>
  </tbody>
</table>
<big><big><span style="font-weight: bold;"><small><br>
</small></span></big></big>
</div>
<?php include("copyright.php"); ?>
</body>
</html>

