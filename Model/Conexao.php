<?php
require_once __DIR__ . "/Database.php";
use \Nerdweb\Database;

$configDB = [
    "host" => "sqlite",
    "name" => "nerdweb.db"
];
 $database = new Database($configDB);