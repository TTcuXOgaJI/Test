<html>

<head>
</head>
<body>
<table>
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>News</th>
    </tr>
    <tr>
        <th><BR></th>
    </tr>
    <?php foreach ($items as $full_new): ?>
        <tr>
            <td><?php echo $full_new['date']; ?></td>
            <td><?php echo $full_new['title']; ?></td>
            <td><?php $home = $full_new['path'];
                if (is_readable(__DIR__ . "/../$home")) {
                $homepage = file_get_contents(__DIR__ . "/../$home");
                echo $homepage; ?><br><a href="/index.php/">Back << </a></td>
            <?php } else {
                echo 'Problem Load News.';
            } ?>
        </tr>
    <?php endforeach; ?>
    </tr>
</table>
</body>
</html>