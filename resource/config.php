<?php

ob_start();
session_start();


defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? NULL : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("TEMPLATE_BACK") ? NULL : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

// $connection = mysqli_connect('localhost','root','','cms');

defined("DB_HOST") ? NULL : define("DB_HOST", "localhost");
defined("DB_USER") ? NULL : define("DB_USER", "root");
defined("DB_PASS") ? NULL : define("DB_PASS", "");
defined("DB_NAME") ? NULL : define("DB_NAME", "ecom_db");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
require_once("function.php");
require_once("cart.php");

?>