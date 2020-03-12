<?

function iniciaTabela($titulos) {
echo ("
	<table id=\"tabela\">
		<tr class=titulo>
");
for($i = 0; $i < sizeof($titulos); $i++) {
	echo ("
			<td>
				$titulos[$i]
			</td>
	");
}
echo ("
		</tr>
");
}
?>
