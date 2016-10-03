<?php
include'../lib/Session.php';

Session::checkSession();

?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php
   $db=new Database();

?>
<?php
        if(!isset($_GET['delpageid']) || $_GET['delpageid']==NULL){
          header("Location:index.php");
        }else{

         $pageid=$_GET['delpageid'];

         	}

         
         		$delquery="delete from tbl_page where id='$pageid'";
         		$deldata=$db->delete($delquery);
         		if($deldata){
         			echo "<script>alert('data Deleted successfully')</script>";
         		  header("Location:index.php");

         		}else{
				echo "<script>alert('Data Not Deleted ')</script>";
         		  header("Location:index.php");

    }

        
        ?>