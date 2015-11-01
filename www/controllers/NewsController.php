<?php

class NewsController
{

    private function errMSG($message)
    {
        $view = new View();
        $view->message = $message;
        $view->display('news/Error.php');
    }

    public function actionAll()
    {
        $news = News::getAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');

    }

    public function actionOne()
    {
        if (empty($_GET['id'])) {
            $message = 'There is no such news ';
            $this->errMSG($message);
        } else {
            $news_id = $_GET['id'];
            $item = News::getChosen($news_id);
            $view = new View();
            $view->item = $item;
            $view->display('news/one.php');

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

                if (News::insertNews($data)) {
                    $this->actionAll();
                } else {
                    $message = 'Fail To load File';
                    $this->errMSG($message);
                }
                die;
            }
        }
    }
}