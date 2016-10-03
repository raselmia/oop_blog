<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


 <?php

        if(!isset($_GET['editpostid']) || $_GET['editpostid']==NULL){
          header("Location:postlist.php");
        }else{

         $postid=$_GET['editpostid'];


        }
        ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $cat=$_POST['cat'];
                $title=$_POST['title'];
                $body=$_POST['body'];
                $author=$_POST['author'];
                $tags=$_POST['tags'];

          $cat=mysqli_real_escape_string($db->link, $cat);
          $title=mysqli_real_escape_string($db->link, $title);
          $body=mysqli_real_escape_string($db->link, $body);
          $author=mysqli_real_escape_string($db->link, $author);
          $tags=mysqli_real_escape_string($db->link, $tags);

          //$permited  = array('jpg', 'jpeg', 'png', 'gif');
           $file_name = $_FILES['image']['name'];
           $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
              $folder = "upload/";
     
          if($cat==" "|| $title==" " || $body==" "||$author==" "|| $tags==" "){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }

          elseif(!empty($file_name)){
              move_uploaded_file($file_temp, $folder.$file_name);
           $query="update tbl_post
          SET
        cat='$cat',
        title='$title',
        body='$body',
        author='$author',
        tags='$tags',
        image='$file_name' 
         WHERE id='$postid'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Post Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>Post Not updated</span>";

          }


    }else{

        $query="update tbl_post
          SET
        cat='$cat',
        title='$title',
        body='$body',
        author='$author',
        tags='$tags' 
         WHERE id='$postid'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Post Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>Post Not updated</span>";

          }


    }
}

    ?>

            <div class="block"> 

          
         <?php 
         $query="select * from tbl_post where id='$postid' order by id desc";
         $getpost=$db->select($query);
         if($getpost){
         while($postresult=$getpost->fetch_assoc()){

         ?>              
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text"  name="title" value="<?php echo $postresult['title']?>" class="medium" />
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
                                    <option 
                                      <?php
                                      if ($postresult['cat']=$result['id']){?>
                                        Selected="Selected"
                                        <?php }?>

                                    value="<?php echo $result['id']?>"><?php echo $result['name'];?></option>
                                    <?php }}?>
                                    
                            </select>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            <img src="upload/<?php echo $postresult ['image']?>"height="50px" width="200px"/></br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body">
                                  
                                <?php echo $postresult['body'];?>" 
                                </textarea>
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
                                <input type="text" name="tags" " class="medium"value="<?php echo $postresult['tags'];?>"  />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" " class="medium" value="<?php echo $postresult['author']?>"  />
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
                    <?php } }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 