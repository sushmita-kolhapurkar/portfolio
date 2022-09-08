<?php
// Sets general environment properties

define("MYSQL_SERVER", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "dbQuiz");

ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
ini_set('log_errors', true);
ini_set('max_execution_time', 50000); //300 seconds = 5 minutes

$base_dir = __DIR__."/..";

extract($_POST);
extract($_GET);

//include($base_dir."db.inc.php");
?>