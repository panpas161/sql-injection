<?php
    class Connection
    {
        private $dbhost = "localhost";

        private $dbuser = "root";

        private $dbpass = "";

        private $dbname = "main_db";

        private $conn;

        private $prepared_query;

        function __construct()
        {

            $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname, 3306);

            try {
                $this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function executeQuery($query)
        {
            $prep = $this->conn->prepare($query);
            $prep->execute();
            $this->prepared_query = $prep;
        }

        function getQuery()
        {
            return $this->prepared_query;
        }
    }

?>