﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

            <?php

            if(isset($_GET['delcat'])){


                $delid=$_GET['delcat'];
                $delquery="DELETE from  tbl_catagory where id='$delid'";
                $deldata=$db->Delete($delquery);
                if($deldata){

             echo "<span class= 'success'>Category Deleted successfully</span>";

          }else{

            echo "<span class= 'error'>Category  Not Deleted </span>";

          }
    }
            ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


                    <?php 
                        $query="select * from  tbl_catagory order by id desc";
                        $Category=$db->select($query);
                        if($Category){
                            $i=0;
                            while($result=$Category->fetch_assoc()){

                                    $i++;
            
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']?></td>
							<td><?php echo $result['name']?></td>
							<td><a href="editcat.php ?catid=<?php echo $result['id'];?>">
                            Edit</a> ||<a  onclick= "return confirm('Are you want to Delete')" href="?delcat=<?php echo $result['id'];?>">Delete</td>
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
