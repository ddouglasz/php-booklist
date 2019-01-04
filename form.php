<!DOCTYPE html>
<html>
<head>
    <title>php form</title>
</head> 
<body>
<?php 
$name = '';
$password = '';
$comments = '';
$gender = '';
$tc = '';
$color = '';
$languages = array();

 if(isset($_POST['submit'])){
     $ok = true;
     if(!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
     }else{
         $name = $_POST['name'];
     }
    //  if(!isset($_POST['password']) || $_POST['password'] === '') {
    //     $ok = false;
    //  }else{
    //     $password = $_POST['password'];
    //  }
     if(!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
     }else{
         $gender = $_POST['gender'];
     }
     if(!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
     }else{
         $color = $_POST['color'];
        }
    // if(!isset($_POST['comments']) || $_POST['comments'] === '') {
    //      $ok = false;
    //   }else{
    //       $comments = $_POST['comments'];
    //   }
    // if(!isset($_POST['tc']) || $_POST['tc'] === '') {
    //       $ok = false;
    //   }else{
    //       $tc = $_POST['tc'];
    //   }
    // if(!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === '') {
    //         $ok = false;
    //   }else{
    //       $languages = $_POST['languages'];
    //   }

     If($ok){
         //using dummy details.
    // printf(
    // 'User name: %s
    // <br>Password: %s
    // <br>Gender: %s
    // <br>Color: %s
    // <br>Language(s): %s,
    // <br>comments: %s
    // <br>T&amp;C: %s',
    //     // htmlspecialchars( $_POST['name']),
    //     // htmlspecialchars($_POST['password']), 
    //     // htmlspecialchars($_POST['gender']),
    //     // htmlspecialchars($_POST['color']),
    //     // htmlspecialchars(implode(' ', $_POST['languages'])),
    //     // htmlspecialchars($_POST['comments']),
    //     // htmlspecialchars ($_POST['tc'])

    //     htmlspecialchars( $name),
    //     htmlspecialchars($password),   
    //     htmlspecialchars($gender),
    //     htmlspecialchars($color),
    //     htmlspecialchars(implode(' ', $languages)),
    //     htmlspecialchars($comments),
    //     htmlspecialchars ($tc)
    // );

    //creating an actual database.
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = sprintf("INSERT INTO users (name, gender, color) VALUES (
        '%s', '%s', '%s'
    )", mysqli_real_escape_string($db, $name),
        mysqli_real_escape_string($db, $gender),
        mysqli_real_escape_string($db, $color)
    );
    mysqli_query($db, $sql);
    mysqli_close($db);
        echo ' <p>User added.</p>';
 } 
}
?>

    <form method="post" action="">
    User name: <input type="text" name="name" value="<?php 
        echo htmlspecialchars($name);
    ?>"<br>
    Password: <input type="password" name="password" value="<?php 
        echo htmlspecialchars($password);
    ?>"><br>
    Gender: 
            <input type="radio" name="gender" value="f" <?php 
            if($gender === 'f') {
                echo ' checked';
            } 
            ?>>female
            <input type="radio" name="gender" value="m" <?php
            if($gender === 'm') {
                echo ' checked';
            }
            ?>>male<br>
    Favorite color:
        <select name="color">
            <option value="">Please select<option>
            <option value="#f00" <?php
            if($color === '#f00') {
                echo ' selected';
            }
            ?>>red</option>
            <option value="#0f0" 
            if($color === '#0f0') {
                echo ' selected';
            }
            >green</option>
            <option value="#00f"
            if($color === '#00f') {
                echo ' selected';
            }
            >blue</option>
        </select><br>
    Languages spoken:
        <select name="languages[]" multiple size="3">
            <option value="en" <?php
            if(in_array('en', $languages)) {
                echo ' selected';
            }
            ?>
            >English</option>
            <option value="fr"
            <?php
            if(in_array('fr', $languages)) {
                echo ' selected';
            }
            ?>
            >French</option>
            <option value="it"
            <?php
            if(in_array('it', $languages)) {
                echo ' selected';
            }
            ?>
            >Italian</option>
        </select><br>   
    Comments: <textarea name="comments" value="<?php
        echo htmlspecialchars($comments); 
    ?>"></textarea><br>
    <input type="checkbox" name="tc" value="ok" <?php 
        if($tc === 'ok') {
            echo ' checked';
        }
    ?>> I accept the T&C<br>
    <input type="submit" name="submit" value="submit">
    </form>
</body> 
</html>
