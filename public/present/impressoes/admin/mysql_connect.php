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
include '../conf.php';

$conn = mysql_connect($dbhost, $dbuser, $dbpass)
        or die('Erro ao tentar conectar na base de dados');

mysql_select_db($dbname);
?>

