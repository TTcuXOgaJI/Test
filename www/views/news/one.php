<html>

<head>
</head>
<body>
<table border="1">
    <tr>
        <th>Date</th>
        <th>News Title</th>
        <th>News</th>
    </tr>
    <?php
    if (!empty($item)): ?>
        <tr>
            <td><?php echo $item->date; ?></td>
            <td><?php echo $item->title; ?></td>
            <td>
                <?php $text = $item->path;
                if (isset($text)) {
                    echo nl2br($text); ?>
                <?php } else {
                    echo 'Problem Load News.';
                } ?>
            </td>

        </tr>
    <?php endif;
    ?>

</table>
<form action="/PHPTest/www/index.php" method="get">
    <input type="submit" name="act" value="Delete"><br>
    <input type="hidden" name="id" value="<?php echo $item->id ?>">
</form>

<form action="/PHPTest/www/index.php?act=Update" method="post" enctype="multipart/form-data">

    <label for="updateDate :">Update Date</label>
    <input type="checkbox" id="date" name="date" value="<?php $today = date('d.m.Y');
    echo $today; ?>"><br>

    <label for="title">Update Title </label>
    <input type="text" id="title" name="title"><br>

    <label for="news">Update News</label>
    <input type="file" id="news" name="news"><br>

    <input type="submit" name="act" value="Update"><br>
    <input type="hidden" name="id" value="<?php echo $item->id ?>">
</form>
<a href="/PHPTest/www/index.php"> Back To All News<< </a>
</body>
</html>