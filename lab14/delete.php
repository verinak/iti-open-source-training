<?php include "config.php" ?>
<?php 

// get user id
if(isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
}

// delete user
$link = connect_mysqli($dbhost, $dbuser, $dbpass, $dbname);

$query = "DELETE FROM users WHERE userid = $userId;";


$retval = mysqli_query($link, $query);

if(!$retval) {
    echo "<p style='color:red;'>Could not delete user: " . mysqli_connect_error($retval) ."</p>";
    mysqli_close($link);
}
else {
    // redirect back to index.php
    mysqli_close($link);
    header("Location: ./");
    exit();
}


?>