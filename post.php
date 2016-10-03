<?php include 'inc/header.php';?>

	<div class="contentsection contemplete clear">
	<?php 

	if( !isset($_GET['id']) || $_GET['id']==NULL  ){

      	header("Location: 404.php");

	}else{


		$id=$_GET['id'];
	}

	?>
		<div class="maincontent clear">
       <div class="about">

			<?php
            $query="select*from tbl_post where id= $id";
            $post=$db->select($query);
            if($post){
            	   while($result=$post->fetch_assoc()){
       
				?>
				<h2><?php echo $result['title'];?></h2>
				<h4><?php echo $fm->formateDate($result['date']);?> <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/>
				<p><?php echo $result['body'];?></p>
				

			 
				
				<div class="relatedpost clear">
			<h2>Related Articles</h2>

						<?php
						$catid=$result['cat'];
               $queryrelated="select*from tbl_post where cat= '$catid' order by id desc limit 6";
               $relatedpost=$db->select($queryrelated);
               if($relatedpost){
            	   while($rresult=$relatedpost->fetch_assoc()){
       
				?>
					<a href="post.php?id=<?php echo $rresult['id'];?>">
					<img src="admin/upload/<?php echo $rresult['image'];?>" alt="post image"/>
					</a>
				
					<?php } } else{  echo "No related post is available";}?>
				</div>
					  <?php } }else{header("location:404.php");}?>
	</div>

		</div>
<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>