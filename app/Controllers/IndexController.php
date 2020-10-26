<?php

namespace App\Controllers;
use Bootstrap\Database;

class IndexController
{
    public function index()
    {
       echo "Eureka!";
    }

    public function list()
    {
        $stmt = Database::query('select * from users where name = :name', ['name' => 'Moisés']);
        print_r($stmt->fetchAll(\PDO::FETCH_ASSOC));
    }
}