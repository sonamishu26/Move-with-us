<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$admin_user_id = $_SESSION['admin_user_id'];
	if(!isset($admin_user_id)){
		header('location:login.php');
	}
?>
<?php include('inc/header.php');?>
	<div class="container">
		<div class="col-md-3">
		    <?php include('sidebar/adminSidebar.php');?>
			
		</div>
		<div class="col-md-9">
			
		</div>
		
	</div>
	<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php include('inc/footer.php');?>