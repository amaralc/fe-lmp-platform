<head>
<title>Envio de Arquivo de Log de Impress&otilde;es</title>
 <link rel="stylesheet" type="text/css" href="../estilo.css" title="Padr&atilde;o" />
</head>
<body>
<h4 align="right">
Formul&aacute;rio de envio de Arquivo de LOG de impress&otilde;es 
</h4>
<table cellpadding="2" cellspacing="2" border="0"
 style="text-align: left; width: 80%; margin-right: auto; margin-left: auto;">
  <tbody>
    <tr>
      <td style="vertical-align: top;">

<center>
<table border="0" cellspacing="5" width="610">
  <tr>
    <td>
      <form method="POST" action="add-up.php" ENCTYPE="multipart/form-data">
        <table border="0" width="592" cellpadding="2">
          <tr>
<?php
$frasef = $_POST['frasef'];
$frasel = $_POST['frasel'];
?>
            <td align="center" width="574" colspan="2"><font size="2" face="Verdana" color="#FF0000"><b><?echo$frasef;?><br><?echo$frasel;?></b></font></td>
          </tr>
          <tr>
            <td bgcolor="#0277BD" align="right" width="219"><font face="Verdana" size="2" color="#FFFFFF"><b>Selecione o arquivo:</b></font></td>
            <td width="355">
              <input type="file" name="file">
            </td>
          </tr>
          <tr>
            <td width="219"></td>
            <td width="355"><font face="Verdana"><input type="submit" value="Enviar Arquivo" name="Enviar Arquivo">
        </font>
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
<a href=index.php>VOLTAR</a>
</center>
</td></tr>
</table>
