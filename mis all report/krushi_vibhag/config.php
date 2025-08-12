<?php
// Database connection settings
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "mis_report_system1");

// Connect to MySQL
$con = mysql_connect(SERVER, USERNAME, PASSWORD) or die("Database Connection Failed: " . mysql_error());
mysql_select_db(DBNAME, $con) or die("Database Selection Failed: " . mysql_error());
?>
