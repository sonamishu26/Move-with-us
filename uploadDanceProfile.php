<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$instructor_user_id = $_SESSION['instructor_user_id'];
	if(!isset($instructor_user_id)){
		header('location:login.php');
	}
	if(isset($_POST['submitProfile'])){
		$instructor_name = $_SESSION['username'];
		$user_id = $_SESSION['instructor_user_id'];
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$experience = mysqli_real_escape_string($conn, $_POST['experience']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$instructor_role_id = $_SESSION['instructor_role_id'];
	   	$image = $_FILES['instructor_image']['name'];
	   	$image_size = $_FILES['instructor_image']['size'];
	   	$tmp_name = $_FILES['instructor_image']['tmp_name'];
	   	$img_path = 'uploads/instructors/'.$image;
	   	$doj = date('Y/m/d');

	   	/*$data = array(
	    	'instructor_name' => $instructor_name,
	    	'user_id' => $user_id,
	    	'age' => $age,
	    	'gender' => $gender,
	    	'experience' => $experience,
	    	'address' => $address,
	    	'instructor_role_id' => $instructor_role_id, 
	    	'img_path' => $img_path, 
	    );
	    echo '<pre>';
	    print_r($data);
	    echo '</pre>';*/

	   	if(!empty($image)){
	      if($image_size > 8000000){
	         $message[] = 'image file size is too large';
	      }else{
	        echo $instructorProfile = "INSERT INTO tbl_instructors(user_id, instructor_name, age, gender, user_role_id, experience, address, instructor_image, doj) VALUES('$user_id', '$instructor_name', '$age', '$gender', '$instructor_role_id', '$experience', '$address', '$img_path', '$doj')";
	          mysqli_query($conn, $instructorProfile);
	          move_uploaded_file($tmp_name, $img_path);
	          header('location:instructor_dasbhoard.php');
	        }
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
			<form method="post" action="uploadDanceProfile.php" enctype="multipart/form-data">
				<div class="box">
					<div class="row" style="padding: 0px 30px;margin-bottom: 10px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Age</label>
		                        <input type="text" name="age" class="form-control" required="" placeholder="Age">
		                    </div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Gender</label>
		                        <select name="gender" class="form-control">
		                        	<option>Select</option>
		                        	<option value="Male">Male</option>
		                        	<option value="Female">Female</option>
		                        </select>
		                    </div>
						</div>
					</div>
					<div class="row" style="padding: 0px 30px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Experience</label>
		                        <input type="text" name="experience" class="form-control" required="" placeholder="Experience">
		                    </div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Address</label>
		                        <textarea class="form-control" name="address" placeholder="Address"></textarea>
		                    </div>
						</div>
					</div>
					<div class="row" style="padding: 0px 30px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Date of Joining</label>
		                        <input type="text" name="doj" id="datepicker" class="form-control" required="" placeholder="Date of Join">
		                    </div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Upload Image</label>
		                        <input type="file" name="instructor_image" class="form-control">
		                    </div>
						</div>
					</div>
					<div class="row" style="padding: 0px 30px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <input type="submit" name="submitProfile" value="Upload Profile" class="btn btn-success">
		                    </div>
						</div>
						
					</div>
				</div>
			</form>	
		</div>

	</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
<?php include('inc/footer.php');?>
</div>
