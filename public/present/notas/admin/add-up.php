<?
$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
if($REMOTE_ADDR != "150.162.108.2" && $REMOTE_ADDR != "150.162.108.4")
{
include("copyright.php");
$gfile = '../arquivos/LOG';
$hojeeh = date("D, j M Y - G:i:s T");
$complete_entry = "<font color=red>TENTATIVA DE ACESSO BLOQUEADA POR IP</font>".";"."$hojeeh".";"."$REMOTE_ADDR";
if(isset($gfile))
{
        if(file_exists($gfile)) {
             $fp  =  fopen($gfile,"r");
             $entradas_anteriores  =  fread($fp,filesize($gfile));
             fclose($fp);
        }

        $fp  =  fopen($gfile,"w");
        flock($fp,1);
	fputs($fp,$complete_entry);
	fputs($fp,"\n");
        if(isset($entradas_anteriores))  fputs($fp,$entradas_anteriores);
        flock($fp,3);
        fclose($fp);
}

	die("ERRO: VOCÊ NÃO TEM AUTORIZAÇÃO PARA EXECUTAR ESTE SCRIPT<br><br><center><h4><a href=\"mailto:webmaster@lmp.ufsc.br\">WebMaster LMP</a></h4></center>");
}
?>
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
</big></small></span></big></big>
<?

$local = $_POST['local'];
$file = $_POST['file'];
$arq = $_FILES['file']['tmp_name'];
$arq_name = $_FILES['file']['name'];
        if($local == "não selecionado" || $arq == "none"){
                if($local == "não selecionado"){
                        $frasel = "Selecione um local para o arquivo ser alocado!";
                }
                if($arq == none){
                        $frasef = "Selecione um arquivo para enviar!";
                }
        header("location: form-up.php?frasel=$frasel&frasef=$frasef");
        exit;
        }

        //Variável que guardará o local onde o arquivo será enviado
        $dest = $local."/".$arq_name;

//      MOVE_UPLOADED_FILE: Esta função checa para ter certeza que o arquivo
//      designado por $file é um arquivo válido uploadeado (significando        que
//      ele foi uploadeado pelo mecanismo do PHP de HTTP POST). Se o arquivo
//      for válido, ele será movido para o $dest dado pelo destino.
//      Executa o comando do upload no servidor
        if(!move_uploaded_file($arq, $dest)){
                $frase = "<font color=FF0000>Não foi possível fazer upload! $arq -> $dest Arquivo inválido.</font>";
        }else{
                $frase = "Arquivo enviado com sucesso!";
	
//LOGA ENVIOS!!! IMPLEMENTADO POR CRISTIAN THIAGO MOECKE
// cristian@floripa.com.br

$gfile = '../arquivos/LOG';
$hojeeh = date("D, j M Y - G:i:s T");
$complete_entry = "$file_name".";"."$hojeeh".";"."$REMOTE_ADDR";
if(isset($gfile))
{
        if(file_exists($gfile)) {
             $fp  =  fopen($gfile,"r");
             $entradas_anteriores  =  fread($fp,filesize($gfile));
             fclose($fp);
        }

        $fp  =  fopen($gfile,"w");
        flock($fp,1);
 fputs($fp,$complete_entry);
        fputs($fp,"\n");
	if(isset($entradas_anteriores))  fputs($fp,$entradas_anteriores);
        flock($fp,3);
        fclose($fp);
}

        }
?>
<html>
<head>
<title>Upload</title>
</head>

<body bgcolor="#FFFFFF" text="#000000" links="#000000" vlinks="#000000" alinks="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<center>
<table cellspacing="5" border="0" width="610">
  <tr>
    <td>
      Upload
    </td>
  </tr>
  <tr>
    <td>
      <p><center><font face="Verdana" size="5"><b><?echo $frase;?></b></font></p></center>
 	<center><br><br><a href=index.php>VOLTAR</a></center>   
</td>
  </tr>
M
</table>
</center>
<?php include("copyright.php"); ?>
</body>

