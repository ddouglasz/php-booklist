<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>

<body>
    <h1> The select page</h1>
    <ul>
    <?php
    readfile('navigation.tmpl.html');

    $db = mysqli_connect('localhost', 'root', '', 'php'); 
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($db, $sql);

    foreach ($result as $row) {
            printf('<li id="authors-list" style="color:%s;"> <span >%s (%s)</span>
            <a href="update.php?id=%s">edit</a>
            <a href="delete.php?id=%s" class="delete-link">delete</a></li>',
            htmlspecialchars($row['color']),
            htmlspecialchars($row['name']),
            htmlspecialchars($row['gender']),
            htmlspecialchars($row['id']),
            htmlspecialchars($row['id'])
        );
    }
    mysqli_close($db);
    ?>
    </ul>
</body>
</html>