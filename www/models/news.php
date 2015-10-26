<?php
require_once __DIR__ . '/../function/Database.php';
require_once __DIR__ . '/../function/file.php';

function newsGetAll()
{
    $db = new DataBase;
    $sql = 'SELECT * FROM news ORDER BY postDate DESC ';
    return $db->getTable($sql);
}

function insertNews($news)
{
    $db = new DataBase('localhost','root','test');
    $date =mysql_real_escape_string(date('Y-m-d', strtotime($news['date'])));
   $title=mysql_real_escape_string($news['title']);
    $path=mysql_real_escape_string($news['news']);
    $sql = "INSERT INTO news ( postDate , title, path )VALUES ('$date','$title','$path')";
    return $db->insertToTable($sql);
}

function newsGetChosen($newsID)
{
    $db=new DataBase();
    $newsID=mysql_real_escape_string($newsID);
    $sql='SELECT postDate,title,path FROM news WHERE id='.$newsID.' ';
    return $db->getChosen($sql);
}