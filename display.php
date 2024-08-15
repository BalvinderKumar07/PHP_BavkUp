<?php
include("config.php");

// Establish database connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

$data = "SELECT * FROM update_content";
$query = mysqli_query($conn, $data);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>display</title>
</head>

<body>
    <table border="">
        <tr align="center">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>city</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        if ($total > 0) {
            while ($result = mysqli_fetch_assoc($query)) {
        ?>
                <tr align="center">
                    <td><?php echo $result["id"]; ?></td>
                    <td><?php echo $result["name"]; ?></td>
                    <td><?php echo $result["last"]; ?></td>
                    <td><?php echo $result["city"]; ?></td>
                    <td><a href="update.php?id=<?php echo $result["id"]; ?>">update</a></td>
                    <td><a href="delete.php?id=<?php echo $result["id"]; ?>">Delete</a></td>
                    
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='4'>Table is empty</td></tr>";
        }
        ?>
    </table>
</body>

</html>
