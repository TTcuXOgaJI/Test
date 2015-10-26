<?php

require_once __DIR__ . '/models/news.php';
if(!isset($_GET['id'])) {
    echo 'SSSS';
    die;
} else {
    $news_id = $_GET['id'];
    $full_news = News_getOnlyChosen($news_id);
}
include __DIR__ . '/views/fullnews.php';
?>