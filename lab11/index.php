<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>

    <h1>Task 1</h1>
    <a href="info.php"><button>Show phpinfo</button></a><br/>

    <h1>Task 2</h1>
    <?php echo "<p>Welcome to ".SITE_NAME."</p>";?>

    <h1>Task 3</h1>
    <?php

    echo "<p><b>Server Name:</b> " . $_SERVER['SERVER_NAME'] . "</p>";
    echo "<p><b>Server Address:</b> " . $_SERVER['SERVER_ADDR'] . "</p>";
    echo "<p><b>Server Port:</b> " . $_SERVER['SERVER_PORT'] . "</p>";
    echo "<p><b>File Name and Path:</b> " . $_SERVER['SCRIPT_NAME'] . "</p>";
    
    ?>

    <h1>Task 4</h1>

    <p>
    <?php

    $age = 5;

    if ($age < 5) {
        echo "Stay at home.";
    } elseif ($age == 5) {
        echo "Go to Kindergarten.";
    } elseif ($age >= 6 && $age <= 12) {
        $grade = $age - 6;
        echo "Go to grade $grade.";
    } else {
        echo "Age is not within range.";
    }

    // switch (true) {
    //     case ($age < 5):
    //         echo "Stay at home";
    //         break;
    //     case ($age == 5):
    //         echo "Go to Kindergarden";
    //         break;
    //     case ($age >= 6 && $age <= 12):
    //         $grade = $age - 6;
    //         echo "Go to grade $grade.";
    //         break;
    //     default:
    //         echo "Age is not within range.";
    //         break;
    // }

    ?>
    </p>

</body>
</html>