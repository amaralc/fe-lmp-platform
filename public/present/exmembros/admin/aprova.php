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
if ($HTTP_SERVER_VARS["PHP_AUTH_USER"] == "cpd" ||$HTTP_SERVER_VARS["PHP_AUTH_USER"] == "sunada" || $HTTP_SERVER_VARS["PHP_AUTH_USER"] == "cristian")
{

$gfile = '../arquivos/EXMEMBROS';
$dfile = '../arquivos/CADASTRO';
        if(file_exists($dfile))
	{
             $fp1  =  fopen($dfile,"r");
             $entradas_anteriores  =  fread($fp1,filesize($dfile));
             fclose($fp1);
        }
if(isset($gfile) && isset($dfile))
{ 
	$entradas = file($gfile);
	$total = sizeof($entradas);
	$fp  =  fopen($gfile,"w");
 	$saida = fopen($dfile,"w");	
	flock($fp,1);
	flock($saida,1);
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
		else
		{
                        $dados = explode(";",$entradas[$i]);
                        $tdados = sizeof($dados);
		        for ($j = 0;$j < $tdados; $j++)
                        {
                                $dados[$j] = str_replace("\n","",$dados[$j]);
                                fputs($saida,$dados[$j]);
                                if ($j != $tdados - 1)
                                {
                                        fputs($saida,";");
                                }
                        }
                                fputs($saida,"\n");

			if(isset($entradas_anteriores))  fputs($saida,$entradas_anteriores);
		}	
	}
	flock($fp,3);
        fclose($fp);
	flock($saida,3);
	fclose($saida);
}
}
else
{
echo("ERRO!!! USUARIO N\xc3O AUTORIZADO A EXECUTAR ESTA A\xc7\xc3O!!!!!<br><a href=\"http://www.lmp.ufsc.br/exmembros\">Retornar para p\xe1gina exmembros</a>"
);
$num1 = "N\xc3O";
}


?>
<br>
ENTRADA&nbsp;
<?php
if (!isset($num1))
{
$num1 = $num + 1; 
}
echo("$num1");
?>
&nbsp;APROVADA!!! 
<?
$msg = "$NOME_COMPLETO\nSeu cadastro na pagina dos ex-membros do LMP foi APROVADO. Os dados que voce informou estao disponiveis no site http://www.lmp.ufsc.br/exmembros\nQualquer problema, contate o CPD do LMP\n\ncpd@lmp.ufsc.br";
mail("$dados[2]", "Cadastro de ex-membro do LMP APROVADO",$msg,"From: cpd@lmp.ufsc.br");
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
