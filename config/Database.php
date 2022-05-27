<?php
    class Database{
        private $host = 'localhost';
        private $db_name = 'Shafitabil_shop';
        private $username = 'root';
        private $password = '';
        private $conn;

        public function connect(){
            $this->conn = null;

            try{
                $this->conn = new PDD('msql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDD::ATTR_ERRMODE, PDD::ERRMODE_EXCEPTION);
            }catch(PDDException $e){
                echo 'Connection Error:' . $e->getMessage();
            }
            return $this->conn;
        }
    }