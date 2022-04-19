<?php
    include("conf/configuration.php");
    define("MYSQL_HOST",$MYSQL_HOST);
    define("MYSQL_USER",$MYSQL_USER);
    define("MYSQL_PASS",$MYSQL_PASSWORD);
    define("MYSQL_DB_NAME",$MYSQL_DATABASE_NAME);
    class Connection
    {
        private $dbhost = MYSQL_HOST;

        private $dbuser = MYSQL_USER;

        private $dbpass = MYSQL_PASS;

        private $dbname = MYSQL_DB_NAME;

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