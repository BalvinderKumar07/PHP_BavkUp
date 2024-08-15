<?php 
include "config.php";

$userid = $_GET['id'];

$sql = "DELETE FROM update_content WHERE id = {$userid}";

if (mysqli_query($conn, $sql)) {
    header("Location:display.php");
} else {
    echo "<p>Can't Delete the User Record.</p>";
}
mysqli_close($conn);
?>