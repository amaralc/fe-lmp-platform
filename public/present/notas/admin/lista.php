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
<big>Disciplinas publicadas<br>
<br>
</big></small></span></big></big><big><big><span
 style="font-weight: bold;"></span></big></big>
<table cellpadding="2" cellspacing="2" border="0"
 style="text-align: left; width: 80%; margin-right: auto; margin-left: auto;">
  <tbody>
    <tr>
      <td style="vertical-align: top;">
<table border=1 width="100%">
<tr><td>Matéria</td><td>Turma</td><td>Semestre</td></tr>
<?php
chdir("../arquivos"); 
$d = opendir (".");
while ($file = readdir($d)) {
	if (!is_dir($file)) {
		if (substr($file, -4) == ".csv")
		{
		$files[] = $file;
		}
	}
}
closedir ($d);
chdir("../admin");
$N = sizeof($files);
for($i=0;$i<$N;$i++)
{
	$arquivo = file("../arquivos/"."$files[$i]");
	$dados = explode(",","$arquivo[0]");
	$codigo = strtolower($dados[1]);
	$nomearq = "$codigo".".csv";
	if(!strcmp("$nomearq", "$files[$i]"))
	{
		echo("<tr><td><a href=\"../notas.php?CODIGO=$codigo\">$dados[0] - $dados[1]</a></td><td>$dados[2]</td><td>$dados[3]</td></tr>");
	} else
	{
		echo("<tr><td>ARQUIVO INVALIDO OU COM ERROS: $files[$i] (<a href=ajuda.php>AJUDA</a> - Dica: Verifique formato do arquivo)</td></tr>");
	}
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

