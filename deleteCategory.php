<?php 
/*To update category*/
	include('config/db.php');
	session_start();
	$category_id = $_POST['id'];
	$getUrl = "SELECT category_image FROM tbl_dance_categories WHERE category_id = '$category_id'";
	$result = mysqli_query($conn, $getUrl);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$img = $row['category_image'];
		}
		$sql = "DELETE FROM tbl_dance_categories WHERE category_id = '$category_id'";
		unlink($img);
		if(mysqli_query($conn, $sql)){
	        echo 'Category deleted successfully.';
	    }
	}
	
?>