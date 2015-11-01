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
            <td><p style="word-break: break-all">
                    <?php $text = $item->path;
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