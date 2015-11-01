<?php

abstract class AbstractModel implements IModel
{

    public static function getAll()
    {
        $db = new DataBase;
        $sql = ('SELECT * FROM' . ' ' . static::$table);
        return $db->queryAll($sql, static::$class);
    }

    public static function getChosen($ID)
    {
        $db = new DataBase();
        $ID = mysql_real_escape_string($ID);
        $sql = 'SELECT * FROM' . ' ' . static::$table . ' WHERE id=' . $ID . ' ';
        return $db->queryOne($sql, static::$class);
    }


}