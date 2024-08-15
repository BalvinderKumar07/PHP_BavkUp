<?php include "header.php";?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
      <?php
        include "config.php";

        $post_id = $_GET['id'];
        $sql = "SELECT post.post_id, post.post_title, post.post_designer,post.post_price,
        post.post_category,post.post_image FROM post WHERE post.post_id = {$post_id}";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>
        <!-- Form for show edit-->
         <!-- Form -->
         <form  action="save-update-post.php" method="POST" enctype="multipart/form-data">
         <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
              <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name="post_title" class="form-control" value="<?php echo $row['post_title']; ?>" autocomplete="off" required >
              </div>
              <div class="form-group">
                <label for="post_title">Designer Name</label>
                <input type="text" name="creater" class="form-control" value="<?php echo $row['post_designer']; ?>" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="post_title">Price</label>
                <input type="text" name="rate" class="form-control" value="<?php echo $row['post_price']; ?>" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Category</label>
                <select name="category" class="form-control">
                    <option disabled selected> Select Category</option>
                      <?php
                        include "config.php";
                        $sql = "SELECT * FROM category";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");

                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                          }
                        }
                      ?>
                  </select>
                  <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Post image</label>
                <input type="file" name="fileToUpload" required>
                <input type="hidden" name="old_image" value="<?php echo $row['post_image']; ?>">
              </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
          </form>
      <!--/Form -->
        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
