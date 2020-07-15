<?php

//$con = mysqli_connect('localhost','saleh','512515' , 'imsaleh');
////check connection
//if(!$con){
//    echo "no connection";
//}
//------------------------------------------------------------------

/*
* Mysql database class - only one connection alowed
*/
namespace connection;

$env = getenv('Config/.enve');
echo $env;


class Database
{


    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "saleh";
    private $_password = "512515";
    private $_database = "imsaleh";
    public function envFile (){
        $env = getenv('Config/.env');
        echo $env;
    }

    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    private function __construct()
    {
            $this-> _connection = new \mysqli($this->_host, $this->_username,
            $this-> _password, $this->_database);

        // Error handling
        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL",
                E_USER_ERROR);
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }


    // Get mysqli connection
    public function getConnection()
    {
        return $this->_connection;
    }
}




