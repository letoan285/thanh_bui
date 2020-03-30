<?php

class BaseModel {
    protected $host = "127.0.0.1";
    protected $username = "root";
    protected $password = "";
    protected $dbName = "thanh_database";
    public $connect;
    protected $sql = "";
    
    public function __construct()
    {
        $this->connect = new PDO("mysql:host=$this->host; dbname=$this->dbName", $this->username, $this->password);
    }

    public static function all()
    {
        $model = new static;
        $model->sql = "SELECT * FROM $model->table";
        $stmt = $model->connect->prepare($model->sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result;
    }

    public static function find($id)
    {
        $model = new static;
        $model->sql = "SELECT * FROM $model->table WHERE id = $id";
 
        $stmt = $model->connect->prepare($model->sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));

        if(count($result) > 0){
            return $result[0];
        } else {
            return null;
        }
        
    } 

    public static function where($arr = [])
    {
        $model = new static;
        $model->sql = "SELECT * FROM $model->table WHERE ";
        if(count($arr) == 2){
            $model->sql .= "$arr[0] = '$arr[1]'";
        } else if (count($arr) == 3){
            $model->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
        return $model;
    }
    public function andWhere($arr = [])
    {
        $this->sql .= " and ";
        if(count($arr) == 2){
            $this->sql .= "$arr[0] = '$arr[1]'";
        } else if (count($arr) == 3){
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
        return $this;
    }

    public function orWhere($arr = [])
    {
        $this->sql .= " or ";
        if(count($arr) == 2){
            $this->sql .= "$arr[0] = '$arr[1]'";
        } else if (count($arr) == 3){
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
        return $this;
    }
    public function get()
    {
        $stmt = $this->connect->prepare($this->sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));      
        return $result;
        
    }
    public function first()
    {
        $stmt = $this->connect->prepare($this->sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
        if(count($result) > 0){
            return $result[0];
        } else {
            return null;
        }
    }

    public function delete()
    {
        $this->sql = "DELETE FROM $this->table WHERE id = $this->id";
        $stmt = $this->connect->prepare($this->sql);
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            var_dump($e->getMessage());die;
        }
    }

    public function update()
    {
        $this->sql = "UPDATE $this->table SET ";
        foreach($this->columns as $col){
            if($this->{$col}){
                $this->sql .= "$col = '".$this->{$col}."', ";
            }
        }
        $this->sql = rtrim($this->sql, ", ");

        $this->sql .= "WHERE id = $this->id";

        $stmt = $this->connect->prepare($this->sql);

        try {
            $stmt->execute();
            return $this;
        } catch (PDOException $e){
            var_dump($e->getMessage());die;
        }
        
    }

    public function save()
    {
        $this->sql = "INSERT INTO $this->table (";
        foreach($this->columns as $col){
            if($this->{$col}){
                $this->sql .= "$col, ";
            }
        }

        $this->sql = rtrim($this->sql, ", ");

        $this->sql .= ") VALUES ( ";

        foreach($this->columns as $col){
            if($this->{$col}){
                $this->sql .= "'".$this->{$col}."', ";
            }
        }
        $this->sql = rtrim($this->sql, ", ");
        $this->sql .= ")";

        $stmt=$this->connect->prepare($this->sql);
        try {
            $stmt->execute();
            $this->id = $this->connect->lastInsertId();
            return $this;
        } catch (PDOException $e){
            var_dump($e->getMessage());die;
        }

    }

}
