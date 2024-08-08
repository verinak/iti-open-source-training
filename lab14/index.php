<?php include "config.php" ?>

<?php
    
    $link = connect_mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $query = 'SELECT userid, username, email, gender, mail_status FROM users';
    mysqli_select_db($link, $dbname);

    $result = mysqli_query($link,$query);
    
    if(!$result) {
        echo "<script>console.log('Could not get data " . mysqli_connect_error($result) . "');</script>" . PHP_EOL ;
    }

    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row

    // } else {
    //     echo "0 results";
    // }
    /* //Its a good practice to release cursor memory
    mysqli_free_result($result);
    */
    // echo "Fetched data successfully\n";
    
    mysqli_close($link);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <main class="container py-2">

        <div class="container px-0 row align-items-center">
            <div class="col">
                <h1 >Users Details</h1>
            </div>
            
            <div class="col">
            <a href="./register.php"><button type="button" class="btn btn-primary">Add New User</button></a>
            </div>
        </div>
        <hr/>
    
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>

            <?php

            foreach ($result as $user){
                echo "<tr>";
                echo "<td>".$user['userid']."</td>";
                echo "<td>".$user['username']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['gender']."</td>";
                echo "<td>". ($user['mail_status'] ? "yes" : "no")."</td>";

                echo"<td> <a href='view.php?user_id=" .$user['userid']. "' class='link-underline link-underline-opacity-0'><i data-feather='eye'></i></a> </td>";
                echo"<td> <a href='edit.php?user_id=" .$user['userid']. "' class='link-underline link-underline-opacity-0'><i data-feather='edit-3'></i></a> </td>";
                echo"<td> <a href='delete.php?user_id=" .$user['userid']. "' class='link-underline link-underline-opacity-0'><i data-feather='trash-2'></i></a> </td>";

                echo "</tr>";
            }
            
            ?>
        </table>

    </main>



    <script>
        feather.replace();
    </script>
    
</body>
</html>