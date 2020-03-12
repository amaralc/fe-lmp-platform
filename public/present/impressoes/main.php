<? include 'header.php'; ?>
<body>
<center><h3>Controle de Empr&eacute;stimos</h3>
<h4>Usu&aacute;rio: <?php echo $_SESSION['usuario'] ?></h4>
</center>

<ul>
Empr&eacute;stimos:
<li><a href="mostra_emprestimos.php">Mostra Empr&eacute;stimos</a></li>
<li><a href="mostra_devolvidos.php">Mostra Empr&eacute;stimos Antigos</a></li>
<li><a href="novo_emprestimo.php">Novo Empr&eacute;stimo</a> </li>
</ul>
<ul>
Invent&aacute;rio:
<li><a href="mostra_inventario.php">Mostra Invent&aacute;rio</a> </li>
<li><a href="novo_item.php">Novo Item</a> </li>
<li><a href="edita_item.php">Edita Item</a> </li>
<li><a href="apaga_item.php">Apaga Item</a> </li>
<li><a href="nova_categoria.php">Nova Categoria</a> </li>
<li><a href="apaga_categoria.php">Apaga Categoria</a> </li>
</ul>
<ul>
Pessoas:
<li><a href="nova_pessoa.php">Nova Pessoa</a> </li>
<li><a href="edita_pessoa.php">Edita Pessoa</a> </li>
<li><a href="apaga_pessoa.php">Apaga Pessoa</a> </li>
</ul>
<ul>
Geral:
<li><a href="logout.php">Logout</a> </li>
</ul>
<? include 'footer.php'; ?>