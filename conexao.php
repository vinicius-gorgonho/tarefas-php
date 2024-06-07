<?php
require_once "config.php";

class Conexao
{
    private $connection;
    public function getConnection()
    {
        $connection = new PDO(dsn, username, password, options);
        return   $connection;
    }
}
