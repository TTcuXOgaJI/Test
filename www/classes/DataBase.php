<?php


class DataBase
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('test');
    }

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
    }
}