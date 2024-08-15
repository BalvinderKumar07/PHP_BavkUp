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

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['post_title']);
  $designer = mysqli_real_escape_string($conn, $_POST['creater']);
  $price = mysqli_real_escape_string($conn, $_POST['rate']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $author = mysqli_real_escape_string($conn, $_POST['role']);
  date_default_timezone_set("Asia/Calcutta");
  $date = date("d M,Y,H:i");

  $sql = "INSERT INTO  post(post_title,post_designer,post_price,post_category,another,post_image,post_date)
                      VALUES('{$title}','{$designer}','{$price}','{$category}','{$author}','{$new_name}','{$date}');";
  $sql .= "UPDATE category SET category_No = category_No + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: post.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
