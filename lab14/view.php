<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    // get user id
    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
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

        <h1>View User: <?php echo $userId ?></h1>
        <hr/>

        <table class="table table-borderless w-auto">
            <tr>
                <th>Name</th>
                <td><?php echo $user['username'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user['email'] ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo (strcmp($user['gender'], 'M') == 0) ? 'Male' : 'Female' ?></td>
            </tr>
            <tr>
                <td colspan="2"> You will <?php if (!$user['mail_status']) echo 'not' ?> receive emails from us.</td>
            </tr>
        </table>

        <a href="./"><button type="button" class="btn btn-secondary">Back</button></a>

    </main>
</body>

</html>