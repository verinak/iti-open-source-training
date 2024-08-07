<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <main class="container py-2">

        <h1>User Registration Form</h1>
        <hr/>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="table table-borderless w-auto">
                <!-- name -->
                <tr>
                    <td>
                        <label><b>Name </b></label>
                    </td>
                    <td>
                        <input type="text" name="name" required>
                    </td>
                </tr>

                <!-- email -->
                <tr>
                    <td>
                        <label><b>Email </b></label>
                    </td>
                    <td>
                        <input type="email" name="email" required>
                    </td>
                </tr>

                <!-- gender -->
                <tr>
                    <td>
                        <label><b>Gender </b></label>
                    </td>
                    <td>
                        <input type="radio" name="gender" value="F" required><label for="female">Female</label>
                        <input type="radio" name="gender" value="M"><label for="male">Male</label>
                    </td>
                </tr>

                <!-- mail status -->
                <tr>
                    <td>
                        <label><b>Receive emails from us </b></label>
                    </td>
                    <td>
                        <input type="checkbox" name="agree" value="agree">
                    </td>
                </tr>

            </table>

            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
            <a href="./index.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
        </form>


    </main>

    <?php

    if (isset($_POST['submit'])) {
        // echo "Submitted";
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

        $query = "INSERT INTO users(username, email, gender, mail_status) VALUES (\"$name\", \"$email\", \"$gender\", $mail_status)";

        // echo $query;

        $retval = mysqli_query($link, $query);
        
        if(!$retval) {
            echo "<p style='color:red;'>Could not insert to table: " . mysqli_connect_error($retval) ."</p>";
            mysqli_close($link);
        }
        else {
            mysqli_close($link);
            header("Location: ./index.php");
            exit();
        }
    }
    
    
    ?>
    
</body>
</html>