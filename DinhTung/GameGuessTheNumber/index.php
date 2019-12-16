<?php
session_start();
define("DEFAULT_LOW", 1);
define("DEFAULT_HIGH", 100);
$reload = false;
if (!isset($_SESSION["low"])) {
    $_SESSION["low"] = DEFAULT_LOW;
    $_SESSION["high"] = DEFAULT_HIGH;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["isRight"] == "true") {
        echo "<br>";
        echo "Yeah! I did it. Please click on URL and enter if you want to try again!";
        $reload = true;
        session_destroy();
    }
    elseif ($_POST["isRight"] == "false-lower") {
        $_SESSION["high"] = --$_SESSION["guessNumber"];
    } else
        $_SESSION["low"] = ++$_SESSION["guessNumber"];
}
function guessNumber($low, $high)
{
    return mt_rand($low, $high);
}
$_SESSION["guessNumber"] = guessNumber($_SESSION["low"], $_SESSION["high"]);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <?php if (!$reload): ?>
        <p>Is <?php echo $_SESSION["guessNumber"]; ?>?</p>
        <form action="" method="post">
            <label><input type="radio" name="isRight" value="true">Yes, This is my number.</label>
            <label><input type="radio" name="isRight" value="false-lower">No, My number lower than that.</label>
            <label><input type="radio" name="isRight" value="false-higher">No, My number higher than that.</label>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</div>
</body>
</html>