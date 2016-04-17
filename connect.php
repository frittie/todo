<?php

define("DB_HOST", "localhost"); 
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "todolist");


$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) //Koppling till databasen
or die("Could not connect to MySQL server.");

$dbc->set_charset("utf8"); //Berättar för databasen vilket språk vi använder
	
?>