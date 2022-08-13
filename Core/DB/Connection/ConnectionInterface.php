<?php

namespace App\Core\DB\Connection;

interface ConnectionInterface{

    public static function getInstance();
    public function getConnection(): \PDO ;
}