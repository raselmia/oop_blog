
       <?php include 'inc/header.php';?>
      <?php include 'inc/sidebar.php';?>
        <div class="grid_10">

        <?php

        if(!isset($_GET['catid']) || $_GET['catid']==NULL){


          header("Location:catlist.php");
        }else{

         $id=$_GET['catid'];


        }
        ?>
		
            <div class="box round first grid">
                <h2>Update  Category</h2>
               <div class="block copyblock"> 
<?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['name'];

          $name=mysqli_real_escape_string($db->link,$name);
          if(empty($name)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }else{

          $query="update tbl_catagory
          SET
        name='$name'

         WHERE id='$id'";
          $catinsert=$db->update($query);

          if($catinsert){

             echo "<span class= 'success'>Category Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>Category  Not updated successfully</span>";

          }
    }
}
       
         ?>
         <?php 
         $query="select * from tbl_catagory where id='$id'";
         $category=$db->select($query);
         while($result=$category->fetch_assoc()){

         ?>


                 <form  action=" " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>