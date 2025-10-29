<?php
session_start();

if (! isset($_SESSION['name'])) {
    die("ACCESS DENIED");
}

$names = array('Rock', 'Paper', 'Scissors');

function check($computer, $human) {
    if ($human == $computer) return "Tie";
    if ($human == 0 && $computer == 2) return "You Win";
    if ($human == 1 && $computer == 0) return "You Win";
    if ($human == 2 && $computer == 1) return "You Win";
    return "You Lose";
}

$result = false;

if (isset($_POST['human'])) {
    $human = $_POST['human'];
    if ($human == 'Test') {
        $result = "Test mode";
    } else {
        $human = intval($human);
        $computer = rand(0,2);
        $result = "Your Play=$names[$human] Computer Play=$names[$computer] Result=".check($computer, $human);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rock Paper Scissors - ba63c271</title>
</head>
<body>
<h1>Rock Paper Scissors</h1>
<p>Welcome: <?= htmlentities($_SESSION['name']) ?></p>

<form method="post">
<select name="human">
<option value="-1">--Select--</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="Test">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ($result !== false) {
    if ($result == "Test mode") {
        for($c=0;$c<3;$c++) {
            for($h=0;$h<3;$h++) {
                echo "Human=$names[$h] Computer=$names[$c] Result=".check($c,$h)."\n";
            }
        }
    } else {
        echo $result;
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    return;
}
?>
</pre>
</body>
</html>
