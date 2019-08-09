<?php

class QueryBuilder {

    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost; dbname=marlin_db", "root", "");
    }

    function getAll($table) {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getOne($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function add($table, $data) {
        $str = array_keys($data);
        $str = implode($str, ",");

        $points = array_keys($data);
        $points_str = "";
        foreach($data as $key => $value) {
            $points_str .= ":" . $key . ","; 
        }
        $points_str = rtrim($points_str, ",");
        
        $sql = "INSERT INTO $table ($str) VALUES ($points_str)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    function update($table, $data) {
        $str = "";
        foreach($data as $key => $value) {
            $str .= $key .  "=:" . $key . ","; 
        }
        $str = rtrim($str, ",");
        
        $sql = "UPDATE $table SET $str WHERE id = :id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
}
