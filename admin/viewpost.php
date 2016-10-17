<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php

        if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL){
          header("Location:postlist.php");
        }else{

         $postid=$_GET['viewpostid'];


        }
        ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>

       <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                  }
              
    ?>

            <div class="block"> 

          
         <?php 
         $query="select * from tbl_post where id='$postid' order by id desc";
         $getpost=$db->select($query);
         if($getpost){
         while($postresult=$getpost->fetch_assoc()){

         ?>              
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text"   readonly value="<?php echo $postresult['title']?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select    id="select" name="cat">
                                    <option  readonly >Select Category</option>
                                     <?php
                                $query="select* from tbl_catagory ";
                                $category=$db->select($query);
                                if($category){

                                    while($result=$category->fetch_assoc()){

                                ?>
                                    <option 
                                      <?php
                                      if ($postresult['cat']=$result['id']){?>
                                        Selected="Selected"
                                        <?php }?>

                                    value="<?php echo $result['id']?>"><?php echo $result['name'];?></option>
                                    <?php }}?>
                                    
                            </select>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            <img src="upload/<?php echo $postresult ['image']?>" height="100px" width="250px"/></br>
                              
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly name="body">
                                  
                                <?php echo $postresult['body'];?>" 
                                </textarea>
                                  <script>
                            CKEDITOR.replace( 'body' );
        </script>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" readonly  class="medium"value="<?php echo $postresult['tags'];?>"  />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" readonly class="medium" value="<?php echo $postresult['author']?>"  />

                                  <input type="hidden" readonly class="medium" value="<?php echo Session::get('userId')?>" />
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
                    <?php } }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?> 