<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
<?php
         if($_SERVER['REQUEST_METHOD']=='POST'){

                $fb=$fm->validate($_POST['fb']);
                $tw=$fm->validate($_POST['tw']);
                $ln=$fm->validate($_POST['ln']);
                $gp=$fm->validate($_POST['gp']);
                
          $fb=mysqli_real_escape_string($db->link, $fb);
          $tw=mysqli_real_escape_string($db->link, $tw);
          $ln=mysqli_real_escape_string($db->link, $ln);
          $gp=mysqli_real_escape_string($db->link, $gp);
           if (empty($fb) or empty($tw) or empty($ln) or empty($gp)) {
              echo "<span class= 'error'> Field must not empty</span>";
        
    } 
      else{

         $query="update  tbl_social
          SET
       
        fb='$fb',
        tw='$tw',
        ln='$ln',
        gp='$gp'
        
         WHERE id='1'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Social media successfully</span>";

          }else{

            echo "<span class= 'error'> Social media Not updated</span>";

          }
      }
  }
         
?>
                <div class="block">

                 <?php 
                $query="select * from tbl_social where id='1'";
                $socialmedia=$db->select($query);
                if($socialmedia){
                    while ($result=$socialmedia->fetch_assoc()) {
                

                ?>

                 <form action="social.php" method="post">


                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb']?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw"value="<?php echo $result['tw']?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln']?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $result['gp']?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
     <?php include 'inc/footer.php';?>
