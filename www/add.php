<?php
require __DIR__ . '/models/news.php';
require __DIR__ . '/function/Article.php';

if (!empty($_POST)) {
    $data = [];
    if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
    }
    if (!empty($_POST['date'])) {
        $data['date'] = $_POST['date'];
    }
    if (!empty($_FILES)) {
        $a = new NewsArticle();
        $res = $a->File_upload('news');
        if (false !== $res) {
            $data['file'] = $res;
        }
    }
    if (isset($data['date']) && isset($data['title']) && isset($data['file'])) {
        insertNews($data);
        header('Location: index.php');
        die;
    }
}
include __DIR__ . '/views/add.php';
?>