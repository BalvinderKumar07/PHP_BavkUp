<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="">Name</label><br>
        <input type="text" name="name" id=""><br><br>
        <label for="">last</label><br>
        <input type="text" name="last" id=""><br><br>
        <label for="">city</label><br>
        <input type="text" name="city" id=""><br><br>
        <input type="submit" name="submit" id="">
    </form>
    <?php
    include("config.php");
    ?>
    <?php
    if(isset($_POST["submit"]))
    {
        $name= $_POST['name'];
        $last= $_POST['last'];
        $city= $_POST['city'];

        $data = "INSERT INTO update_content(name,last,city) VALUES('$name','$last','$city')";

        $fire = mysqli_query($conn,$data);

        if($fire)
        {
            header("Location:display.php");
        }
        else
        {
            echo "data is not send";
        }
    }
    ?>
</body>
</html>