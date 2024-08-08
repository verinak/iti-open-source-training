<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    // get user id
    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
    }
    else if (isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
    }

    $link = connect_mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $query = "SELECT username, email, gender, mail_status FROM users WHERE userid = $userId";
    mysqli_select_db($link, $dbname);

    $result = mysqli_query($link, $query);

    if (!$result) {
        echo "<script>console.log('Could not get user data " . mysqli_connect_error($result) . "');</script>" . PHP_EOL;
    }

    mysqli_close($link);

    // get row data
    $user = mysqli_fetch_assoc($result);
    // print_r($user)

    ?>

    <main class="container py-2">

        <h1>Edit User: <?php echo $userId ?></h1>
        <hr/>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- hidden input field to send userId value in post request -->
        <input type="hidden" name="user_id" value="<?php echo $userId;?>">

        <table class="table table-borderless w-auto">
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value="<?php echo $user['username'] ?>" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" value="<?php echo $user['email'] ?>" required></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    <input type="radio" name="gender" value="F" required <?php if(strcmp($user['gender'], 'F') == 0) echo 'checked' ?>>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="M" <?php if(strcmp($user['gender'], 'M') == 0) echo 'checked' ?>>
                    <label for="male">Male</label>
                </td>
            </tr>
            <tr>
                <th>Receive emails from us </th>
                <td>
                    <input type="checkbox" name="agree" value="agree" <?php if($user['mail_status']) echo 'checked' ?>>
                </td>
            </tr>
        </table>

        <input class="btn btn-primary" type="submit" value="Save" name="submit">
        <a href="./"><button type="button" class="btn btn-secondary">Cancel</button></a>

        </form>

    </main>

    <?php

    if (isset($_POST['submit'])) {
        // echo "Submitted";
        $userId =  $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $mail_status = (isset($_POST['agree']) ? 1 : 0);

        // echo "<h2>Submitted Data: </h2>";
        // echo "Name: $name<br>";
        // echo "Email: $email<br>";
        // echo "Gender: $gender<br>";
        // echo "Mail Status: $mail_status<br>";

        $link = connect_mysqli($dbhost, $dbuser, $dbpass, $dbname);

        $query = "UPDATE users SET username=\"$name\", email=\"$email\", gender=\"$gender\", mail_status=$mail_status WHERE userid=$userId";

        // echo $query;

        $retval = mysqli_query($link, $query);
        
        if(!$retval) {
            echo "<p style='color:red;'>Could not update user data: " . mysqli_connect_error($retval) ."</p>";
            mysqli_close($link);
        }
        else {
            mysqli_close($link);
            header("Location: ./");
            exit();
        }
    }
    
    ?>
</body>

</html>