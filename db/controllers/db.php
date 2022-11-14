<?php
    class DBController 
    {
        private $hostname = "localhost";
        private $db_name = "envergatoda";
        private $username = "root";
        private $password = " ";
        private $connection;

        public function __construct($username='root', $password='', $db_name='envergatoda', $hostname = 'localhost') {
            $this->hostname = $hostname;
            $this->db_name = $db_name;
            $this->username = $username;
            $this->password = $password;

            try {
                if ($this->connection === null){
                    $this->connection = new PDO("mysql:host=$this->hostname;dbname=$this->db_name", $this->username, $this->password);
                }
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function __destruct(){
            $this->close();
        }

        public function close(){ 
            $this->connection = null;
        }

        public function getAutoIncrement($table)
        {
            $query = "SELECT AUTO_INCREMENT 
                    FROM  INFORMATION_SCHEMA.TABLES 
                    WHERE TABLE_SCHEMA = '{$this->db_name}' 
                    AND   TABLE_NAME   = '$table'";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['AUTO_INCREMENT'];
        }

        public function getConnection() {
            try {
                if ($this->connection === null){
                    $this->connection = new PDO("mysql:host=$this->hostname;dbname=$this->db_name", $this->username, $this->password);
                }
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->connection;
        }
    }

?>