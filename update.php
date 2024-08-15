<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "config.php";
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM update_content WHERE id = {$user_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id'];  ?>"><br><br>
                <label for="">Name</label><br>
                <input type="text" name="name" value="<?php echo $row['name'];  ?>"><br><br>
                <label for="">Last Name</label><br>
                <input type="text" name="last" value="<?php echo $row['last'];  ?>"><br><br>
                <label for="">city</label><br>
                <input type="text" name="city" value="<?php echo $row['city'];  ?>"><br><br>
                <input type="submit" name="submit" value="update">
            </form>
            <?php
        }
    }
    ?>
    <?php
    include ("config.php");
    ?>
    <?php
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $last = $_POST['last'];
        $city = $_POST['city'];

        $data = "UPDATE update_content SET name = '{$name}', last = '{$last}' , city = '{$city}' WHERE id = {$id}";
        
        $newdata = mysqli_query($conn, $data);

        if (mysqli_query($conn, $newdata)) {
            echo "<p>Can't Update the User Record.</p>";
        } else {
            header("Location:display.php");
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>