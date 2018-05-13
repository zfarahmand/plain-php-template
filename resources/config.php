<?php
ob_start();
session_start();

defined("DS") ? null : define("DS" , DIRECTORY_SEPARATOR);
defined("TEMPLATE_ADMIN") ? null : define("TEMPLATE_ADMIN" , __DIR__ . DS . "templates/admin");
defined("TEMPLATE_SITE") ? null : define("TEMPLATE_SITE" , __DIR__ . DS . "templates/site");

//first enter mysql values here
defined("DB_HOST") ? null : define("DB_HOST" , "");
defined("DB_USER") ? null : define("DB_USER" , "");
defined("DB_PASS") ? null : define("DB_PASS" , "");
defined("DB_NAME") ? null : define("DB_NAME" , "");

$connection = mysqli_connect(DB_HOST , DB_USER , DB_PASS , DB_NAME);
mysqli_set_charset($connection , "utf8");

//enter site email if you are using email functionality
defined("EMAIL") ? null : define("EMAIL" , "");
require_once("functions.php");