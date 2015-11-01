<?php


class News extends AbstractModel
{
    protected static $table = 'news';
    protected static $class = 'News';

    public static function insertNews($news)
    {
        $db = new DataBase();
        $date = mysql_real_escape_string(date('Y-m-d', strtotime($news['date'])));
        $title = mysql_real_escape_string($news['title']);
        $file = $news['file'];
        $image = mysql_real_escape_string(file_get_contents($file));
        if ($_FILES['news']['size']) {
            $sql = "INSERT INTO news ( date , title, path ) VALUES ('$date','$title','$image')";
            return $db->queryInsert($sql);
        }
    }


}