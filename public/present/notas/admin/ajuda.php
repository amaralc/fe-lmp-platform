<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
  <title>Sistema de Publica&ccedil;&atilde;o de Notas</title>
</head>
<body
 style="background-image: url(http://www.lmp.ufsc.br/figuras/backg.jpg);">
<div style="text-align: center;"><img
 src="http://www.lmp.ufsc.br/figuras/lmphp.gif" title="" alt="LMP"
 style="width: 87px; height: 110px;"><br>
<br>
<big><big><span style="font-weight: bold;">Sistema de
Publica&ccedil;&atilde;o de Notas<br>
<small>P&aacute;gina de Controle do Sistema de Publica&ccedil;&atilde;o
de Notas do LMP<br>
<br>
<big>INSTRUÇÕES/AJUDA/D&Uacute;VIDAS<br>
<br>
</big></small></span></big></big><big><big><span
 style="font-weight: bold;"></span></big></big>
<table cellpadding="2" cellspacing="2" border="0"
 style="text-align: left; width: 80%; margin-right: auto; margin-left: auto;">
  <tbody>
    <tr>
      <td style="vertical-align: top;"><span style="font-weight: bold;">1)
O Arquivo de Entrada de Dados<br>
      </span>O arquivo de entrada de dados deve ser um arquivo CSV do
excel, com o seguinte conte&uacute;do:<span style="font-weight: bold;"><br>
      </span><b>Primeira Linha</b>: Nome da Disciplina, Codigo da
Disciplina, Turma, Semestre - Necess&aacute;riamente nesta ordem, um
dado por c&eacute;lula da tabela.<br>
      <b>Segunda Linha</b>: Titulos das colunas da tabela<br>
      <b>Terceira Linha</b>: VAZIA<br>
      <b>Outras Linhas</b>: Qualquer formato de tabela ser&aacute;
corretamente interpretado<br>
      <span style="font-style: italic;">IMPORTANTE: O nome do arquivo
deve ser: emcXXXX.csv onde XXXX &eacute; o c&oacute;digo da disciplina.
Note que emc e csv devem estar em letras min&uacute;sculas.<br>
Observa&ccedil;&atilde;o: AS formata&ccedil;&otilde;es de cor, negrito,
it&aacute;lico, fonte e outros estilos s&atilde;o perdidos quando o
arquivo &eacute; salvo no formato CSV. Para utilizar cor, negrito e
it&aacute;lico, utilize os c&oacute;digos a seguir:<br>
      </span>
      <div style="text-align: center;"><span style="font-style: italic;"></span>
      <table cellpadding="2" cellspacing="2" border="1"
 style="text-align: left; width: 70%; margin-left: auto; margin-right: auto; background-color: rgb(204, 204, 204);">
        <tbody>
          <tr>
            <td style="vertical-align: top;">
            <div style="text-align: center;">Negrito ==&gt;
&lt;b&gt;VALOR&lt;/b&gt;<span style="font-weight: bold;"></span><br>
            </div>
            <div style="text-align: center;"> It&aacute;lico ==&gt;
&lt;i&gt;VALOR&lt;/i&gt; <span style="font-style: italic;"></span><br>
            </div>
            <div style="text-align: center;"> Cor ==&gt; &lt;font
color="nome da cor em ingles"&gt;VALOR&lt;/font&gt; <br>
            </div>
            </td>
          </tr>
        </tbody>
      </table>
      <span style="font-style: italic;"></span></div>
      <br>
      <span style="font-weight: bold;">2) Seguran&ccedil;a do script.<br>
      </span>O Script &eacute; programado para permitir apenas
publica&ccedil;&atilde;o de notas a partir de computadores com IPs
especificados no arquivo <span style="font-style: italic;">add-up.php</span><br>
Se for necess&aacute;rio publicar as notas de um computador que
n&atilde;o est&aacute; liberado, informar o CPD.<br>
Al&eacute;m disso existe um bloqueio por senha <span
 style="font-style: italic;">htaccess</span> na pasta de
administra&ccedil;&atilde;o do sistema. Para mudar a senha de acesso
&eacute; necess&aacute;rio ir ao CPD.<br>
      <br>
<span style="font-weight: bold;">3)Como divulgar uma nota na Homepage:</span><br>
Crie uma página com o seguinte código e coloque o link para esta página. IMPORTANTE. A página deve ser salva com extensão .php
     <div style="text-align: center;"><span style="font-style: italic;"></span>
      <table cellpadding="2" cellspacing="2" border="1"
 style="text-align: left; width: 70%; margin-left: auto; margin-right: auto; background-color: rgb(204, 204, 204);">
        <tbody>
          <tr>
            <td style="vertical-align: top;">
&lt;?php<br>
include("http://www.lmp.ufsc.br/notas/notas.php?CODIGO=emc<b><font color=darkred>XXXX</font></b>");
<br>?&gt;          
	  </td>
          </tr>
        </tbody>
      </table>
      <span style="font-style: italic;"></span></div>
<i>Substitua XXXX pelo codigo da disciplina</i><br>
Esta página deve ser criada para evitar o acesso direto ao script aumentando a segurança do sistema, já que assim o usuário final nem tem como descobrir como a página é gerada. Por isso evite de divulgar o link direto a página (http://www.lmp.ufsc.br/notas/notas.php?CODIGO=emcXXXX) criando sempre a página com o código descrito acima. 
<br>
      <br>
      <div style="text-align: center;"><a href="index.php">Voltar</a><br>
      </div>
      <span style="font-weight: bold;"></span></td>
    </tr>
  </tbody>
</table>
<big><big><span style="font-weight: bold;"><small><br>
</small></span></big></big>
<?php include("copyright.php"); ?>
</div>
</body>
</html>

