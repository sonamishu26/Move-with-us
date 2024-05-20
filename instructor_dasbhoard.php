<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$instructor_user_id = $_SESSION['instructor_user_id'];
	if(!isset($instructor_user_id)){
		header('location:login.php');
	}

	if(isset($_POST['dance_name'])){
		$instructor_role_id = $_SESSION['instructor_role_id'];
		$instructor_user_id = $_SESSION['instructor_user_id'];
		$dance_name = $_POST['dance_name'];
		$sql = "SELECT dance_id 
		FROM tbl_dance_forms 
		WHERE dance_name LIKE '%$dance_name'";
		$result = mysqli_query($conn, $sql);
		$dance_id = '';
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$dance_id = $row['dance_id'];
			}
		}



	$sql = "INSERT INTO tbl_instructor_dance_forms (instructor_role_id, dance_id, dance_name, user_id) VALUES('$instructor_user_id', $dance_id, '$dance_name', '$instructor_user_id')";
		if(mysqli_query($conn, $sql)){
			header('location:instructor_dasbhoard.php');
		}
	}
?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/47.jpeg') no-repeat; background-size: cover;">

	<div class="container">
		<div class="col-md-3">
		    <?php include('sidebar/instructorSidebar.php');?>
		</div>
		<div class="col-md-9">
		<h3>DASHBOARD</h3>
			<div class="jumbotron" style="margin-top: 10px;background-color: #f9f9f9;
    border: 1px solid #ccc;border-radius: unset;padding-right: 30px;padding-left: 30px;">
   				
    			<div class="row">
    			<div class="col-md-4">
	    				<?php
	    				$user_id = $_SESSION['instructor_user_id'];
						$sql = "SELECT * 
						FROM tbl_instructors 
						WHERE user_id = $user_id";
						$data = mysqli_query($conn, $sql);
						if(mysqli_num_rows($data) > 0){
							while($row = mysqli_fetch_assoc($data)){ ?>
								<p style="text-align: center;"><img src=<?php echo $row['instructor_image']?> 
						style="width: 50%;border-radius: 50%;border: 1px solid #FFF;"></p>
						<h2 style="text-align: center;text-transform: uppercase;font-size: 20px;"><?php echo $_SESSION['username'];?></h2>
						
						
							<?php }	
						}
						else{ ?>
						<p style="text-align: center;"><img src="assets/img/avatar.jpg" 
						style="width: 50%;border-radius: 50%;border: 1px solid #FFF;"></p>
						<h2 style="text-align: center;"><?php echo $_SESSION['username'];?></h2>	

						<?php }
						?>
	    			</div>
	    			<div class="col-md-4">
	    				<ul class="list-group">
	    					<?php
	    					$user_id = $_SESSION['instructor_user_id'];
							$sql = "SELECT age, gender, experience, address 
							FROM tbl_instructors 
							WHERE user_id = $user_id";
							$data = mysqli_query($conn, $sql);
							if(mysqli_num_rows($data) > 0){
								while($row = mysqli_fetch_assoc($data)){ ?>
							  	<li class="list-group-item d-flex justify-content-between align-items-center">
							    Age
							    <span class="badge bg-primary rounded-pill"><?php echo $row['age'];?></span>
							  	</li>
							  	<li class="list-group-item d-flex justify-content-between align-items-center">
							    Experience
							    <span class="badge bg-primary rounded-pill"><?php echo $row['experience'];?> Years</span>
							  	</li>
							  	<li class="list-group-item d-flex justify-content-between align-items-center">
							    Gender
							    <span class="badge bg-primary rounded-pill"><?php echo $row['gender'];?></span>
							  	</li>
							  	<li class="list-group-item d-flex justify-content-between align-items-center">
							    Date of Join
							    <?php $doj = date('d/m/Y');?>
							    <span class="badge bg-primary rounded-pill"><?php echo $doj;?></span>
							  	</li>
							  	<li class="list-group-item d-flex justify-content-between align-items-center">
							    Address
							    <span class="badge bg-primary rounded-pill"><?php echo $row['address'];?></span>
							  	</li>
						
						  	<?php } ?>
						<?php } ?>
						</ul>
	    			</div>
	    			
	    			<div class="col-md-4">
	    				<ul class="list-group skills">
	    					<form action="instructor_dasbhoard.php" method="post">
		    					<li class="list-group-item d-flex justify-content-between align-items-center" style="display: flex;">

		    					<select name="dance_name" class="form-control" style="width: 90%;margin-right: 10px;">
		    						<option>Select</option>
		    						<?php
								    $sql = "SELECT * FROM tbl_dance_forms";
								    $result = mysqli_query($conn, $sql);
								    if(mysqli_num_rows($result)>0){
								    	while($row = mysqli_fetch_assoc($result)){ ?>
								    		<option value="<?php echo $row['dance_name'];?>"><?php echo $row['dance_name'];?></option>
								    	<?php }
								    }
								    ?>
		    					</select>
								<input type="submit" value="ADD">
							  	</li>
							  	
							    <?php
							    $user_id = $_SESSION['instructor_user_id'];
							    $sql = "SELECT * 
							    FROM tbl_instructor_dance_forms 
							    WHERE user_id = $user_id ORDER BY id DESC";
							    $result = mysqli_query($conn, $sql);
							    if(mysqli_num_rows($result)>0){
							    	while($row = mysqli_fetch_assoc($result)){ ?>
							    		<li class="list-group-item d-flex justify-content-between align-items-center">
							    		<?php echo $row['dance_name'];?>
							    		</li>
							    	<?php }
							    }
							    ?>
							  	
							</form>
						</ul>
	    			</div>


	    		</div>

			</div>
		</div>
	</div><br><br><br><br><br><br><br><br><br>
<?php include('inc/footer.php');?>
</div>

<script type="text/javascript">
	/*$("#addSkill").click(function () {
        $("#skill").toggle();
    });*/
</script>