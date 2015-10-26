<html>

<head>
</head>
<body>
<div style=margin:auto;">
    <table>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>News Text</th>
        </tr>
        <tr>
            <th><BR></th>
        </tr>
        <?php
        foreach ($items as $item): ?>
            <tr>
                <td><?php echo $item['postDate']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php $home = $item['path'];
                    if (is_readable(__DIR__ . "/../$home")) {
                    $homepage = file_get_contents(__DIR__ . "/../$home", NULL, NULL, 0, 140);
                    echo $homepage; ?><br><a href="/fullnews.php/?id=<?php echo $item['id']; ?>">Read Full News>> </a></td>
                <?php } else {
                    echo 'Inaccecble File for reading';
                } ?>
            </tr>
        <?php endforeach; ?>
        </tr>
    </table>
</div>

<?php include __DIR__ . '/form.php'; ?>

</body>
</html>