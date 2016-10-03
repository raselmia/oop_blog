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
                    echo "<script> window.location='inbox.php';</script>";
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
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo $result['firstname'].'  '.$result['lastname']?>" class="medium" />
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email"  readonly  value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo $fm->formateDate($result['date'])?>" class="medium" />
                            </td>
                        </tr>
                         
                      
                        <tr>
                            <td>
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name='body' readonly >
                              <?php echo $result['body']?>
                                </textarea>


                                  <script>
                               CKEDITOR.replace( 'body' );
                                 </script>
                            </td>
                        </tr>


                       
                         
						                <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />

                             
                            </td>
                        </tr>
                    </table>
                    <?php }}?>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 