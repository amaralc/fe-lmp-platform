<?php
include("admin/copyright.php");
echo("<center><h2>ERRO 401: Login ou senha inválidos<br><br>Este incidente será logado!");
$gfile = 'arquivos/LOG';
$hojeeh = date("D, j M Y - G:i:s T");
$complete_entry = "<font color=red>ERRO NO LOGIN</font>".": $PHP_AUTH_USER".";"."$hojeeh".";"."$REMOTE_ADDR";
if(isset($gfile))
{
        if(file_exists($gfile)) {
             $fp  =  fopen($gfile,"r");
             $entradas_anteriores  =  fread($fp,filesize($gfile));
             fclose($fp);
        }

        $fp  =  fopen($gfile,"w");
        flock($fp,1);
 fputs($fp,$complete_entry);
fputs($fp,"\n");
        if(isset($entradas_anteriores))  fputs($fp,$entradas_anteriores);
        flock($fp,3);
        fclose($fp);
}

