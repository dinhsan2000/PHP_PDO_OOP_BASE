<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'oop';

    protected function connect()
     {
         $dsn = 'mysql:host=' . $this->host.';dbname=' . $this->db. ';charset=utf8';
         try {
             $pdo = new PDO($dsn, $this->user, $this->password);
             $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             return $pdo;
         } catch(PDOException $e) {
             print "Error Founds: ".$e->getMessage().PHP_EOL;
             die();
         }
     }
}
