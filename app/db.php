<?php

class db{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";

    private $database = "mydb";
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host={$this->server};dbname={$this->database}", $this->user, $this->pass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function db() : \PDO {
        return $this->db;
    }
    function __destruct(){
        $this->db = null;
    }
    
}