<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
   <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                 $note=$fm->validate($_POST['note']);
          
              $note=mysqli_real_escape_string($db->link,$note);

           if (empty($note)) {
         echo "<span class= 'error'>Field must not empty</span>";
             }
          else{

           $query="update  tbl_footer
            SET
       
            note='$note'
        
         WHERE id='1'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Footer successfully updated</span>";

          }else{

            echo "<span class= 'error'>Post Not updated</span>";

          }
      }
}         
?>
            <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <?php 
                $query="select * from tbl_footer where id='1'";
                $footer=$db->select($query);
                if($footer){
                    while ($result=$footer->fetch_assoc()) {
   
                ?>

                 <form action="copyright.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="note"  require="required" value="<?php echo $result['note']?>"   class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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