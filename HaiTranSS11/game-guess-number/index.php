<?php
session_start();
//session_destroy();
define("DEFAULT_LOW", 1);
define("DEFAULT_HIGH", 100);
define("TRUE_NUMBER", "true");
define("FALSE_LOWER", "false-lower");
define("FALSE_HIGHER", "false-higher");

$reload = false;

if (!isset($_SESSION["low"])) {
    $_SESSION["low"] = DEFAULT_LOW;
    $_SESSION["high"] = DEFAULT_HIGH;
    unset($_POST["isRight"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION["low"] >= $_SESSION["high"] || $_SESSION["low"] < 1 || $_SESSION["high"] > 100) {
        echo "You're kidding me? I code this game not to you do it! Stupid fool!<br>";
        echo "Just press F5 to play again! If you're enough smart!";
        $reload = true;
        unset($_POST["isRight"]);
        session_destroy();
    } else
        switch ($_POST["isRight"]) {
            case TRUE_NUMBER:
                echo "Yeah! I did it. Reload or press F5 to play again!";
                $reload = true;
                unset($_POST["isRight"]);
                session_destroy();
                break;
            case FALSE_LOWER:
                $_SESSION["high"] = --$_SESSION["guessNumber"];
                break;
            case FALSE_HIGHER:
                $_SESSION["low"] = ++$_SESSION["guessNumber"];
                break;
            default:
                if (!empty($_SESSION["guessNumber"]))
                    echo "You must choose an answer! Please try again!";
        }
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
    <style>
        div {
            position: absolute;
            margin-left: 30%;
            padding: 10px;
            border: 1px solid grey;
        }

    </style>
</head>
<body>
<?php if (!$reload): ?>
    <div>
        <h1>Guess Game</h1>
        <p>Your number is <?php echo $_SESSION["guessNumber"]; ?> ?</p>
        <form action="" method="post">
            <label><input type="radio" name="isRight" value="true">Yes, This is my number.</label><br>
            <label><input type="radio" name="isRight" value="false-lower">No, My number lower than that.</label><br>
            <label><input type="radio" name="isRight" value="false-higher">No, My number higher than that.</label><br>
            <input type="submit" value="Submit">
        </form>
    </div>
<?php endif; ?>
</body>
</html>
