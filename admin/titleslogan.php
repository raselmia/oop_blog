<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
   .leftside{ 
    float: left; 
    width:70%;


   }
   .rightside {

    float: right; 
    width:20%;
   }
   .rightside img {

    height: 100px;
    width: 100px;
   }


</style>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>


                <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){

                $title=$fm->validate($_POST['title']);
                $slogan=$fm->validate($_POST['slogan']);
                
              

          $title=mysqli_real_escape_string($db->link, $title);
          $slogan=mysqli_real_escape_string($db->link, $slogan);
         

          //$permited  = array('jpg', 'jpeg', 'png', 'gif');
           $file_name = $_FILES['logo']['name'];
           $file_size = $_FILES['logo']['size'];
            $file_temp = $_FILES['logo']['tmp_name'];
              $folder = "upload/";
     
          if($title==" "|| $slogan==" "){

            echo "<span class= 'error'>Field Must not be Empty !..</span>";
          }

          elseif(!empty($file_name)){
              move_uploaded_file($file_temp, $folder.$file_name);
           $query="update  title_slogan
          SET
        
        title='$title',
        slogan='$slogan',
        logo='$file_name' 
         WHERE id='1'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Post Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>Post Not updated</span>";

          }


    }else{

        $query="update  title_slogan
          SET
       
        title='$title',
        slogan='$slogan'
         
         WHERE id='1'";
          $upadated_row=$db->update($query);

          if($upadated_row){

             echo "<span class= 'success'>Post Upadted successfully</span>";

          }else{

            echo "<span class= 'error'>Post Not updated</span>";

          }


    }
}

    ?>


                 <?php 
                $query="select * from title_slogan where id='1'";
                $blog_slogan=$db->select($query);
                if($blog_slogan){
                    while ($result=$blog_slogan->fetch_assoc()) {
                

                ?>
                <div class="block sloginblock"> 

               
                <div class="leftside">              
            <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title']?>" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan']?>" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
						  <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>

                                <input type="file" name="logo" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                     </div>
              
                    <div class="rightside">
                        
                    <img src="upload/<?php echo $result['logo']?>" alt="logo">
             
                   
                    </div>
                </div>
                       <?php } }?>
            </div>
        </div>
     <?php include 'inc/footer.php';?>
