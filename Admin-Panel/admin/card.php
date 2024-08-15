<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="css/style.css">
    <style>

        :root{
            --main-color1:red;
        }
        * {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    transition: .3s linear;
}

html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 9rem;
    scroll-behavior: smooth;
}

html::-webkit-scrollbar {
    width: .8rem;
}

html::-webkit-scrollbar-track {
    background: transparent;
}

html::-webkit-scrollbar-thumb {
    background: var(--main-color1);
}
        /* =======================buy-tamplates style start */
.tamplates {
    width: 100%;
    height: auto;
    padding: 50px 3%;
}
.text {
    font-size: 18px;
    font-weight: 300;
    font-family: 'Montserrat', sans-serif;
    line-height: 25px;
    letter-spacing: 1px;
    color: white;
}

/* =================================================tamplates-box style start */
.tamplates-box {
    width: 100%;
    height: auto;
    margin: auto;
    padding-top: 50px;
}

.main-box {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    /* background:red; */
}

.sub-box {
    height: 400px;
    overflow: hidden;

}

.sub-box:hover {
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.562),
        -5px 5px 10px rgba(0, 0, 0, 0.562);
    transform: translateY(-10px);
    cursor: pointer;
}

.img-box {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.img-box img {
    width: 100%;
    height: auto;
    transition: 5s;
}

.sub-box:hover .img-box img {
    transform: translateY(-80%);
}

.hover_box {
    width: 100%;
    height: 110px;
    /* background: #eee; */
    padding: 10px 20px;
}

.hover_box p {
    font-size: 15px;
    padding: 5px 0;
    font-family: 'Montserrat', sans-serif;
}

.sub-box:hover .hover_box p span {
    color: var(--main-color1);
    text-decoration: underline;
}

.hover_box h4 {
    font-size: 25px;
}

.hover_box ion-icon {
    font-size: 15px;
    color: rgb(209, 209, 8);
}

.hover_box button {
    width: 47%;
    padding: 10px;
    font-family: 'Montserrat', sans-serif;
    background: var(--main-color1);
    color: #eee;
    position: relative;
    top: -30px;
    cursor: pointer;
    margin-left: 145px;
    font-size: 15px;
}

.hover_box button::before {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.2);
    opacity: 0;
    border-radius: 10px;
}

.hover_box button:hover::before {
    opacity: 1;
}

.btn_navbarB {
    padding: 15px 100px;
    margin-top: 50px;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--main-color2);
    border-radius: 0;
}

.btn_navbarB:hover ion-icon {
    transform: translateX(20px);
}

/* =================================================tamplates-box style end */
/* =======================buy-tamplates style end */

    </style>
</head>
<body>
   <!--==========================Buy tamplates section start==================================-->
   <section class="tamplates">
    <div class="tamplates-box" id="buy-tamplates">
        <div class="main-box">
        <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 4;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                 
                    /* select query of post table for admin user */
                    $sql = "SELECT * FROM post
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="sub-box">
                <div class="img-box">
                <img src="upload/<?php echo $row['post_image']; ?>">
                </div>
                <div class="hover_box">
                    <p><?php echo $row['post_title']; ?></p>
                    <p>Design by <span><?php echo $row['post_designer']; ?></span></p>

                    <h4><?php echo $row['post_price']; ?></h4>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>

                    <button>Live Preview</button>
                </div>
            </div>
            <?php
                    }
                }
               ?>           
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!--==========================Buy tamplates section end====================================-->

</body>
</html>