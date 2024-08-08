<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 15</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<main class="container d-flex justify-content-center align-items-center vh-100">

<div class="text-center">

    <!-- display number of visits -->
    <?php
    session_start();


    if (isset($_SESSION['page_visits'])) {
        $_SESSION['page_visits']++;
    } else {
        $_SESSION['page_visits'] = 1;
    }
    
    echo "<p>You visited this page ";
    echo "<span class='text-info'><b>" . $_SESSION['page_visits'] . "</b></span>";
    echo " times.</p>";
    // echo "<br/>"
    ?>

    <form method="post">
        <button class="btn btn-info" type="submit" name="clear_session">Clear Session</button>
    </form>

    <!-- clear session -->
    <?php

    if (isset($_POST['clear_session'])) {
        session_unset();
        session_destroy();

        // reload page
        header("Location: ./");
        exit();
    }
    ?>
</div>
</main>

</body>

</html>