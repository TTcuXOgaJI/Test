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
        $article = new NewsModel();
        $view = new View();
        $view->items = $article->findAll();
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        if (empty($_GET['id'])) {
            $message = 'There is no such news ';
            $this->errMSG($message);
        } else {
            $article = new NewsModel();
            $article->id=$_GET['id'];
            $view = new View();
            $view->item = $article->findOneByPK();
            $view->display('news/one.php');

        }
    }

    private function allocateArticleParameters($article)
    {
        if (!empty($_POST['title'])) {
            $article->title = $_POST['title'];
        }
        if (!empty($_POST['date'])) {

            $article->date = date('Y-m-d', strtotime($_POST['date']));
        }
        if (!empty($_FILES)) {
            $res = File::File_upload('news');
            if (false !== $res) {
                $article->path = file_get_contents($res);
            }
        }
        return $article;
    }

    public function actionInsert()
    {

        if (!empty($_POST)) {
            $article = new NewsModel();
            $this->allocateArticleParameters($article);
            if ($article->insert()) {
                $this->actionAll();
            } else {
                $message = 'Fail To load File';
                $this->errMSG($message);
            }

        }
    }

    public function actionUpdate()
    {
        if (empty($_POST['id'])) {

            $message = 'There is no such news ';
            $this->errMSG($message);
        } else {
            $article = new NewsModel();
            $article->id=$_POST['id'];
            $this->allocateArticleParameters($article);
            if ($article->updateRow()) {
                $this->actionAll();
            } else {
                $message = 'Fail To Update File';
                $this->errMSG($message);
            }
        }
    }


    public function actionDelete()
    {
        if (empty($_GET['id'])) {
            $message = 'There is no such news ';
            $this->errMSG($message);
        } else {
            $article = new NewsModel();
            $article->id=$_GET['id'];
            if ($article->deleteRow()) {
                $this->actionAll();
            } else {
                $this->errMSG('Fail Deleting a File');
            }
        }
    }


}