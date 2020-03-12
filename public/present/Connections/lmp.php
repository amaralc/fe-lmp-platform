<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_lmp = "mysql.setic.ufsc.br";
$database_lmp = "lmp";
$username_lmp = "lmp";
$password_lmp = "iesobeot";
$lmp = mysql_pconnect($hostname_lmp, $username_lmp, $password_lmp) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
