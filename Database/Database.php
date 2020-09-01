<?php
class Database
{
    // DB Params

    private $host = $_ENV['HOST'];

    private $db_name = $_ENV['DB_NAME'];
    private $username = $_ENV['DB_USER'];
    private $password = $_ENV['DB_PASS'];
    private $conn;

    // DB Connect
    public function connect()
    {
        $this->conn = null;
        echo 'HOST : '.$this->$host;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo 'Connection Error: ' . $exception->getMessage();
        }

        return $this->conn;
    }
}
