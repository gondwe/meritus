<?php 
ob_start();
session_start();


define("host"		    , 	"localhost");
define("usr"		    , 	"root");
define("pwd"		    ,	"");
define("database"	    , 	"meritus");
define("merit_uploads"	, 	"./data/merits/");


define("site_url", "http://localhost/meritus");
define("base_url", "/meritus");

require_once ("functions.php");
