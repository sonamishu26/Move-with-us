<?php 
/*To update category*/
	include('config/db.php');
	session_start();
	$enroll_id = $_POST['id'];
	$payment_status = $_POST['payment_status'];
    $sql = "UPDATE tbl_enrollment SET payment_status = '$payment_status' WHERE id = $enroll_id";
    if(mysqli_query($conn, $sql)){
        echo 'Status updated successfully.';
    }
    else{
        echo 'Failed to update status!';
    }
?>