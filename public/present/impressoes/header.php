<?php

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
 * http://cristian.totalsecurity.com.br
 * Autor: Cristian Thiago Moecke - cristian@floripa.com.br
 *
 */

if (!eregi("index.php", $_SERVER['PHP_SELF'])) {
    die ("Voc&ecirc; n&atilde;o pode acessar este arquivo diretamente!");
}

$USUARIO_C = $_SESSION['usuario'];
include 'mysql_connect.php';
$query="SELECT valor FROM configuracoes WHERE parametro='admin' AND valor='$USUARIO_C'";
$result=mysql_query($query);
$ADMIN = 0;
if(mysql_num_rows($result)!=0)
        $ADMIN = 1;

if(isset($_GET['D']))
	$DEFASAGEM = intval($_GET['D']);
else
	$DEFASAGEM = 1;

$query  = "SELECT nome, titulo FROM tabelas ORDER BY id DESC LIMIT $DEFASAGEM";
$result = mysql_query($query);
for($i = 0; $i < $DEFASAGEM; $i++)
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
$TABELA = "imp_".$row['nome'];
$TABELA_AUX = "aux_".$row['nome'];

$TITULO = $row['titulo'];

?>
<h4 align="right">
Relat&oacute;rio de Impress&otilde;es - <b><? echo $TITULO; ?></b> - <? echo $_SESSION['usuario']; ?>
<?
if ($ADMIN)
	echo " (administrador)";

?>
</h4>
<div align="right">
<?
$ANTERIOR = $DEFASAGEM+1;
$PROXIMO = $DEFASAGEM-1;
echo "[<a href=\"?D=$ANTERIOR\">M&ecirc;s anterior</a>]";
if ($DEFASAGEM > 1)
	echo "[<a href=\"?D=$PROXIMO\">Pr&oacute;ximo m&ecirc;s</a>]";

include 'funcoes.php';
?>
</div>
</div>
