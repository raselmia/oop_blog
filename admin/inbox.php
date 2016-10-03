<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

						     <?php
                if(isset($_GET['seenid'])){

                	$seenid=$_GET['seenid'];


                	 $query="update  tbl_contact
                SET
                   status='1'

             WHERE id='$seenid'";
          $catinsert=$db->update($query);

          if($catinsert){

             echo "<span class= 'success'>Message Move to the Seen Box</span>";

          }else{

            echo "<span class= 'error'>Something went wrong y</span>";

          }
    }

                	?>
                <div class="block">        
                    <table class="table-borderd data display datatable  id= 'example' ">
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="10%">Email</th>
							<th width="30%">Message</th>
							<th width="15%">Date</th>
							<th width="5%">Status</th>

							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
						 <?php
                                $query="select* from tbl_contact where status='0' order by id desc";
                                $contact=$db->select($query);
                                if($contact){
                                	$i=0;

                                    while($result=$contact->fetch_assoc()){
                                    	$i++;
                                    
                                  ?>

							<td><?php echo $i ?></td>
							<td><?php echo $result['firstname'].'  '.$result['lastname'];?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $fm->textshorten($result['body'],30)?></td>
							<td><?php echo $fm->formateDate($result['date'])?></td>
							<td><?php echo $result['status']?></td>
							
							<td><a href="viewmsg.php?msgid=<?php echo $result['id']?>">view</a> ||
							<a href="repmsg.php?msgid=<?php echo $result['id']?>">Reply To</a> 

							|| <a  onclick= "return confirm('Are you want to move message ')" href="?seenid=<?php echo $result['id']?>">Seen</a></td>
						</tr>
						<?php }}?>
						
						
					</tbody>
				</table>

						     <h2>Seen Message</h2>

 <?php

            if(isset($_GET['delid'])){


                $delid=$_GET['delid'];
                $delquery="DELETE from  tbl_contact where id='$delid'";
                $deldata=$db->Delete($delquery);
                if($deldata){

             echo "<span class= 'success'>Deleted successfully</span>";

          }else{

            echo "<span class= 'error'> Not Deleted </span>";

          }
    }
            ?>

				  <table class="table-borderd data display datatable   id= 'example' " >
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="10%">Email</th>
							<th width="30%">Message</th>
							<th width="15%">Date</th>
							<th width="5%">Status</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
						 <?php
                                $query="select* from tbl_contact where status='1' order by id desc";
                                $contact=$db->select($query);
                                if($contact){
                                	$i=0;

                                    while($result=$contact->fetch_assoc()){
                                    	$i++;
                                    
                                  ?>

							<td><?php echo $i?></td>
							<td><?php echo $result['firstname'].'  '.$result['lastname'];?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $fm->textshorten($result['body'],30)?></td>
							<td><?php echo $fm->formateDate($result['date'])?></td>
							
								<td><?php echo $result['status']?></td>
								<td><a href="viewmsg.php?msgid=<?php echo $result['id']?>">view</a> ||
						     <a onclick= "return confirm('Are you want to Delete')" href="?delid=<?php echo $result['id']?>">Delete</a> </td>
						</tr>
						<?php }}?>
						
						
					</tbody>
				</table>
               </div>
            </div>
         
        <script type="text/javascript">
       $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>

   </div>
    <?php include 'inc/footer.php';?>