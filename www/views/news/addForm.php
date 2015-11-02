<form action="/PHPTest/www/index.php?ctrl=News&act=Insert" method="post" enctype="multipart/form-data">
    <label for="title">News Title</label>
    <input type="text" id="title" name="title">
    <input type="hidden" id="news" name="date" value="<?php $today = date('d.m.Y');
    echo $today; ?>"/>
    <label for="news">File</label>
    <input type="file" id="news" name="news">
    <input type="submit">
</form>
