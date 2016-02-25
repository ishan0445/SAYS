<?php
$link = mysql_pconnect("localhost", "root", "password") or die(mysql_error());
mysql_select_db("says_db",$link) or die(mysql_error());
?>