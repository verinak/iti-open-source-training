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
    <?php
    // $required = ['name', 'email', 'gender', 'courses', 'agree'];
    // $errors = [];
    $errors = ['name' => false, 'email'=> false, 'gender'=> false, 'courses'=> false, 'agree'=> false];

    $values = ['name' => '', 'email' => '', 'group' => '', 'details' => '', 'gender' => '', 'agree' => ''];
    $courses = [];
    // $name = $email = $group = $details = $gender = $agree = "";

    if (isset($_POST['submit'])) {
        // validation
        foreach($errors as $key => $value) {
            if(!isset($_POST[$key]) || empty($_POST[$key])) {
                $errors[$key] = true;
                // echo "$attr is missing";
            }
        }

        // get inputs if set
        foreach($values as $key => $value) {
            $values[$key] = isset($_POST[$key]) ? $_POST[$key] : "";
        }

        if(!$errors['courses']) {
            $courses = $_POST['courses'];
        }


        // print_r($values);

        // if (empty($errors)) {
        //     // get data
        //     // echo "Submitted";
        //     $name = $_POST['name'];
        //     $email = $_POST['email'];
        //     $group = (empty($_POST['group'])) ?  "None" : $_POST['group'];
        //     $details = (empty($_POST['details'])) ?  "None" : $_POST['details'];
        //     $gender = $_POST['gender'];
        //     $courses = $_POST['courses'];
        //     $coursesList = implode(", ", $courses);
        // }
    }

    ?>

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
                    <input type="text" name="name" value="<?php echo $values['name']; ?>">
                    <span class="red"> * <?php echo $errors['name'] ? "Name is required" : "";?></span>
                </td>
            </tr>

            <!-- email -->
            <tr>
                <td>
                    <label>Email: </label>
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo $values['email']; ?>">
                    <span class="red"> * <?php echo $errors['email'] ? "Email is required" : "";?></span>
                </td>
            </tr>

            <!-- group num -->
            <tr>
                <td>
                    <label>Group # </label>
                </td>
                <td>
                    <input type="number" name="group" value="<?php echo $values['group']; ?>" >
                </td>
            </tr>

            <!-- class details -->
            <tr>
                <td>
                    <label>Class details: </label>
                </td>
                <td>
                    <textarea name="details" rows="5" cols="30"><?php echo $values['details']; ?></textarea>
                </td>
            </tr>

            <!-- gender -->
            <tr>
                <td>
                    <label>Gender: </label>
                </td>
                <td>
                    <input type="radio" name="gender" value="female" <?php if(strcmp($values['gender'], "female") == 0) echo 'checked'; ?> >
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="male" <?php if(strcmp($values['gender'], "male") == 0) echo 'checked'; ?> >
                    <label for="male">Male</label>
                    <span class="red"> * <?php echo ($errors['gender']) ? "Gender is required" : "";?></span>
                </td>
            </tr>

            <!-- select courses -->
            <tr>
                <td>
                    <label>Select Courses: </label>
                </td>
                <td>
                <select name="courses[]" multiple>
                    <option value="html" <?php if(in_array("html", $courses)) echo 'selected'; ?> >HTML</option>
                    <option value="css" <?php if(in_array("css", $courses)) echo 'selected'; ?> >CSS</option>
                    <option value="js" <?php if(in_array("js", $courses)) echo 'selected'; ?> >JavaScript</option>
                    <option value="php" <?php if(in_array("php", $courses)) echo 'selected'; ?> >PHP</option>
                    <option value="apache" <?php if(in_array("apache", $courses)) echo 'selected'; ?> >Apache</option>
                </select>
                <span class="red"> * <?php echo $errors['courses'] ? "You must select at least 1 course to register." : "";?></span>
                </td>
            </tr>

            <!-- agree -->
            <tr>
                <td>
                    <label>Agree: </label>
                </td>
                <td>
                    <input type="checkbox" name="agree" value="agree" <?php if(strcmp($values['agree'], "agree") == 0) echo 'checked'; ?> >
                    <span class="red"> * <?php echo $errors['agree'] ? "You must agree to terms to proceed." : "";?></span>
                </td>
            </tr>

        </table>

        <input type="submit" value="Submit" name="submit">

    </form>

    <div>

    <?php
    // print_r($errors);
    // if(empty(array_filter($errors))) {
    //     echo "errors is empty";
    //     echo empty(array_filter($errors));
    // }

    // if post request and no missing data, display data
    if (isset($_POST['submit']) && empty(array_filter($errors))) {
        
        $coursesList = implode(", ", $courses);

        echo "<h2>Submitted Data</h2>" . PHP_EOL;
        echo "Name: ". $values['name'] . "<br>" . PHP_EOL;
        echo "Email: ". $values['email'] . "<br>" . PHP_EOL;
        echo "Group #: ". (empty($values['group']) ? 'None' : $values['group']) . "<br>" . PHP_EOL;
        echo "Class details: ". (empty($values['details']) ? 'None' : $values['details']) . "<br>" . PHP_EOL;
        echo "Gender: ". ucfirst($values['gender']) . "<br>" . PHP_EOL;
        echo "Courses: ". $coursesList . "<br>" . PHP_EOL;

    }

    ?>
    </div>
    
</body>
</html>