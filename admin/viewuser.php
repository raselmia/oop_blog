<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
     <?php

        if(!isset($_GET['userid']) || $_GET['userid']==NULL){


          header("Location:userlist.php");
        }else{

         $id=$_GET['userid'];


        }
        ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View User Details</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
             
                    header("Location:userlist.php");
                  }
          ?>

               <div class="block"> 
         <?php 
         $query="select * from tbl_user where id='$id'";
         $getrole=$db->select($query);
         if($getrole){
         while($result=$getrole->fetch_assoc()){

         ?>              
                 <form action="" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
                     
                      <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php echo $result['username']?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                      
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>details</label>
                            </td>
                            <td>
                                <textarea readonly  name="details">
                                  
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
                                <input type="submit" name="submit" Value="ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 