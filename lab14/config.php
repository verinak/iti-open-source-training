<?php 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'lab14';

function connect_mysqli($dbhost, $dbuser, $dbpass, $dbname) {
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$link) {
        echo "<script>console.log('Error: Unable to connect to MySQL." . PHP_EOL . "');</script>";
        //  echo "<script>console.log('Debugging error #: " . mysqli_connect_errno() . PHP_EOL . "');</script>";
        //  echo "<script>console.log('Debugging error: " . mysqli_connect_error() . PHP_EOL . "');</script>";
        exit();
        }
        echo "<script>console.log('Successfully conneted to database " . $dbname . "');</script>" . PHP_EOL;
        echo "<script>console.log('Host information: " . mysqli_get_host_info($link) . "');</script>". PHP_EOL ;

        return $link;
}


// mysqli_close($link);

?>
