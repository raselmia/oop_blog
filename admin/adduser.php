
       <?php include 'inc/header.php';?>
       <?php include 'inc/sidebar.php';?>

       <?php if(!Session::get('userRole')==0){

        echo "<script>window.location='index.php';</script>";

       }


       ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
<?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$fm->validate($_POST['name']);
                $username=$fm->validate($_POST['username']);
                $email=$fm->validate($_POST['email']);
                $details=$fm->validate($_POST['details']);
                
                $password=$fm->validate(md5($_POST['password']));
                $role=$fm->validate($_POST['role']);
              
                $username=mysqli_real_escape_string($db->link,$username);
                $name=mysqli_real_escape_string($db->link,$name);
                $email=mysqli_real_escape_string($db->link,$email);
                $details=mysqli_real_escape_string($db->link,$details);
                $password=mysqli_real_escape_string($db->link,$password);
                $role=mysqli_real_escape_string($db->link,$role);
          if(empty($username) or empty($email) or empty($password) or empty($role) or empty($role) or empty($details)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }else{
                $mailquery="SELECT * FROM tbl_user where email='$email' limit 1 ";
          
            $mailcheak=$db->select($mailquery);

                if ($mailcheak !=false) {
                    echo "<span class= 'error'>Mail Already Exists!~!</span>";
                }

          else{

          $query="insert into  tbl_user (username,password,role,email,name,details) values('$username','$password','$role','$email','$name','$details')";
          $userinsert=$db->insert($query);

          if($userinsert){

             echo "<span class= 'success'>User Created successfully</span>";

          }else{

            echo "<span class= 'error'>User not created</span>";

          }
    }
}
}
         ?>
                 <form  action="" method="post">
                    <table class="form">
                     <tr>
                   
                            <td>
                                 <label>  Name:</label>
                                <input type="text" name="name" placeholder="Enter  Name..." class="medium" />
                            </td>
                        </tr>					
                        <tr>
                   
                            <td>
                                 <label> User Name:</label>
                                <input type="text" name="username" placeholder="Enter User  Name..." class="medium" />
                            </td>
                        </tr>

                           <tr>
                   
                            <td>
                                 <label> Email:</label>
                                <input type="email" name="email" placeholder="Enter User  email..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                          
                            <td>
                             <label> Password:</label>
                                <input type="password" name="password" placeholder="Enter password.." class="medium" />
                            </td>
                        </tr>
                            
                             
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>details</label>
                           
                                <textarea name="details">
                                  
                                <?php echo $result['details'];?>
                                </textarea>
                                  <script>
                                CKEDITOR.replace( 'details' );
                             </script>
                            </td>
                        </tr>

                         <tr>
                          
                            <td>
                             <label> User Role:</label>
                                <select id="select" name="role">
                                <option>Select User Role</option>
                                <option value='0'>Admin</option>
                                <option value='1'>Author</option>
                                <option value='2'>Editor</option>
                             
                  
                                </select>
                            </td>
                        </tr>
                  
						                <tr> 
                           
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