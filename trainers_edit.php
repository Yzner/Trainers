<?php
include_once("db.php");
include_once("trainers.php"); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch Province data by ID from the database
    $db = new Database();
    $trainers = new Trainers($db);
    $trainers_Data = $trainers->read($id); 

   
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name'],  
        'location' => $_POST['location'],
        'email' => $_POST['email'],
    ];

    $db = new Database();
    $province = new Trainers($db);

    // Call the edit method to update the province data
    if ($trainers->update($id, $data)) {
    //javascript from stackoverflow for pop up message
    echo '<script>
                alert("Record updated.");
                window.location.href = "trainers.view.php?msg=Record updated.";
              </script>';
    } else {
        echo "Failed to update the record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Edit Trainers</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('header.html'); ?>
    <?php include('navbar.php'); ?>

    <div class="content">
    <h2>Edit trainer Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $trainers_Data['id']; ?>">
        
        
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $trainers_Data['name']; ?>">

        <label for="location">Location: </label>
        <input type="text" name="location" id="location" value="<?php echo $trainers_Data['location']; ?>">

        <label for="email">Email: </label>
        <input type="text" name="email" id="email" value="<?php echo $trainers_Data['email']; ?>">
        
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('footer.html'); ?>
</body>
</html>