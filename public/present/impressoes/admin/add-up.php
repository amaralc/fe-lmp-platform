<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
  <title>Sistema de Publica&ccedil;&atilde;o de Notas</title>
 <link rel="stylesheet" type="text/css" href="../estilo.css" title="Padr&atilde;o" />
</head>
<body>
<h4 align="right">
Submiss&atilde;o de arquivo
</h4>
<?
$local = "/usr/local/www/data/impressoes/admin";
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
        $dest = $local."/impressoes.csv";

//      MOVE_UPLOADED_FILE: Esta função checa para ter certeza que o arquivo
//      designado por $file é um arquivo válido uploadeado (significando        que
//      ele foi uploadeado pelo mecanismo do PHP de HTTP POST). Se o arquivo
//      for válido, ele será movido para o $dest dado pelo destino.
//      Executa o comando do upload no servidor
        if(!move_uploaded_file($arq, $dest)){
                $frase = "<font color=FF0000>Não foi possível fazer upload! $arq -> $dest Arquivo inválido.</font>";
        }else{
                $frase = "Arquivo enviado com sucesso!";
	}
echo("
<center>$frase
</center>
");
?>	
