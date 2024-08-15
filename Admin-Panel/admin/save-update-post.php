<?php
include "config.php";

if(isset($_FILES['fileToUpload'])){
  $errors = array();

  $file_name = $_FILES['fileToUpload']['name'];
  $file_size = $_FILES['fileToUpload']['size'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  $file_type = $_FILES['fileToUpload']['type'];
  $tmp = explode('.', $file_name);
  $file_ext = end($tmp);
  
  $extensions = array("jpeg","jpg","png");

  if(in_array($file_ext,$extensions) === false)
  {
    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
  }

  if($file_size > 6097152){
    $errors[] = "File size must be 2mb or lower.";
  }
  $new_name = time(). "-".basename($file_name);
  $target = "upload/".$new_name;

  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
}

$sql = "UPDATE post SET post_title ='{$_POST["post_title"]}',post_designer='{$_POST["creater"]}',post_price='{$_POST["rate"]}',post_category='{$_POST["category"]}',post_image='{$new_name}' 
      WHERE post_id='{$_POST["post_id"]}'";


$result = mysqli_query($conn,$sql);

if($result){
  header("location: post.php");
}else{
  echo "Query Failed";
}
?>
