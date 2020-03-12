<?php 
$NOME_COMPLETO = $_POST['NOME_COMPLETO']; 
$email = $_POST['email'];
$PUBLICAR_EMAIL = $_POST['PUBLICAR_EMAIL'];

$GRUPO = $_POST['GRUPO'];

$ANO_E = $_POST['ANO_E'];
$ANO_S = $_POST['ANO_S'];

$TELEFONE_1 = $_POST['TELEFONE_1'];
$TEL1 = $_POST['TEL1'];
$PUBLICAR_TEL1 = $_POST['PUBLICAR_TEL1'];
$TELEFONE_2 = $_POST['TELEFONE_2'];
$TEL2 = $_POST['TEL2'];
$PUBLICAR_TEL2 = $_POST['PUBLICAR_TEL2'];

$NASC_DIA = $_POST['NASC_DIA'];
$NASC_MES = $_POST['NASC_MES'];
$NASC_ANO = $_POST['NASC_ANO'];

$END_RES_ENDERECO = $_POST['END_RES_ENDERECO'];
$END_RES_CIDADE = $_POST['END_RES_CIDADE'];
$END_RES_ESTADO = $_POST['END_RES_ESTADO'];
$END_RES_PAIS = $_POST['END_RES_PAIS'];
$END_RES_CEP = $_POST['END_RES_CEP'];

$END_COM_ENDERECO = $_POST['END_COM_ENDERECO'];
$END_COM_CIDADE = $_POST['END_COM_CIDADE'];
$END_COM_ESTADO = $_POST['END_COM_ESTADO'];
$END_COM_PAIS = $_POST['END_COM_PAIS'];
$END_COM_CEP = $_POST['END_COM_CEP'];

$OBSERVACOES = $_POST['OBSERVACOES'];

?>
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
<h4>Os seguintes dados foram enviados para o LMP. Aguarde confirmação do cadastro no seu email.</h4>

<?
$msg = "Novo Cadastro de Ex membro enviado: $NOME_COMPLETO"; 
mail("moecke@lmp.ufsc.br", "Novo cadastro de ex-membro",$msg,"From: $email");
?>

<?php

echo("
Nome: $NOME_COMPLETO <br>
email: $email - Publicar? $PUBLICAR_EMAIL <br>
Grupo: $GRUPO <br>
Ano de Entrada-Saída do LMP: $ANO_E - $ANO_S <br> 
Telefone para contato ($TEL1): $TELEFONE_1 Publicar? $PUBLICAR_TEL1 <br>
Telefone para contato2 ($TEL2): $TELEFONE_2 Publicar? $PUBLICAR_TEL2 <br>
Data de Nascimento: $NASC_DIA/$NASC_MES/$NASC_ANO <br>
Endereço Residencial: $END_RES_ENDERECO <br>
Cidade: $END_RES_CIDADE - $END_RES_ESTADO - $END_RES_PAIS <br>
CEP: $END_RES_CEP <br>
<br>
Dados profissionais: - Publicar? $PUBLICAR_END_COM <br>
Empresa: $END_COM_Empresa  <br>
Endereço: $END_COM_ENDERECO <br>
Cidade: $END_COM_CIDADE - $END_COM_ESTADO - $END_COM_PAIS <br>
CEP: $END_COM_CEP <br>
<br><br>
");
if ($OBSERVACOES != "");
{
$OBSERVACOES = str_replace("\n","<br>",$OBSERVACOES);
$OBSERVACOES = str_replace(";","",$OBSERVACOES);
echo(" Observações: $OBSERVACOES <br>");
}

//GRAVANDO EM ARQUIVO ENTRADA
$gfile = './arquivos/EXMEMBROS';
$complete_entry = "$NOME_COMPLETO;$GRUPO;$email;$PUBLICAR_EMAIL;$TEL1;$TELEFONE_1;$PUBLICAR_TEL1;$TEL2;$TELEFONE_2;$PUBLICAR_TEL2;$NASC_DIA;$NASC_MES;$NASC_ANO;$ANO_E;$ANO_S;$END_RES_ENDERECO;$END_RES_CIDADE;$END_RES_ESTADO;$END_RES_PAIS;$END_RES_CEP;$PUBLICAR_END_COM;$END_COM_Empresa;$END_COM_ENDERECO;$END_COM_CIDADE;$END_COM_ESTADO;$END_COM_PAIS;$END_COM_CEP;$OBSERVACOES\n";
if(isset($gfile))
{ 
	if(file_exists($gfile)) {
	     $fp  =  fopen($gfile,"r");
	     $entradas_anteriores  =  fread($fp,filesize($gfile));
	     fclose($fp);
	}
	
	$fp  =  fopen($gfile,"w");
	flock($fp,1);
	if(isset($entradas_anteriores))  fputs($fp,$entradas_anteriores);
	fputs($fp,$complete_entry);
	flock($fp,3);
	fclose($fp); 
}
?>
<br>
<font face="Arial,Helvetica">&nbsp;&nbsp;&nbsp; O seu pedido de cadastro foi
enviado!!! Aguarde at&eacute; que o LMP entre em contato com voc&ecirc;!</font>
<center>
<p><font face="Arial,Helvetica"><a href="http://www.lmp.ufsc.br/exmembros/principal.html"><br>
VOLTAR PARA P&Aacute;GINA DE EXMEMBROS</a></font></p>
</center>
<p><br>
</p>
<br>
<br>
</body>
</html>
