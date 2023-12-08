<?php
require_once("config/connect.php");
include("asserts/functions.php");
$title = "Form for registration";
$m = get_menu($menu);
if (isset($_POST["sent"])) {
    $err = [];

    $name = htmlspecialchars(trim($_POST["userName"]));
    $email = htmlspecialchars(trim($_POST["userEmail"]));
    $pass1 = htmlspecialchars(trim($_POST["userPass1"]));
    $pass2 = htmlspecialchars(trim($_POST["userPass2"]));
    $level = 1;


    if (strlen($name) < 2 || strlen($name) > 30) {
        $err[] = "Имя должно быть более 2-х символов, но не более 30-ти";
    }

    if ($pass1 != $pass2 || strlen($pass1) < 3) {
        $err[] = "Passwords is difference or lengt < 3";
    }

    $query = mysqli_query($link, "SELECT NAME FROM users WHERE EMAIL='" . mysqli_real_escape_string($link, $email) . "'") or die(mysqli_error($link));
    if (mysqli_num_rows($query) > 0) {
        $err[] = "account already exist";
    }

    if (count($err) == 0) {
        $password = password_hash($pass1, PASSWORD_DEFAULT);
        $regtime = date("Y-m_d H:i:s");
    mysqli_query($link, "INSERT INTO users SET NAME='" . $name . "', EMAIL='" . $email . "', PASS='" . $password . "', LEVEL='" . $level . "', REGTIME='" . $regtime . "'") or die(mysqli_error($link));
        $content = "<h2>congratulation</h2>";
        // send_mail();
        header("refresh: 1, url=loginform.html");
    } else {
        $content = "<h2>При регистрации произошли ошибки: </h2>";
        foreach ($err as $error) {
            $content .= $error . "<br/>";
        }
        $content = get_content("asserts/register.inc");
    }

    mysqli_close($link);
}

include("asserts/design.php");
