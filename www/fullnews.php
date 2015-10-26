<?php
require_once __DIR__ . '/models/news.php';

if (!isset($_GET['id'])) {
    echo 'There is no such news file'.$_GET['id'];
    die;
} else {
    $news_id = $_GET['id'];
    $full_news = newsGetChosen($news_id);
}
include __DIR__ . '/views/fullnews.php';
?>