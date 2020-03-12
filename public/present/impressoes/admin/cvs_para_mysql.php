<?
/*
 * *************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 ***************************************************************************
 *
 * Controle de Impressoes 0.0.1
 * http://cristian.totalsecurity.com.br
 * Autor: Cristian Thiago Moecke - cristian@floripa.com.br
 *
 */
?>
<html>
<head>
<title>Controle de Impress&otilde;es</title>
 <link rel="stylesheet" type="text/css" href="../estilo.css" title="Padr&atilde;o" />
</head>
<body>
<div align="right"><font face="Arial,Helvetica"><font color="#3333ff">
<?php 
include 'mysql_connect.php';
$query  = "SELECT nome, titulo FROM tabelas ORDER BY id DESC LIMIT 2";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$TABELA_ANTIGA = "imp_".$row['nome'];
$TABELA_ANTIGA_AUX = "aux_".$row['nome'];

echo ("TABELA ANTERIOR: $TABELA_ANTIGA");

//Listas:
$lista_bg[0] = "#bbbbbb"; //Cor do titulo e das bordas das listas.
$lista_bg[1] = "#dfdfdf"; //Cor de fundo das linhas pares
$lista_bg[2] = "#ebebeb"; //Cor de fundo das linhas impares

$arquivo = "./".$_GET['arquivo'].".csv";
$nome = $_GET['nome'];
$titulo = $_GET['titulo'];
if(!file_exists($arquivo))
{
        die("</div><center>ERRO! ARQUIVO DE ENTRADA DE DADOS N\xc3O ENCONTRADO!!!<br><br><a href=mailto:webmaster@lmp.ufsc.br>WebMaster</a></center>");
}
$entrada = file($arquivo);
$N = sizeof($entrada);
$dado = explode(";",$entrada[0]);
echo("$dado[4]");

$sql = "INSERT INTO tabelas (nome, titulo) VALUES ('$nome', '$titulo')";
$result = mysql_query($sql) or die('Query failed. '.mysql_error());

?>
</font></font>
<hr width="100%"></div>
<center>
LENDO ARQUIVO...
<table border=0 bgcolor=<?php echo $lista_bg[0]; ?> width="96%">
<?php

$TABELA = "imp_".$nome;
$TABELA_AUX = "aux_".$nome;

$sql = "CREATE TABLE `$TABELA_AUX` (
  `usuario` varchar(255) NOT NULL,
  `dividasPendentes` double NOT NULL,
  `outrasDividas` double NOT NULL,
  `valorPago` double NOT NULL,
  PRIMARY KEY  (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result = mysql_query($sql) or die('Query failed. '.mysql_error());

$sql = "CREATE TABLE `$TABELA` (
  `id` int(11) NOT NULL auto_increment,
  `documento` varchar(500) NOT NULL,
  `paginas` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `impressora` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `pagoPeloLMP` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result = mysql_query($sql) or die('Query failed. '.mysql_error());

for($i=0;$i<$N;$i++)
{
if($c == "")
$c=1;
if($c == 2)
$c--;
else if($c == 1)
$c++;
echo("<tr bgcolor=$lista_bg[$c]>");
$dado = explode(";",$entrada[$i]);
    $sql = "INSERT INTO $TABELA 
           (documento, paginas, usuario, impressora, data)
           VALUES ('$dado[2]', '$dado[3]', '$dado[0]', '$dado[4]', '$dado[1]')";
    $result = mysql_query($sql) or die('Query failed. '.mysql_error());

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

$query  = "SELECT DISTINCT usuario FROM $TABELA ORDER BY usuario";
$result = mysql_query($query);
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$USUARIO = $row['usuario'];
$query1  = "SELECT SUM(paginas) FROM $TABELA_ANTIGA WHERE usuario='$USUARIO' AND impressora like '%LaserJet%'";
$result1 = mysql_query($query1);
$PAGINAS_PB = mysql_result($result1, 0);
if($PAGINAS_PB == "") $PAGINAS_PB = 0;
$query1  = "SELECT SUM(paginas) FROM $TABELA_ANTIGA WHERE usuario='$USUARIO' AND pagoPeloLMP='0' AND impressora like '%LaserJet%'";
$result1 = mysql_query($query1);
$PAGINAS_PB_P = mysql_result($result1, 0);
if($PAGINAS_PB_P == "") $PAGINAS_PB_P = 0;

$query1  = "SELECT SUM(paginas) FROM $TABELA_ANTIGA WHERE usuario='$USUARIO' AND impressora like '%deskjet 5550%'";
$result1 = mysql_query($query1);
$PAGINAS_CL = mysql_result($result1, 0);
if($PAGINAS_CL == "") $PAGINAS_CL = 0;
$query1  = "SELECT SUM(paginas) FROM $TABELA_ANTIGA WHERE usuario='$USUARIO' AND pagoPeloLMP='0' AND impressora like '%deskjet 5550%'";
$result1 = mysql_query($query1);
$PAGINAS_CL_P = mysql_result($result1, 0);
if($PAGINAS_CL_P == "") $PAGINAS_CL_P = 0;

$query1  = "SELECT dividasPendentes, outrasDividas, valorPago FROM $TABELA_ANTIGA_AUX WHERE usuario='$USUARIO'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
$OUTRAS_DIVIDAS = $row1['outrasDividas'];
$PENDENTES = $row1['dividasPendentes'];
$PAGO = $row1['valorPago'];

$CUSTO_PB = intval($PAGINAS_PB_P)*0.10;
$CUSTO_CL = intval($PAGINAS_CL_P)*0.25;
$CUSTO_TOTAL = $CUSTO_PB+$CUSTO_CL+$OUTRAS_DIVIDAS+$PENDENTES;
$TOTAL = $CUSTO_TOTAL-$PAGO;

	$sql = "INSERT INTO $TABELA_AUX (usuario, dividasPendentes) VALUES ('$USUARIO', '$TOTAL')";
	$result1 = mysql_query($sql) or die('Query failed. '.mysql_error());
}
?>
</table>
</center>
<br><br>
</body>
</html>
