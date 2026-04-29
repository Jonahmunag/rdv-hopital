<?php
class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=rendezvous", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}