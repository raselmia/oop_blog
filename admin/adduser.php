
       <?php include 'inc/header.php';?>
       <?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
<?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $username=$fm->validate($_POST['username']);
                $password=$fm->validate(md5($_POST['password']));
                $role=$fm->validate($_POST['role']);
              
                $username=mysqli_real_escape_string($db->link,$username);
                $password=mysqli_real_escape_string($db->link,$password);
                $role=mysqli_real_escape_string($db->link,$role);
          if(empty($username) or empty($password) or empty($role)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }else{

          $query="insert into  tbl_user (username,password,role) values('$username','$password','$role')";
          $userinsert=$db->insert($query);

          if($userinsert){

             echo "<span class= 'success'>User Created successfully</span>";

          }else{

            echo "<span class= 'error'User not created</span>";

          }
    }
}
         ?>
                 <form  action="" method="post">
                    <table class="form">					
                        <tr>
                   
                            <td>
                                 <label> User Name:</label>
                                <input type="text" name="username" placeholder="Enter User  Name..." class="medium" />
                            </td>
                        </tr>


                         <tr>
                          
                            <td>
                             <label> Password:</label>
                                <input type="password" name="password" placeholder="Enter password.." class="medium" />
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