<? 
// like i said, we must never forget to start the session
session_start();

// is the one accessing this page logged in or not?
if (!isset($_SESSION['estah_logado']) || $_SESSION['estah_logado'] != true) {
    // not logged in, move to login page
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
 <title>Controle de Impress&otilde;es</title>
 <meta name="resource-type" content="document" />
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
 <link rel="shortcut icon" href="favicon.ico" />
 <link rel="stylesheet" type="text/css" href="estilo.css" title="Padr&atilde;o" />
 <link rel="stylesheet" type="text/css" href="print.css" media="print" />
</head>
<body onLoad="init()">
<?
if(!isset($_GET['p']) ||  $_GET['p'] == 0)
	$pagina = "relatorio.php";
else if ($_GET['p'] == 1)
	$pagina = "mostra_impressoes.php";
?>
<div id=conteudo>
<?
include $pagina;
?>
</div>
<?
include 'footer.php';
?> 
