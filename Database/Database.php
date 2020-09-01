<?php
class Database
{
    // DB Params
    // private $host = 'eu-cdbr-west-03.cleardb.net';
    // private $db_name = 'heroku_2f403f9964068f2';
    // private $username = 'b16742d66ff8f3';
    // private $password = 'ec3fd829';

    private $host = $_ENV['HOST'];
    private $db_name = $_ENV['DB_NAME'];
    private $username = $_ENV['DB_USER'];
    private $password = $_ENV['DB_PASS'];
    private $conn;

    // DB Connect
    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo 'Connection Error: ' . $exception->getMessage();
        }

        return $this->conn;
    }
}
