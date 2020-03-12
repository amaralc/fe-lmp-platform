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
include 'header.php';

$TIPO = $_GET['t'];
$USUARIO = $_GET['usuario'];

if($ADMIN || $USUARIO == $_SESSION['usuario']) {
} 
else
	die("<div class=mensagem>Erro: Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar estes dados
	<br/><br/>
		<a href=\"javascript:window.history.back()\">VOLTA</a></div>	
	");
?>

<script>
function init() {
	var colunas=document.getElementsByTagName("td")
        for(var i=1;i<colunas.length;i++) {
		if(colunas[i].className=="sel_box")
			colunas[i].className="invisivel"
	}
}
function selecionar_tudo(){
	for (i=0;i<document.f1.elements.length;i++)
		if(document.f1.elements[i].type == "checkbox")	
			document.f1.elements[i].checked=1
        var linhas=document.getElementsByTagName("tr")
   	for(var i=1;i<linhas.length;i++) {
                linhas[i].className="linha_marcada"
	}
}
function deselecionar_tudo(){
	for (i=0;i<document.f1.elements.length;i++)
		if(document.f1.elements[i].type == "checkbox")	
			document.f1.elements[i].checked=0
        c = 1
        var linhas=document.getElementsByTagName("tr")
        for(var i=1;i<linhas.length;i++) {
                if (c == 1)
                        c = 2
                else
                        c = 1
                linhas[i].className="linha"+c
        }
}

function inverter_tudo() {
	j = 1
	c = 1
	var linhas=document.getElementsByTagName("tr")
	for (i=0;i<document.f1.elements.length;i++) {
        	if(document.f1.elements[i].type == "checkbox") {
	                if (c == 1)
         	        	c = 2
                	else
                        	c = 1
			if(document.f1.elements[i].checked==1) {
				document.f1.elements[i].checked=0
				linhas[j].className="linha"+c
			}
			else {	
				document.f1.elements[i].checked=1
				linhas[j].className="linha_marcada"
			}
		j++
		}
	}
}

function seleciona( linha , c ) {
        var linhaid=document.getElementById("linha"+linha)
	j = 1
        for (i=0;i<document.f1.elements.length;i++) {
                if(document.f1.elements[i].type == "checkbox") {
			if(j == parseInt(linha)) {
           	        	if(document.f1.elements[i].checked == 1) {
                	                document.f1.elements[i].checked=0
					linhaid.className="linha"+c
				}	
				else {
                                	document.f1.elements[i].checked=1
					linhaid.className="linha_marcada"
				}
			}
			j++
		}
	}
	return false
}

</script>

<?

if (isset($_POST['form_enviado'])) {
$mensagemAlerta = "Dados atualizados: Os seguintes arquivos foram marcados para serem pagos pelo LMP: "; 
$PAGOPELOLMP = $_POST['pagoPeloLMP'];
$query="UPDATE $TABELA SET pagoPeloLMP='0' WHERE usuario='$USUARIO'";
if($TIPO == "PB")
        $query .= " AND impressora like '%LaserJet%'";
else if($TIPO == "CL")
        $query .= " AND impressora like '%deskjet 5550%'";
$result=mysql_query($query);
		
foreach ($PAGOPELOLMP as $ID) {
	$mensagemAlerta .= "$ID ,";
	$query="UPDATE $TABELA SET pagoPeloLMP='1' WHERE id='$ID'";
	$result=mysql_query($query); 	
}
$mensagemAlerta .= "\\n CPD-LMP";
}

?>
<center><h3>Impress&otilde;es do usu&aacute;rio <?echo "$USUARIO ($TIPO)"; ?></h3></center>
<table id=tabela>
<tr class=titulo>
<td>
#
</td>
<td class=sel_box>
P
</td>
<td>
DOCUMENTO
</td>
<td>
P&Aacute;GINAS
</td>
<td>
DATA
</td>
</tr>
<form name="f1" method="post" action="<? echo "?p=1&t=$TIPO&usuario=$USUARIO"; ?>">
<?php

include 'mysql_connect.php';

$query  = "SELECT * FROM $TABELA WHERE usuario='$USUARIO'";
if($TIPO == "PB")
	$query .= " AND impressora like '%LaserJet%'";
else if($TIPO == "CL")
	$query .= " AND impressora like '%deskjet 5550%'";

$query .= " ORDER by data";
$result = mysql_query($query);
$j = 1;
$c = 1;
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$DATA = $row['data'];
$PAGINAS = $row['paginas'];
$DOCUMENTO = $row['documento'];
$ID = $row['id'];
$PAGOPELOLMP = $row['pagoPeloLMP'];
if($c == 2)
$c--;
else if($c == 1)
$c++;
if(!$PAGOPELOLMP)
	$classe = "linha".$c;
else
	$classe = "linha_marcada";
echo("<tr id=\"linha$j\" onClick=\"seleciona($j, $c)\" class=\"$classe\">");

echo("<td> $ID</td><td class=sel_box><input type=checkbox onClick=seleciona($j) name=pagoPeloLMP[] value=\"$ID\"");
if($PAGOPELOLMP)
echo " checked=\"checked\"";
echo("
	/></td><td>$DOCUMENTO</td>
	<td>$PAGINAS</td>
	<td>$DATA</td>
	</tr>
");
$j++;
}
?>
</table>
<center><b>
[<a href="javascript:selecionar_tudo()">Selecionar todas</a> |
<a href="javascript:deselecionar_tudo()">Deselecionar todas</a> |
<a href="javascript:inverter_tudo()">Inverter Sele&ccedil;&atilde;o</a>]
<br/> <br/>
Clique nas linhas das impress&otilde;es que ser&atilde;o pagas pelo LMP (Linhas selecionadas devem ficar na cor amarela).
<br/> Aperte o bot&atilde;o abaixo para salvar as modifica&ccedil;&otilde;es
</b><br/>
<br/>
<input type="hidden" value="FORM_ENV" name="form_enviado" />
<input type="submit" class="botao" value="SALVAR MODIFICA&Ccedil;&Otilde;ES" />
<?
if(isset($mensagemAlerta))
	echo("
<script language=\"Javascript\">
alert (\"".$mensagemAlerta."\")
</script>

	");
?>
</form>
</center>
<br/>
<br/>
