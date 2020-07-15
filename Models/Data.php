<?php
    namespace Models;

    class Data{
        public $_host ;
        public $_username;
        public $_password;
        public $_database;

        /**
         * @param mixed $host
         */
        public function setHost()
        {
            return $this->_host = getenv('HOSTNAME');

        }

        /**
         * Data constructor.
         */
        public function __construct()
        {

        }
        function get ($_host){
            $this->$_host = $this->setHost();
        }


    }

?>