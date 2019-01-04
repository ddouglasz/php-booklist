<?php
require 'auth.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:select.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
    <?php
        readfile('navigation.tmpl.html');
        ?>
 <?php
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($db, $sql);
    // header('location:select.php');
    echo '<p>User Deleted.</p>';
    mysqli_close($db);
 ?>
</body>
</html>