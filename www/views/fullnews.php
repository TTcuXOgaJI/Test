<html>

<head>
</head>
<body>
<table border="1">
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>News</th>
    </tr>
    <?php
    foreach ($full_news as $full_new): ?>
        <tr>
            <td><?php echo $full_new['date']; ?></td>
            <td><?php echo $full_new['title']; ?></td>
            <td><p style="word-break: break-all">
                <?php $text = $full_new['path'];
                if (isset($text)) {
                    echo $text; ?>
                <?php } else {
                    echo 'Problem Load News.';
                } ?>
                </p></td>

        </tr>
    <?php endforeach;
    ?>

</table>
<a href="/PHPTest/www/index.php"> Back To All News<< </a>
</body>
</html>