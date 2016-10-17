<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $cat=$_POST['cat'];
                $title=$_POST['title'];
                $body=$_POST['body'];
                $author=$_POST['author'];
                $userid=$_POST['userid'];
                $tags=$_POST['tags'];

          $cat=mysqli_real_escape_string($db->link, $cat);
          $title=mysqli_real_escape_string($db->link, $title);
          $body=mysqli_real_escape_string($db->link, $body);
          $author=mysqli_real_escape_string($db->link, $author);
          $userid=mysqli_real_escape_string($db->link, $userid);
          $tags=mysqli_real_escape_string($db->link, $tags);

          //$permited  = array('jpg', 'jpeg', 'png', 'gif');
           $file_name = $_FILES['image']['name'];
           $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
              $folder = "upload/";
     
          if(empty($cat) or empty($title) or empty($body) or empty($author)or empty($tags) or empty($file_name) or empty($userid)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }

          else{
              move_uploaded_file($file_temp, $folder.$file_name);
          $query="INSERT INTO tbl_post (cat,title,body,image,author,tags,userid) VALUES('$cat','$title','$body','$file_name','$author','$tags','$userid')";
          $inserted_rows=$db->insert($query);

          if($inserted_rows){

             echo "<span class= 'success'>post Inserted successfully</span>";

          }else{

            echo "<span class= 'error'>post Not Inserted successfully</span>";

          }



    }
}

    ?>

            <div class="block">               
                 <form action="addpost.php" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text"  name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                     <?php
                                $query="select* from tbl_catagory ";
                                $category=$db->select($query);
                                if($category){

                                    while($result=$category->fetch_assoc()){

                                ?>
                                    <option value="<?php echo $result['id']?>"><?php echo $result['name'];?></option>
                                    <?php }}?>
                                    
                            </select>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body"></textarea>
                                  <script>
                            CKEDITOR.replace( 'body' );
        </script>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tags" " class="medium" placeholder="Enter Tags here..." />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" " class="medium" value="<?php echo Session::get('username')?>" />
                                <input type="hidden" name="userid" " class="medium" value="<?php echo Session::get('userId')?>" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>


        
        <?php include 'inc/footer.php';?> 