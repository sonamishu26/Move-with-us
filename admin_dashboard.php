<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$admin_user_id = $_SESSION['admin_user_id'];
	if(!isset($admin_user_id)){
		header('location:login.php');
	}
?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/45.jpeg') no-repeat; background-size: cover;">

	<div class="container">
		<div class="col-md-3">
		    <?php include('sidebar/adminSidebar.php');?>
			
		</div>
		<div class="col-md-9">
			<div class="admin" style="display: flex;margin-top: 10px;">
				<?php
				$sql = "SELECT username 
						FROM tbl_users 
						WHERE user_role_id = '2'
						";
				if ($result = mysqli_query($conn, $sql)) {
			    	$instructorsCnt = mysqli_num_rows( $result );
			 	}
				?>
				<div class="instructors"><i class="fa fa-users"></i><span>Instructors (<?php echo $instructorsCnt?>)</span></div>
				<?php
				$sql = "SELECT username 
						FROM tbl_users 
						WHERE user_role_id = '3'
						";
				if ($result = mysqli_query($conn, $sql)) {
			    	$studentsCnt = mysqli_num_rows( $result );
			 	}
				?>
				<div class="students"><i class="fa fa-graduation-cap"></i><span>Students (<?php echo $studentsCnt?>)</span></div>
				<?php
				$sql = "SELECT student_name 
						FROM tbl_enrollment";
				if ($result = mysqli_query($conn, $sql)) {
			    	$enrollmentCnt = mysqli_num_rows( $result );
			 	}
				?>
				<div class="enrolled"><i class="fa fa-user-plus"></i><span>Enrolled Last Month (<?php echo $enrollmentCnt?>)</span></div>
				<?php
				$sql = "SELECT category_name FROM tbl_dance_categories";
				if ($result = mysqli_query($conn, $sql)) {
			    	$categoriesCnt = mysqli_num_rows( $result );
			 	}
				?>
				<div class="dance_forms"><i class="fa fa-film"></i><span>Dance Forms (<?php echo $categoriesCnt;?>)</span></div>
			</div>
			
		</div>
		
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php include('inc/footer.php');?>