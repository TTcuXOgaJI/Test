<?php

class Article
{
    public $title;
    public $text;

    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function view()
    {
        echo $this->title;
        echo "<br>";
        echo $this->text;
    }
}
$a = new Article('news Titile','news Text');
$a->view();