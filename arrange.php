<?php
// require_once("config/connect.php");
include("asserts/functions.php");
require_once("profile/order-data.php");
$m = get_menu($menu);
// получить username, useremail, address, total из basket.php

$to      = 'etc.21@yandex.ru'; //$userEmail
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (isset($_SESSION["BASKET"])) {
    $title = "Ваш заказ оформлен";
    $content = "Мы отправим сообщение на ваш email о деталях вашей покупки";
    // добавить заказ в бд, отправить письмо, очистить корзину и перейти на главную страницу
        //создать новый массив с данными из заполненной формы и отправить его в бд
        if (isset($_POST["sent"])) {
            $err = [];

            $name = htmlspecialchars(trim($_POST["userName"]));
            $email = htmlspecialchars(trim($_POST["userEmail"]));
            $address = htmlspecialchars(trim($_POST["userAddress"]));
        }
        $query = mysqli_query($link, "INSERT orders(NAME, EMAIL, ADDRESS, SUMM) VALUES({$userName}, {$userEmail}, {$userAddress}, $total);") or die(mysqli_error($link));
        send_mail($to, $from, $subject, $message, $headers);
    }
// mysqli_close($link);
include("asserts/design.php");
?>