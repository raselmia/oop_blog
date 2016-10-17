<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
			
            <?php

            if(isset($_GET['delpostid'])){


                $delid=$_GET['delpostid'];
                $delquery="DELETE from  tbl_post where id='$delid'";
                $deldata=$db->DElete($delquery);
                if($delquery){

             echo "<span class= 'success'>Category Deleted successfully</span>";

          }else{

            echo "<span class= 'error'>Category  Not Deleted </span>";

          }
    }
            ?>



                <div class="block">  
                    <table class=" table-borderd data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="10%">Post Title</th>
							<th width="15%">Category</th>
							<th width="20%">Description</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>

					<?php 
					$query="SELECT tbl_post.*,tbl_catagory.name FROM tbl_post INNER JOIN tbl_catagory ON tbl_post.cat=tbl_catagory.id ORDER By tbl_post.title DESC ";
					$post=$db->SELECT($query);
					if($post){

						$i=0;
							while($result=$post->fetch_assoc()){

									$i++;

					?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title']?></a></td>
						     <td><?php echo $result['name']?></td>
							  <td><?php echo $fm->textshorten($result['body'],100)?></td>
							 <td><img src="upload/<?php echo $result ['image']?>"height="50px" width="50px"/></td>
						     <td><?php echo $result['author']?></td>
						     <td><?php echo $result['tags']?></td>
						     <td><?php echo $fm->formateDate($result['date'])?></td>
				
							<td>
								<a href="viewpost.php?viewpostid=<?php echo $result['id']?>">View</a> 

							<?php
								if(Session::get('userId')== $result['userid'] || Session::get('userRole')=='0')
									{?>

						
							||<a href="editpost.php?editpostid=<?php echo $result['id']?>">Edit</a> || 
	
                              <a onclick= "return confirm('Are you want to Delete')" href="deletepost.php?delpostid=<?php echo $result['id']?>">Delete</a> 

                              	<?php }?>
                              	</td>
						</tr>
						<?php } }?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

        <script type="text/javascript">
       $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>
             
<?php include 'inc/footer.php';?>
