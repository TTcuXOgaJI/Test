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
    if (!empty($full_news)): ?>
        <tr>
            <td><?php echo $full_news->date; ?></td>
            <td><?php echo $full_news->title; ?></td>
            <td><p style="word-break: break-all">
                    <?php $text = $full_news->path;
                    if (isset($text)) {
                        echo $text; ?>
                    <?php } else {
                        echo 'Problem Load News.';
                    } ?>
                </p></td>

        </tr>
    <?php endif;
    ?>

</table>
<a href="/PHPTest/www/index.php"> Back To All News<< </a>
</body>
</html>