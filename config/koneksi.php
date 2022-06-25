<?php
session_start();
class Database {
    private $host;
    private $username;
    private $password;
    private $db;
    public $mysqli;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        $this->host = "remotemysql.com";
        $this->username = "mS9FA49Kdf";
        $this->password = "zHA7LtWGsL";
        $this->db = "mS9FA49Kdf";

        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return $this->mysqli;
    }
}
$db = new Database();
$db->db_connect();
?>