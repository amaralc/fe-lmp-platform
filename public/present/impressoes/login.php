<?php
// we must never forget to start the session
session_start();

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
	
	include 'mysql_connect.php';

	mysql_select_db('mail');

	$userId   = mysql_escape_string($_POST['txtUserId']);
	$password = mysql_escape_string($_POST['txtPassword']);
    
	// check if the user id and password combination exist in database
	$sql = "SELECT username 
            FROM accountuser  
            WHERE username='$userId' AND password=ENCRYPT('$password',Password)";
    
    $result = mysql_query($sql) or die('Query failed. ' . mysql_error());
	echo mysql_result($result,0); 
    if (mysql_num_rows($result) == 1) {
        // the user id and password match, 
        // set the session
        $_SESSION['estah_logado'] = true;
	$_SESSION['usuario'] = $userId;
         
        // after login we move to the main page
        header('Location: ./');
        exit;
    } else {
        $errorMessage = 'Sorry, wrong user id / password';
    }
    
    //include 'library/closedb.php';
}
?>
<html>
<head>
<title>Sistema de Controle de Impress&otilde;es - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="estilo.css" title="Padr&atilde;o" />
</head>

<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<div align=center>
<h2>Sistema de Controle de Impress&otilde;es do LMP</h2>
<p>
Entre com o seu login e senha do email do LMP.
</p>
<p>
<form action="" method="post" name="frmLogin" id="frmLogin">
 <table id=tabela>
  <tr class=linha1>
   <td width="150">Login</td>
   <td><input name="txtUserId" type="text" id="txtUserId"></td>
  </tr>
  <tr class=linha1>
   <td width="150">Senha</td>
   <td><input name="txtPassword" type="password" id="txtPassword"></td>
  </tr>
  <tr class=linha2>
   <td width="150">&nbsp;</td>
   <td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
  </tr>
 </table>
</form>
</p>
</div>
<div align="center">
</div>
<?php include 'footer.php'; ?>
