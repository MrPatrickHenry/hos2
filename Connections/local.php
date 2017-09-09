<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_local = "localhost";
$database_local = "houseofsale.co.uk_advertisers";
$username_local = "fitw";
$password_local = "H097729422a!";
$local = mysql_pconnect($hostname_local, $username_local, $password_local) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
