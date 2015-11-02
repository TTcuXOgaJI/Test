<?php

abstract class AbstractModel implements IModel
{

    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DataBase();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public function findOneByPK()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DataBase();
        return $db->query($sql, [':id' => $this->id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        $db = new DataBase();
        foreach ($cols as $col) {

            $data[':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(',', $cols) . ') VALUES (' . implode(',', array_keys($data)) . ')';
        return $db->execute($sql, $data);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DataBase();
        return $db->execute($sql, [':id' => $this->id]);
    }

    public function updateRow()
    {
        $cols = [];
        $data = [];
        $db = new DataBase();
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }
        $sql = ' UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        return $db->execute($sql, $data);

    }
}