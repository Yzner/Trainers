<?php
include_once("db.php");
include_once("trainers.php");

$db = new Database();
$connection = $db->getConnection();
$trainers = new Trainers($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers view</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include('header.html'); ?>
    <?php include('navbar.php'); ?>

    <div class="content">
    <h2>Trainers</h2>
    <table class="orange-theme">
        <thead>
            <tr>
                <th>Trainer ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Email</th>
                <th>Record added</th>
                <th>Last updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- You'll need to dynamically generate these rows with data from your database -->
       
            
            
            <?php
            $results = $trainers->displayAll();
            foreach ($results as $result) {
            ?>
            <tr>
                
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['location']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo $result['created_at']; ?></td>
                <td><?php echo $result['updated_at']; ?></td>
                <td>
                    <a href="trainers_edit.php?id=<?php echo $result['id']; ?>">Edit</a>
                    |
                    <a href="trainers_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>

           
        </tbody>
    </table>
        
    <a class="button-link" href="trainers_add.php">Add New Record</a>

        </div>
        
        <!-- Include the header -->
  
    <?php include('footer.html'); ?>


    <p></p>
</body>
</html>
