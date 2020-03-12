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
if($ADMIN) {

if (isset($_POST['form_enviado'])) {
	$NOMES = $_POST['nomeDoUsuario'];
	$PENDENTES = $_POST['dividasPendentes'];
	$PAGOS = $_POST['valorPago'];
	$OUTRAS = $_POST['outrasDividas'];

	for($i = 0; $i < sizeof($NOMES); $i++) {
		$NOME = $NOMES[$i];
		$PENDENTE = str_replace(",", ".", $PENDENTES[$i]);
		$PAGO = str_replace(",", ".", $PAGOS[$i]);
		$OUTRA = str_replace(",", ".", $OUTRAS[$i]); 
		$query = "UPDATE $TABELA_AUX SET valorPago='$PAGO', outrasDividas='$OUTRA', dividasPendentes='$PENDENTE' WHERE usuario='$NOME'"; 
		$result = mysql_query($query) or die('Query failed. '.mysql_error());
	}
}

echo("<form name=\"f1\" method=\"post\" action=\"\">
<input type=\"hidden\" value=\"FORM_ENV\" name=\"form_enviado\" />
");
}

$titulos[0] = "USU&Aacute;RIO";
$titulos[1] = "P&B";
$titulos[2] = "COLORIDA";
$titulos[3] = "OUTROS";
$titulos[4] = "ANTERIOR";
$titulos[5] = "SUB-TOTAL";
$titulos[6] = "PAGO";
$titulos[7] = "TOTAL";
iniciaTabela($titulos);

$query  = "SELECT DISTINCT usuario FROM $TABELA_AUX ORDER BY usuario";
$result = mysql_query($query);

$c = 1;
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
if($c == 2)
$c--;
else if($c == 1)
$c++;
echo("<tr class=\"linha".$c."\">");
$USUARIO = $row['usuario'];
$query1  = "SELECT SUM(paginas) FROM $TABELA WHERE usuario='$USUARIO' AND impressora like '%LaserJet%'";
$result1 = mysql_query($query1);
$PAGINAS_PB = mysql_result($result1, 0);
if($PAGINAS_PB == "") $PAGINAS_PB = 0;
$query1  = "SELECT SUM(paginas) FROM $TABELA WHERE usuario='$USUARIO' AND pagoPeloLMP='0' AND impressora like '%LaserJet%'";
$result1 = mysql_query($query1);
$PAGINAS_PB_P = mysql_result($result1, 0);
if($PAGINAS_PB_P == "") $PAGINAS_PB_P = 0;

$query1  = "SELECT SUM(paginas) FROM $TABELA WHERE usuario='$USUARIO' AND impressora like '%deskjet 5550%'";
$result1 = mysql_query($query1);
$PAGINAS_CL = mysql_result($result1, 0);
if($PAGINAS_CL == "") $PAGINAS_CL = 0;
$query1  = "SELECT SUM(paginas) FROM $TABELA WHERE usuario='$USUARIO' AND pagoPeloLMP='0' AND impressora like '%deskjet 5550%'";
$result1 = mysql_query($query1);
$PAGINAS_CL_P = mysql_result($result1, 0);
if($PAGINAS_CL_P == "") $PAGINAS_CL_P = 0;


$query1  = "SELECT dividasPendentes, outrasDividas, valorPago FROM $TABELA_AUX WHERE usuario='$USUARIO'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
$OUTRAS_DIVIDAS = $row1['outrasDividas'];
$PENDENTES = $row1['dividasPendentes'];
$PAGO = $row1['valorPago'];

$CUSTO_PB = intval($PAGINAS_PB_P)*0.10;
$CUSTO_CL = intval($PAGINAS_CL_P)*0.25;
$CUSTO_TOTAL = $CUSTO_PB+$CUSTO_CL+$OUTRAS_DIVIDAS+$PENDENTES;
$TOTAL = $CUSTO_TOTAL-$PAGO;


if ($TOTAL > 1)
        $classe_preco = "destaque_preco";
else
        $classe_preco = "normal";

$CUSTO_PB = number_format($CUSTO_PB, 2, ',', '.'); 
$CUSTO_CL = number_format($CUSTO_CL, 2, ',', '.');
$OUTRAS_DIVIDAS = number_format($OUTRAS_DIVIDAS, 2, ',', '.');
$PENDENTES = number_format($PENDENTES, 2, ',', '.');
$PAGO = number_format($PAGO, 2, ',', '.');
$CUSTO_TOTAL = number_format($CUSTO_TOTAL, 2, ',', '.');
$TOTAL = number_format($TOTAL, 2, ',', '.');

if ($USUARIO == $_SESSION['usuario']) 
	$classe = "destaque";
else
	$classe = "normal";

echo("<td class=\"$classe\">");
echo("$USUARIO");
echo("</td>");
echo("<td class=\"$classe\">");
echo("R$ ".$CUSTO_PB." (<a href=\"?D=$DEFASAGEM&p=1&t=PB&usuario=$USUARIO\">$PAGINAS_PB_P/$PAGINAS_PB</a>)");
echo("</td>");
echo("<td class=\"$classe\">");
echo("R$ ".$CUSTO_CL." (<a href=\"?D=$DEFASAGEM&p=1&t=CL&usuario=$USUARIO\">$PAGINAS_CL_P/$PAGINAS_CL</a>)");
echo("</td>");
echo("<td class=\"$classe\">");
if($ADMIN) {
	echo("<input type=\"hidden\" name=\"nomeDoUsuario[]\" value=\"$USUARIO\" />");
	echo("R$ <input class=\"linha".$c."\" size=\"10\" name=\"outrasDividas[]\" value=\"$OUTRAS_DIVIDAS\" />");
}
else
	echo("R$ $OUTRAS_DIVIDAS");
echo("</td>");
echo("<td class=\"$classe\">");
if($ADMIN)
	echo("R$ <input class=\"linha".$c."\" size=\"10\" name=\"dividasPendentes[]\" value=\"$PENDENTES\" />");
elsE
	echo("R$ $PENDENTES");
echo("</td>");
echo("<td class=\"$classe\">");
echo("R$ ".$CUSTO_TOTAL."");
echo("</td>");
if($ADMIN) { 
echo("<td class=\"$classe\">");
echo("R$ <input class=\"linha".$c."\" size=\"10\" name=\"valorPago[]\" value=\"$PAGO\" />");
echo("</td>");
}
else {
echo("<td class=\"$classe\">");
echo("R$ ".$VALORPAGO);
echo("</td>");
}
echo("<td class=\"$classe\">");
echo("<span class=\"$classe_preco\">R$ ".$TOTAL."</span>");
echo("</td>");
echo("</tr>");
}
?>
</table>
<?
if($ADMIN) {
?>
<center>
	<input type="submit" class="botao" value="SALVAR MODIFICA&Ccedil;&Otilde;ES" />
</center>
<?
}
?>
