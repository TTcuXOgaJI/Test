<?php


class DataBase
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('test');
    }

    public function query($sql, $class = 'stdClass')
    {
        $data = [];
        if ($result = mysql_query($sql)) {

            while (false != ($row = mysql_fetch_object($result, $class))) {
                $data[] = $row;
            }
        }
        return $data;
    }

    private function exec($sql)
    {
        $result = mysql_query($sql);
        return $result;
    }

    public function insertToTable($sql)
    {
        return $this->exec($sql);
    }


    public function getChosen($sql)
    {
        return $this->query($sql);
    }
}