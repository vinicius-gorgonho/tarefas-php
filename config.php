<?php

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "tarefas";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

define("dsn", $dsn);
define("username", $username);
define("password", $password);
define("options", $options);