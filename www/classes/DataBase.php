<?php


class DataBase
{
    private $dataBaseHeandler;
    private $className = 'stdClass';

    public function __construct()
    {
        $this->dataBaseHeandler = new PDO('mysql:dbname=test;host=localhost', 'root', '');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params = [])
    {
        $statementHeandler = $this->dataBaseHeandler->prepare($sql);
        $statementHeandler->execute($params);
        return $statementHeandler->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $statementHeandler = $this->dataBaseHeandler->prepare($sql);
        return $statementHeandler->execute($params);
    }
    /*
       public function queryAll($sql, $class = 'stdClass')
       {
           $data = [];
           if ($result = mysql_query($sql)) {
               while (false != ($row = mysql_fetch_object($result, $class))) {
                   $data[] = $row;
               }

           }
           return $data;
       }

       public function queryOne($sql, $class = 'stdClass')
       {
           return $result = $this->queryAll($sql, $class)[0];
       }

       public function queryInsert($sql)
       {
           if (mysql_query($sql)) {
               $result = true;
           } else {
               $result = false;
           }
           return $result;
       }*/
}