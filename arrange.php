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
  $content .= "<h2>Оформление заказа</h2>
    <br />
    <form method=\"post\" action=\"profile/order-data.php\">
    <div class=\"mb-3\">
        <label for=\"userName\" class=\"form-label\">Your name: </label>
        <input type=\"text\" id=\"userName\" name=\"userName\" class=\"form-control\" aria-describedby=\"textHelp\" />
        <div id=\"textHelp\" class=\"form-text\">Input your real name</div>
    </div>
    
    <div class=\"mb-3\">
        <label for=\"userEmail\" class=\"form-label\">Your E-mail: </label>
        <input type=\"Email\" id=\"userEmail\" name=\"userEmail\" class=\"form-control\" aria-describedby=\"emailHelp\" />
        <div id=\"emailHelp\" class=\"form-text\">We dont sent your e-mail anyone</div>
    </div>
    
    <div class=\"mb-3\">
        <label for=\"userAddress\" class=\"form-label\">Your address: </label>
        <input type=\"text\" id=\"userAddress\" name=\"userAddress\" class=\"form-control\" aria-describedby=\"textHelp\" />
        <div id=\"textHelp\" class=\"form-text\">Input your real name</div>
    </div>";
$content .= "К оплате: <b>{$total}</b><br/> <br/>";
$content .= "<input type=\"submit\" name=\"sent\" class=\"btn btn-primary\" value=\"Отправить\" /><form/>";

$query = mysqli_query($link, "INSERT orders(NAME, EMAIL, ADDRESS, SUMM) VALUES({$userName}, {$userEmail}, {$userAddress}, $total);") or die(mysqli_error($link));

send_mail($to, $from, $subject, $message, $headers);



if (isset($_SESSION["BASKET"])) {
    $title = "Ваш заказ оформлен";
    $content = "Мы отправим сообщение на ваш email о деталях вашей покупки";
    // добавить заказ в бд, отправить письмо, очистить корзину и перейти на главную страницу
        //создать новый массив с данными из заполненной формы и отправить его в бд


        // $query = mysqli_query($link, "INSERT orders(NAME, EMAIL, ADDRESS, SUMM) VALUES({$userName}, {$userEmail}, {$userAddress}, $total);") or die(mysqli_error($link));
        // send_mail($to, $from, $subject, $message, $headers);
    }
mysqli_close($link);
include("asserts/design.php");
?>