<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

         <?php

        if(!isset($_GET['msgid']) || $_GET['msgid']==NULL){


          header("Location:catlist.php");
        }else{

         $id=$_GET['msgid'];


        }
        ?>
		
            <div class="box round first grid">
                <h2>View Message </h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                   $toEmail=$fm->validate($_POST['toEmail']);
                   $fromEmail=$fm->validate($_POST['fromEmail']);
                   $subject=$fm->validate($_POST['subject']);
                   $body=$fm->validate($_POST['body']);

                   $sendmail=mail( $toEmail, $fromEmail, $subject, $body);
                   if($sendmail){

                     echo "<span class= 'success'>Message Sent  successfully</span>";
                   }else{

                     echo "<span class= 'error'>Message sending Failed</span>";
                   }
               }
           
    ?>


            <div class="block">               
                 <form action="" method="POST"">

                  <?php
                                $query="select* from tbl_contact where id='$id'";
                                $contact=$db->select($query);
                                if($contact){

                                    while($result=$contact->fetch_assoc()){
                          
                                    
                                  ?>

                    <table class="form">


                       
          
                       <tr>
                            <td>
                                <label>TO</label>
                            </td>
                            <td>
                                <input type="email" name='toEmail' readonly  value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromEmail" placeholder="please enter your Email" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please enter your Subject" class="medium"  />
                            </td>
                        </tr>
                      
                        <tr>
                            <td>
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name='body'  >
                       
                                </textarea>


                                  <script>
                               CKEDITOR.replace( 'body' );
                                 </script>
                            </td>
                        </tr>


                       
                         
						                <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />

                             
                            </td>
                        </tr>
                    </table>
                    <?php }}?>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 