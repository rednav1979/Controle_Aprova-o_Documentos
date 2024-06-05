<?php
   $host = "localhost";//caso esteja usando o xampp ou wamp
   $user = "";
   $pass = "";
   $db = "";
   $conn = mysql_connect($host, $user, $pass) or die (mysql_error());
   
   @mysql_select_db($db);
   
   ?>
