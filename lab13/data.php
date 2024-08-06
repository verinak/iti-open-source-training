<?php include "students.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>

    <style>
        .red {
            color:red;
        }
    </style>
</head>
<body>
    <h1>Application Name: PHP class registration</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Track</th>
        </tr>

        <?php

        foreach ($students as $student){
            if(strcmp($student['track'], 'CMS') == 0) {
                echo "<tr class='red'>";
            }
            else {
                echo "<tr>";
            }
            echo "<td>".$student['name']."</td>";
            echo "<td>".$student['email']."</td>";
            echo "<td>".$student['track']."</td>";
            echo "</tr>";
        }
        
        ?>
    </table>
</body>
</html>