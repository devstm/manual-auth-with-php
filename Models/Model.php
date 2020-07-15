<?php


namespace Models;

use Traits\Connection;

require_once 'Traits/Connection.php';

class Model
{
    use Connection;

    public function __construct()
    {
        $this->setConnection(databaseInstance()->getConnection());
    }

}