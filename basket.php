<?php
include("asserts/functions.php");
$title = "Ваша корзина";
$m = get_menu($menu);
if (isset($_SESSION["BASKET"])) {
    $arBasket = $_SESSION["BASKET"];
    $json = json_encode($arBasket);
    setcookie("utm", $json, time() + (60 * 60 * 24 * 7), "/");
    // file_put_contents("UPLOADS/todo.json", $json);
    $content = "<h1>Ваша корзина</h1>";
    $content .= "<table class=\"table table-striped table-secondary table-bordered\">
                <thead>
                    <tr class=\"text-center\">
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">Продукт</th>
                        <th scope=\"col\">Описание</th>
                        <th scope=\"col\">&nbsp;</th>
                        <th scope=\"col\">Цена за ед., руб.</th>
                        <th scope=\"col\">Кол-во, ед.</th>
                        <th scope=\"col\">&nbsp;</th>
                        <th scope=\"col\">Всего, руб.</th>
                        <th scope=\"col\">&nbsp;</th>
                        <th scope=\"col\">&nbsp;</th>
                        
                    </tr>
                </thead>
                <tr>";
    $count = 0;
    $total = 0;
    foreach ($arBasket as $product) {
        foreach ($product as $key => $value) {
            if ($key == "ID") {
                $id = $value;
                $content .= "<td>" . ++$count . "</td>";
                continue;
            }
            if ($key == "PICT") {
                $content .= "<td class=\"text-center\"><img src=\"images/{$value}\" width=\"50\"></td>";
            } else if ($key == "NAME") {
                $content .= "<td><a class=\"link-underline-light\" href=\"product.php?id={$id}\">{$value}</a></td>";
            } else {
                $content .= "<td>{$value}</td>";
            }

            //if key == kolvo...
        }
        if ($count == 1) {
            $content .= "<td><a href=\"buy.php?product={$product["ID"]}\" class=\"decoration-none\">&#9650;</a>";
            $content .= "<a href=\"misbuy.php?product={$product["ID"]}\" id=\"disabledSelect\" class=\"decoration-none\" disabled>&#9660;</a></td>";
        } else {
            $content .= "<td><a href=\"buy.php?product={$product["ID"]}\" class=\"decoration-none\">&#9650;</a>";
            $content .= "<a href=\"misbuy.php?product={$product["ID"]}\" class=\"decoration-none\">&#9660;</a></td>";
        }
        $content .= "<td>" . $product["PRICE"] * $product["COUNT"] . "</td>";
        $content .= "<td><a class=\"decoration-none\" href = \"del_pos.php?pos={$id}\">&#128465;<a/><td/>";
        $content .= "</tr>";
        $total += $product["PRICE"] * $product["COUNT"];
    }
    $content .= "<tr>";
    $content .= "<td colspan=\"7\" class=\"text-end\"><b>ИТОГО:</b></td>";
    $content .= "<td><b>{$total}</b></td>";
    $content .= "<td>&nbsp;<td/>";
    $content .= "</tr>";
    $content .= "</table>";

    if (isset($_SESSION["USER"]) && $_SESSION["USER"]["LOGGED"]) {

        $content .= "<a href=\"arrange.php\" name=\"sent\" class=\"btn btn-primary\">Оформить заказ<a/>";

  

    } else {
        if (isset($_COOKIE["utm"])) {
            $cookieData = $_COOKIE["utm"];
            $arBasket = json_decode($cookieData, true);
            $_SESSION["BASKET"] = $arBasket;
            header("Location: basket.php");
        }
        $content = "<h2>Ваша корзина пуста!</h2>";
    }
}

include("asserts/design.php");
