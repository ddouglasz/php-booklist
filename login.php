<?php
    session_start();

    $message = '';

    if(isset($_POST['name']) && isset($_POST['password'])) {
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf("SELECT * from users WHERE name='%s'",
        mysqli_real_escape_string($db, $_POST['name'])
     );
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if(ok) {
            $hash = $row['password'];
            $isAdmin = $row['isAdmin'];

            if(password_verify($_POST['password'], $hash)) {
                $message = 'Login Successful.';

                $_SESSiON['user'] = $row['name'];
                $_SESSION['isAdmin'] = $isAdmin;

            } else {
                $message = 'Login failed.';
            } 
        }else {
                $message = 'Login failed.';
            }
        mysqli_close($db);
     }
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <?php
    readfile('navigation.tmpl.html');
    
    echo "<p>$message</p>";
    ?>
    <form action="" method="post">
        User name <input type="text" name="name"><br>
        Password <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

</body>
</html>