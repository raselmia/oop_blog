<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

        if(!isset($_GET['pageid']) || $_GET['pageid']==NULL){


          header("Location:index.php");
        }else{

         $id=$_GET['pageid'];


        }
        ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Edit Page</h2>

            <div class="block">  
           <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$fm->validate($_POST['name']);
                $body=$fm->validate($_POST['body']);

          $name=mysqli_real_escape_string($db->link,$name);
          $body=mysqli_real_escape_string($db->link,$body);
          if(empty($name) or empty($body)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }else{

          $query="update tbl_catagory
          SET
        name='$name'

         WHERE id='$id'";
          $pageupdate=$db->update($query);

          if($pageupdate){

             echo "<span class= 'success'>page Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>page  Not updated </span>";

          }
    }
}
       
         ?>
                 <form action="" method="POST"">
                
          <?php 
         $query="select * from tbl_page where id='$id'";
         $category=$db->select($query);
           while($result=$category->fetch_assoc()){

         ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text"  name="name" value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
                     
                         
                      
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body">
                                  
                                   <?php echo $fm->validate($result['body']);?>
                                </textarea>

                                
                                  <script>
                            CKEDITOR.replace( 'body' );
                 </script>
                            </td>
                        </tr>


                       
                         
						                <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                   <span class="actiondel"><a onclick="return confirm('Are sure you want to Delete this page')" href="deletepage.php?delpageid=<?php echo $result['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 