<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    
    <style>
        .red {
            color:red;
        }
    </style>
</head>
<body>
    <h1>Application Name: FCDS_OS class registration</h1>
    <p class="red"> Required field * </p>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <!-- name -->
            <tr>
                <td>
                    <label>Name: </label>
                </td>
                <td>
                    <input type="text" name="name" required><span class="red"> * </span>
                </td>
            </tr>

            <!-- email -->
            <tr>
                <td>
                    <label>Email: </label>
                </td>
                <td>
                    <input type="email" name="email" required><span class="red"> * </span>
                </td>
            </tr>

            <!-- group num -->
            <tr>
                <td>
                    <label>Group # </label>
                </td>
                <td>
                    <input type="number" name="group">
                </td>
            </tr>

            <!-- class details -->
            <tr>
                <td>
                    <label>Class details: </label>
                </td>
                <td>
                    <textarea name="details" rows="5" cols="30"></textarea>
                </td>
            </tr>

            <!-- gender -->
            <tr>
                <td>
                    <label>Gender: </label>
                </td>
                <td>
                    <input type="radio" name="gender" value="female"><label for="female">Female</label>
                    <input type="radio" name="gender" value="male"><label for="male">Male</label>
                    <span class="red"> * </span>
                </td>
            </tr>

            <!-- select courses -->
            <tr>
                <td>
                    <label>Select Courses: </label>
                </td>
                <td>
                <select name="courses[]" multiple required>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="js">JavaScript</option>
                    <option value="php">PHP</option>
                    <option value="apache">Apache</option>
                </select>
                </td>
            </tr>

            <!-- agree -->
            <tr>
                <td>
                    <label>Agree: </label>
                </td>
                <td>
                    <input type="checkbox" name="agree" value="agree"><span class="red"> * </span>
                </td>
            </tr>

        </table>

        <input type="submit" value="Submit" name="submit">

    </form>

    <?php
    if (isset($_POST['submit'])) {
        // echo "Submitted";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $group = (empty($_POST['group'])) ?  "None" : $_POST['group'];
        $details = (empty($_POST['details'])) ?  "None" : $_POST['details'];
        $gender = $_POST['gender'];
        $courses = $_POST['courses'];
        $coursesList = implode(", ", $courses);

        echo "<h2>Submitted Data: </h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Group #: $group<br>";
        echo "Class details: $details<br>";
        echo "Gender: $gender<br>";
        echo "Courses: $coursesList<br>";
        // print_r($courses);
        // var_dump($courses);
    }
    ?>
    
</body>
</html>