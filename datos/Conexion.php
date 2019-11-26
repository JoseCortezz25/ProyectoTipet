<?php
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = '127.0.0.1:52225';
        $this->db       = 'proyectotipetdb';
        $this->user     = 'azure';
        $this->password = "6#vWHD_$";
        $this->charset  = 'utf8mb4';
    }

    public function conectar(){
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $pdo = new PDO($connection, $this->user, $this->password);
   
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
?>

