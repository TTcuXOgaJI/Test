<?php
require_once __DIR__ . '/../function/Database.php';

function newsGetAll()
{
    $db = new DataBase;
    $sql = 'SELECT * FROM news ORDER BY date DESC ';
    return $db->getTable($sql);
}

function insertNews($news)
{
    $db = new DataBase();
    $date = mysql_real_escape_string(date('Y-m-d', strtotime($news['date'])));
    $title = mysql_real_escape_string($news['title']);
    $file=$news['file'];
    $image = mysql_real_escape_string(file_get_contents($file));
    if ($_FILES['news']['size']) {
        $sql = "INSERT INTO news ( date , title, path )VALUES ('$date','$title','$image')";
        return $db->insertToTable($sql);
    }
}

function newsGetChosen($newsID)
{
    $db = new DataBase();
    $newsID = mysql_real_escape_string($newsID);
    $sql = 'SELECT date,title,path FROM news WHERE id=' . $newsID . ' ';
    return $db->getChosen($sql);
}