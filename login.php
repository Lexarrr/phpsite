<?php
include("asserts/functions.php");
$title = "Авторизация";
$m = get_menu($menu);
require_once("profile/user-data.php");
if (!$_POST["userEmail"] || !$_POST["userPass"]) {
    $content = "<h2>Fill not all in form</h2>";
    $content .= file_get_contents("asserts/log.inc");
} else {
    if (!$qResult) {
        $content = "<h2>Not correct login or youre not sing up<h2/>";
        header("refresh: 1, url=loginform.html");
    } else {

        $login = htmlspecialchars(trim($_POST["userEmail"]));
        $pass = htmlspecialchars(trim($_POST["userPass"]));
        //$h_pass = password_hash($pass, PASSWORD_DEFAULT);
        if (password_verify($pass, $userPass) && $login == $userEmail) {
            $content = "<h2>Sing up sucsses</h2>";
            $userArray = [
                "ID" => $user_ID,
                "NAME" => $userName,
                "EMAIL" => $userEmail,
                "LEVEL" => $userLevel,
                "LOGGED" => true
            ];
            $_SESSION["USER"] = $userArray;
            $page = "refresh: 1, url=" . $_SERVER["HTTP_REFERER"];
            header($page);
        } else {
            $content = "<h2>Not correct login or password</h2>";
            $page = "refresh: 1, url= " . $_SERVER["HTTP_REFERER"];
            header($page);
        }
    }
}
include("asserts/design.php");
