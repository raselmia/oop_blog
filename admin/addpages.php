<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$fm->validate($_POST['name']);
                $body=$fm->validate($_POST['body']);
              
          $name=mysqli_real_escape_string($db->link, $name);
          $body=mysqli_real_escape_string($db->link, $body);

          if (empty($name) or empty($body)){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }

          else{
             
          $query="INSERT INTO tbl_page (name,body) VALUES('$name','$body')";
          $inserted_rows=$db->insert($query);

          if($inserted_rows){

             echo "<span class= 'success'>Page Inserted successfully</span>";

          }else{

            echo "<span class= 'error'> Page  not Inserted </span>";

          }



    }
}

    ?>

            <div class="block">               
                 <form action="addpages.php" method="POST"">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text"  name="name" placeholder="Enter Page Title..." class="medium" />
                            </td>
                        </tr>
                     
                         
                      
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body">
                              
                                </textarea>


                                  <script>
                            CKEDITOR.replace( 'body' );
        </script>
                            </td>
                        </tr>


                       
                         
						                <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create page" />

                             
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 