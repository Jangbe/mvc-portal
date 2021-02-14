<?php

class Database{
    private $host = 'localhost';
    private $db = 'mvc_portal';
    private $user = 'root';
    private $pass = '';
    private $dbh;
    private $table;
    private $stmt;

    public function __construct($table = null)
    {
        if(!is_null($table)){
            $this->table = $table;
        }

        $dsn = "mysql:host=$this->host;dbname=$this->db";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function table($tbl)
    {
        $this->table = $tbl;
        return $this;
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
        return $this;
    }

    public function bind($params, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        
        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function get(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function all()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM $this->table");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}