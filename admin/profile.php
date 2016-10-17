<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
      <?php 
        
        $userid=Session::get('userId');
        $userrole=Session::get('userRole');
      ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Profile</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['name'];
                $username=$_POST['username'];
                $email=$_POST['email'];
                $details=$_POST['details'];
            

          $name=mysqli_real_escape_string($db->link, $name);
          $username=mysqli_real_escape_string($db->link, $username);
          $email=mysqli_real_escape_string($db->link, $email);
          $details=mysqli_real_escape_string($db->link, $details);
         
        

        $query="update tbl_user
          SET
        name='$name',
        username='$username',
        email='$email',
        details='$details'
         WHERE id='$userid'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>User Data updated  successfully</span>";

          }else{

            echo "<span class= 'error'>Not updated</span>";

          }


    }


    ?>
            <div class="block"> 

          
         <?php 
         $query="select * from tbl_user where id='$userid' AND role='$userrole'";
         $getrole=$db->select($query);
         if($getrole){
         while($result=$getrole->fetch_assoc()){

         ?>              
                 <form action="" method="POST" enctype="multipart/form-data">
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
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text"  name="username" value="<?php echo $result['username']?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text"  name="email" value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>
                      
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>details</label>
                            </td>
                            <td>
                                <textarea name="details">
                                  
                                <?php echo $result['details'];?>
                                </textarea>
                                  <script>
                            CKEDITOR.replace( 'details' );
        </script>
                            </td>
                        </tr>


                      
                          
						                <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Updated" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 