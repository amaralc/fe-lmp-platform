<html>
<head>
<title><?php echo("$DISCIPLINA"); ?></title>
<link rel="stylesheet" type="text/css" href="/notas/estilo.css" title="Padr&atilde;o" />
</head>
<body>
<?php 
// ESTE SCRIPT PHP FOI DESENVOLVIDO EXCLUSIVAMENTE PARA USO INTERNO NO LMP
// PELO BOLSISTA CRISTIAN THIAGO MOECKE
// VOCE PODE USA-LO E ADAPTA-LO LIVREMENTE
// MAS POR FAVOR INFORME O AUTOR PELO EMAIL
// cristian@floripa.com.br
// OBRIGADO!

$CODIGO = $_GET['CODIGO'];

$arquivo = "./arquivos/"."$CODIGO".".csv";
if(!file_exists($arquivo))
{
        die("</div><center>ERRO! ARQUIVO DE ENTRADA DE DADOS N\xc3O ENCONTRADO!!!<br><br><a href=mailto:webmaster@lmp.ufsc.br>WebMaster</a></center>");
}
$entrada = file($arquivo);
$N = sizeof($entrada);
$dado = explode(",",$entrada[0]);
$NOMEDISCIPLINA = $dado[0];
$DISCIPLINA = $dado[1];
if (strcasecmp($CODIGO,$DISCIPLINA))
{
	die("</div><center>ERRO! CODIGO INFORMADO COMO PARAMETRO DO SCRIPT NÃO CONFERE COM CODIGO DA TABELA EXISTENTE. VERIFIQUE FORMATAÇÃO DO ARQUIVO DE ENTRADA<br><br><a href=mailto:webmaster@lmp.ufsc.br>WebMaster</a></center>");
}
?>
<p align="justify" class="texto"><a href="../home.html" target="mainFrame">LMP</a>&gt;<a href="disciplinas_principal.html">Disciplinas</a>&gt;<? echo strtoupper("$CODIGO"); ?> </p>

<h4 align="right"><? echo "$NOMEDISCIPLINA - $DISCIPLINA"; ?> </h4>
<div align="center">

<table>
  <caption>&nbsp;
  <center>
  <p></p>
  </center></caption>
 <tbody>   
<tr class=titulo>
      <td><b><font face="Arial,Helvetica"><font size="-1"><a
 href="http://www.lmp.ufsc.br/rolf/perfil/pessoal/rolf.html">Prof. Dr.
Eng. Rolf Bertrand Schroeter</a></font></font></b></td>
      <td align="center"><b><font face="Arial,Helvetica"><font size="-1">Turma:
<?php
echo("$dado[2]");
?>
&nbsp;</font></font></b></td>
      <td align="center"><b><font face="Arial,Helvetica"><font size="-1">Semestre:
<?php
echo("$dado[3]");
?>
</font></font></b></td>
    </tr>
  </tbody>
</table>
</center><br>
<center>
<table id=tabela>
  <tr class=titulo>
      <?php
      $dado = explode(",",$entrada[1]);
      $M = sizeof($dado); 
      for($j=0;$j<$M;$j++)
	{
	echo("<td>");
	//if($dado[$j]=="") $dado[$j] = "&nbsp;";
	echo("$dado[$j]");
	echo("</td>");
	} 
      ?>
  </tr>
<tr><td></td></tr>
<?php
for($i=3;$i<$N;$i++)
{
if($c == "")
$c=1;
if($c == 2)
$c--;
else if($c == 1)
$c++;
echo("<tr class=linha".$c.">");

$dado = explode(",",$entrada[$i]);
$M = sizeof($dado);
      for($j=0;$j<$M;$j++)
        {
        echo("<td><font face=\"Arial,Helvetica\"><font size=\"-1\">");
        //if($dado[$j]=="") $dado[$j] = "&nbsp;";
	echo("$dado[$j]");
        echo("</font></font></td>");
        }
echo("</tr>");
}
?>
</table>
</center>
<br><br>
<?php include("admin/copyright.php"); ?>
</body>
</html>
