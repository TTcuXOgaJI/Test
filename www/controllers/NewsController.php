<?php
//require_once __DIR__ . '/../models/News.php';
//require_once __DIR__ . '/../classes/Article.php';

class NewsController
{
    public function actionAll()
    {
        $items = News::newsGetAll();
        include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
        if (empty($_GET['id'])) {
            $message = 'There is no such news ';
            include __DIR__ . '/../views/Error.php';
        } else {
            $news_id = $_GET['id'];
          $full_news = News::newsGetChosen($news_id);
            include __DIR__ . '/../views/news/one.php';

        }
    }

    public function actionInsert()
    {
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
                News::insertNews($data);
                header('Location: index.php');
                die;
            }
        }
    }
}