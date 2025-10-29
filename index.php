<?php
session_start();

if (isset($_POST['who']) && isset($_POST['pass'])) {
    if ($_POST['pass'] === 'php123') {
        $_SESSION['name'] = $_POST['who'];
        header("Location: game.php?name=".urlencode($_POST['who']));
        return;
    } else {
        $error = "Incorrect password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rock Paper Scissors - ba63c271</title>
</head>
<body>
<h1>Please Log In</h1>
<?php
if (isset($error)) {
    echo('<p style="color:red;">'.htmlentities($error)."</p>\n");
}
?>
<form method="post">
User Name: <input type="text" name="who"><br>
Password: <input type="password" name="pass"><br>
<input type="submit" value="Log In">
</form>
</body>
</html>
