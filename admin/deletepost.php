<?php
include'../lib/Session.php';

Session::checkSession();

?>
<?php include '../config/config.php';?>
<?php include '../helpers/Format.php';?>
<?php include '../lib/Database.php';?>
<?php
   $db=new Database();

?>
<?php
        if(!isset($_GET['delpostid']) || $_GET['delpostid']==NULL){
          header("Location:postlist.php");
        }else{

         $postid=$_GET['delpostid'];

         $query="select * from tbl_post where id='$postid'";
         $getData=$db->select($query);
         if($getData){
         	while($delimg=$getData->fetch_assoc()){
         			@unlink('upload/'.$delimg['image']);

         	}

         }
         		$delquery="delete from tbl_post where id='$postid'";
         		$deldata=$db->delete($delquery);
         		if($deldata){
         			echo "<script>alert('data Deleted successfully')</script>";
         		  header("Location:postlist.php");

         		}else{
				echo "<script>alert('Data Not Deleted ')</script>";
         		  header("Location:postlist.php");

         		}

        }
        ?>