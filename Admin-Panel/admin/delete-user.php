<?php
include "config.php";
if($_SESSION["user_role"] == '0'){
  header("Location: post.php");
}
$userid = $_GET['id'];

$sql = "DELETE FROM  user_table WHERE user_id = {$userid}";

if(mysqli_query($conn, $sql)){
  header("Location: users.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
}

mysqli_close($conn);

?>
