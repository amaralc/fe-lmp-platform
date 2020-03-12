<!DOCTYPE doctype PUBLIC "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
            
  <meta http-equiv="Content-Type"
 content="text/html; charset=iso-8859-1">
            
  <meta name="Author" content="Cristian Thiago Moecke">
            
  <meta name="GENERATOR"
 content="Mozilla/4.74 [en] (WinNT; U) [Netscape]">
            
  <meta name="Description" content="Cadastro de Ex-Mambros">
  <title>LMP - Laborat&oacute;rio de Mec&acirc;nica de Precis&atilde;o</title>
            <!--Copyright ©1997 CTM. All Rights Reserved"-->
</head>
<body text="#000000" bgcolor="#ffffff" link="#0000ee" vlink="#551a8b"
 alink="#000099" background="http://www.lmp.ufsc.br/figuras/backg.jpg"
 nosave="">
<div align="right"><font face="Arial,Helvetica"><font color="#3333ff"><font
 size="+1">Cadastro de Ex-Membros</font></font></font>
<hr width="100%"></div>
<?php
$num = $_GET['num'];
if ($HTTP_SERVER_VARS["PHP_AUTH_USER"] == "cristian")
{
$gfile = '../arquivos/EXMEMBROS';
if(isset($gfile))
{ 
	$entradas = file($gfile);
	$total = sizeof($entradas);
	$fp  =  fopen($gfile,"w");
	flock($fp,1);
	for ($i = 0;$i < $total;$i++)
	{
		if ($i != $num)
		{
			$dados = explode(";",$entradas[$i]); 	
			$tdados = sizeof($dados);
			for ($j = 0;$j < $tdados; $j++)
			{
			 	$dados[$j] = str_replace("\n","",$dados[$j]);
				fputs($fp,$dados[$j]);
				if ($j != $tdados - 1)
				{
					fputs($fp,";");	
				}
			}
			if ($i != $total - 1)
			{
				fputs($fp,"\n");
			}
		}
	}
	flock($fp,3);
	fclose($fp);
}
}
else
{
echo("ERRO!!! USUARIO N\xc3O AUTORIZADO A EXECUTAR ESTA A\xc7\xc3O!!!!!<br><a href=\"http://www.lmp.ufsc.br/exmembros\">Retornar para p\xe1gina exmembros</a>");
$num1 = "NÃO";
} 
?>
<br>
ENTRADA&nbsp;
<?php
if (!isset($num1)){
$num1 = $num + 1; 
}
echo("$num1");
?>
&nbsp;REMOVIDA!!! 

<?
$msg = "$NOME_COMPLETO<br>Seu cadastro na pagina dos ex-membros do LMP foi REJEITADO. Por favor, entre em contato com o CPD do LMP (cpd@lmp.ufsc.br) em caso de duvidas.";
mail("$dados[2]", "Cadastro de ex-membro do LMP REJEITADO",$msg,"From: cpd@lmp.ufsc.br");
?>


<center>
<p><font face="Arial,Helvetica"><a href="http://www.lmp.ufsc.br/exmembros/admin/exmembrosap.php"><br>
PAGINA DE ADMIN EXMEMBROS</a></font></p>
</center>
<p><br>
</p>
<br>
<br>
</body>
</html>
