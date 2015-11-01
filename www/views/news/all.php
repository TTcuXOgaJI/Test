<html>

<head>
</head>
<body>
<?php if (!empty($items)) { ?>
    <div style=margin:auto;">

        <table border="1">
            <tr>
                <th>Date</th>
                <th>Title</th>
            </tr>
            <tr>
            </tr>
            <?php
            foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item->date; ?></td>
                    <td><br>
                        <a href="index.php?ctrl=News&act=One&id=<?php echo $item->id ?>"><?php echo $item->title ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tr>
        </table>


    </div>
<?php } ?>
<br>
<?php include __DIR__ . '/addForm.php'; ?>

</body>
</html>