<!-- 

        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
      

        <?php include("asserts/vars.inc"); ?>
<!-- ?php require("asserts/vars.inc"); ?> shows all error, shows path -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
   
    <?php 

    echo summ(4, 33);

    // if($a > $b) {
    //     print("Type " . $a . " more then " . $b);
    // } else {
    //     print("Type " . $b . " more then " . $a);
    // }

    // $counter = 0;
    // $length = count($array);
    // while($counter < $length){
    //     echo $array[$counter] . "<br>";
    //     $counter++;
        
    // }

    // // print($array);
    // // var_dump($array);
    // // print_r($array); 

    // // print_r($array[2]);


    

    // foreach($array as $item){
    //     echo $item . "<br>";


    // }
    foreach($menu as $item => $link)    {
        echo "\t<li><a href=\"$link\">$item</a></li>\n";
    }

?>
</body>
</html> -->
