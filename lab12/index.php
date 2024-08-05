<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lab 2</title>
</head>

    <h1>Task 1</h1>
    <p>
    <?php echo"This is a line.<br/>This is another line.";?>
    </p>
    
    <h1>Task 2</h1>
    <?php
    
    echo "<p>";
    $test_str = "This is a string.";
    echo $test_str;
    echo "</p>";

    echo "<p><b>str_replace() : </b>";
    echo str_replace("i", "X", $test_str);
    echo "</p>";

    echo "<p><b>strtoupper() : </b>";
    echo strtoupper($test_str);
    echo "</p>";

    echo "<p><b>explode() : </b>";
    print_r(explode(" ", $test_str));
    echo "</p>";


    ?>
    
    <h1>Task 3</h1>
    <?php

    print "<pre>";
    print_r($_SERVER);
    print "</pre>";
    
    ?>

    <h1>Task 4</h1>

    <?php

    $arr = [];
    $arr[1] = 45;
    $arr[0] = 12;
    $arr[3] = 25;
    $arr[2] = 10;

    // array
    echo "<pre>";
    echo "<b>Original array: </b><br/>";
    print_r($arr);
    echo "</pre>";

    // reverse
    echo "<pre>";
    echo "<b>Reversed: </b><br/>";
    print_r(array_reverse($arr));
    echo "</pre>";

    // sort
    echo "<pre>";
    echo "<b>Sort high to low: </b><br/>";
    $sorted_arr = $arr;
    sort($sorted_arr);
    print_r($sorted_arr);
    echo "</pre>";

    $sum = array_sum($arr);
    echo "<pre>";
    echo "<b>Sum:</b> $sum";
    echo "</pre>";
    
    $avg = $sum / count($arr);
    echo "<pre>";
    echo "<b>Average:</b> $avg";
    echo "</pre>";

    ?>

    <h1>Task 5</h1>

    <?php

    $arr = array("Sara" => 31, "John" => 41, "Walaa" => 39, "Ramy" => 40);

    // array
    echo "<pre>";
    echo "<b>Original array: </b><br/>";
    print_r($arr);
    echo "</pre>";

    // ascending by value
    echo "<pre>";
    echo "<b>Sort ascending by value: </b><br/>";
    $sorted_arr = $arr;
    asort($sorted_arr);
    print_r($sorted_arr);
    echo "</pre>";

    // ascending by key
    echo "<pre>";
    echo "<b>Sort ascending by key: </b><br/>";
    $sorted_arr = $arr;
    ksort($sorted_arr);
    print_r($sorted_arr);
    echo "</pre>";

    // descending by value
    echo "<pre>";
    echo "<b>Sort descending by value: </b><br/>";
    $sorted_arr = $arr;
    arsort($sorted_arr);
    print_r($sorted_arr);
    echo "</pre>";

    // descending by key
    echo "<pre>";
    echo "<b>Sort descending by key: </b><br/>";
    $sorted_arr = $arr;
    krsort($sorted_arr);
    print_r($sorted_arr);
    echo "</pre>";
    
    ?>
    
</body>
</html>