<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$instructor_user_id = $_SESSION['instructor_user_id'];
	if(!isset($instructor_user_id)){
		header('location:login.php');
	}
?>
<?php include('inc/header.php');?>
	<div class="container">
		<div class="col-md-3">
		    <?php include('sidebar/instructorSidebar.php');?>
		</div>
		<div class="col-md-9">
			
		</div>
		
	</div>
<?php include('inc/footer.php');?>