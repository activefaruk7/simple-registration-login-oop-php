<?php

class DB{

    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB = 'sajed';

    private $conn;

    public function __construct()
    {
        $this->connect();

        if($this->conn->connect_errno){
            echo "Erro: " . $this->conn->connect_error();
        }
    }

    private function connect(){

        $this->conn = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DB);

    }

    public function query($sql){
        $sql = $this->conn->query($sql);

        if($sql){
            return $sql;
        }

    }

    public function numRows($sql){

        $numRows = $sql->num_rows;

        if($numRows > 0){
            return $numRows;
        }else{
            return false;
        }

    }

    public function escapeString($input){

        $data = $this->conn->real_escape_string($input);

        return $data;

    }

    public function affectedRows(){

        $result = $this->conn->affected_rows;

        if( $result > 0){
            return $result;
        }else{
            return false;
        }

    }

}


