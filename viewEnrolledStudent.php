<?php
	include('config/db.php');
	session_start();
	$enrollment_id = $_POST['id'];
	$sql = "SELECT tbl_enrollment.id, tbl_enrollment.student_name, tbl_dance_categories.category_name,tbl_dance_forms.dance_name, tbl_enrollment.price, tbl_enrollment.shift, tbl_enrollment.payment_method, tbl_enrollment.payment_status, tbl_students.student_image, tbl_users.mobile
FROM tbl_enrollment
JOIN tbl_dance_categories ON tbl_dance_categories.category_id = tbl_enrollment.category_id
JOIN tbl_dance_forms ON tbl_dance_forms.dance_id = tbl_enrollment.dance_id
JOIN tbl_students ON tbl_students.user_id = tbl_enrollment.user_id
JOIN tbl_users ON tbl_users.user_id = tbl_enrollment.user_id 
WHERE tbl_enrollment.id = $enrollment_id";
	$getEnrolled = mysqli_query($conn, $sql);
     if(mysqli_num_rows($getEnrolled) > 0){
        while($row = mysqli_fetch_assoc($getEnrolled)){
        	$data = array(
        		'id' => $row['id'],
        		'student_name' => $row['student_name'],
        		'category_name' => $row['category_name'],
        		'dance_name' => $row['dance_name'],
        		'price' => $row['price'],
        		'shift' => $row['shift'],
        		'payment_method' => $row['payment_method'],
        		'payment_status' => $row['payment_status'],
        		'student_image' => $row['student_image'],
        		'mobile' => $row['mobile'],
        	);
        }
        echo json_encode($data);
    }
?>