<?php

// das ist für das Error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "DB.php";
require_once "Task.php";
require_once "DBTaskLoader.php";

function dump($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

?>