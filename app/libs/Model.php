<?php
class Model{
    function __construct(){
        $this->pdo = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . "", DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function select($queryParams, $binds = array()){
        $sql = "SELECT " . $queryParams['select'];
        if(isset($queryParams['from'])) $sql .= " FROM " . $queryParams['from'];
        if(isset($queryParams['where'])) $sql .= " WHERE " . $queryParams['where'];
        if(isset($queryParams['orderby'])) $sql .= " ORDER BY " . $queryParams['orderby'];
        if(isset($queryParams['limit'])) $sql .= " LIMIT " . $queryParams['limit'];

        $query = $this->pdo->prepare($sql);

        foreach($binds as $bind){
            $query->bindParam($bind[0], $bind[1]);
        }
        
        $query->execute();
        $returnArray = array();

        if($query->rowCount() > 0){
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($returnArray, $row);
            }
        }

        return $returnArray;
    }

    public function insert($queryParams, $binds = array()){
        $sql = "INSERT " . $queryParams['insertInto'];
        if(isset($queryParams['insert'])) $sql .= " " . $queryParams['insert'];
        if(isset($queryParams['values'])) $sql .= " VALUES " . $queryParams['values'];

        $query = $this->pdo->prepare($sql);

        foreach($binds as $bind){
            $query->bindParam($bind[0], $bind[1]);
        }

        return $query->execute();
    }

    public function update($queryParams, $binds = array()){
        $sql = "UPDATE " . $queryParams['update'];
        if(isset($queryParams['set'])) $sql .= " SET " . $queryParams['set'];
        if(isset($queryParams['where'])) $sql .= " WHERE " . $queryParams['where'];

        $query = $this->pdo->prepare($sql);

        foreach($binds as $bind){
            $query->bindParam($bind[0], $bind[1]);
        }

        return $query->execute();
    }

    public function delete($queryParams, $binds = array()){
        $sql = "DELETE FROM " . $queryParams['from'];
        if(isset($queryParams['where'])) $sql .= " WHERE " . $queryParams['where'];
        if(isset($queryParams['orderby'])) $sql .= " ORDER BY " . $queryParams['orderby'];
        if(isset($queryParams['limit'])) $sql .= " LIMIT " . $queryParams['limit'];

        $query = $this->pdo->prepare($sql);

        foreach($binds as $bind){
            $query->bindParam($bind[0], $bind[1]);
        }
        
        return $query->execute();
    }

    
}