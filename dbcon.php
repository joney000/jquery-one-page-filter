<?php

$con=mysql_connect('localhost','root','root')or die("Unable to connect to MySQL: " . mysql_error()); 
mysql_select_db("web")or die("Unable to select database: " . mysql_error()); 
?>