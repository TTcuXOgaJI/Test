<?php

class NewsArticle extends Article
{
    public function File_upload($field)
    {
        if (empty($_FILES))
            return false;
        if (0 != $_FILES[$field]['error'])
            return false;
        if (is_uploaded_file($image = $_FILES[$field]['tmp_name'])) {
            return $image;
        } else {
            return false;
        }
        return false;
    }
}