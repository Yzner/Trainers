<?php
include_once("db.php"); // Include the Database class file
include_once("trainers.php"); // Include the Student class file


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['name'],
    'location' => $_POST['location'],
    'email' => $_POST['email'],
    ];

    // Instantiate the Database and Trainers classes
    $database = new Database();
    $trainers = new Trainers($database);
    $trainers_id = $trainers->create($data);
    echo '<script>
                alert("Record added successfully.");
                window.location.href = "trainers.view.php?msg=Record added successfully.";
            </script>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>Add trainer</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('header.html'); ?>
    <?php include('navbar.php'); ?>

    <div class="content">
    <h1>Add Trainer</h1>
    <form action="" method="post" class="centered-form">
        <label for="name">Trainer name:</label>
        <input type="text" name="name" id="name" required>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>

        <label for="email">email:</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" value="Add Trainer">
    </form>
    </div>
    
    <?php include('footer.html'); ?>
</body>
</html>
