<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$student_user_id = $_SESSION['student_user_id'];
	if(!isset($student_user_id)){
		header('location:login.php');
	}
	if(isset($_POST['submitFeedback'])){
		
		$user_id = $_SESSION['student_user_id'];
		$role_id = $_SESSION['student_role_id'];
		$feedback = $_POST['feedback'];
		$feedback = "INSERT INTO tbl_feedback(feedback, user_id, user_role_id) VALUES('$feedback', '$user_id', '$role_id')";
      	if(mysqli_query($conn, $feedback)){
      		header('location:feedback.php');
      		$message[] = 'Feedback submitted successfully.';
      	}
      	else{
      		header('location:feedback.php');
      		$message[] = 'Failed to submit feedback!';
      	}       
	}
?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/46.jpeg') no-repeat; background-size: cover;">

	<div class="container">
	<?php
    if(isset($message)){
       foreach($message as $msg){
          echo '
          <div class="message">
             <span>'.$msg.'</span>
             <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>
          ';
       }
    }
    ?>
		<div class="col-md-3">
		    <?php include('sidebar/studentSidebar.php');?>
		</div>
		<div class="col-md-9">
		<h3>FEEDBACK</h3>
			<form method="post" action="feedback.php">
				<div class="box">
					<div class="row" style="padding: 0px 30px;margin-bottom: 10px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <label>Enter Feedback</label>
		                        <textarea class="form-control" name="feedback" rows="5" cols="40" placeholder="Feedback"></textarea>
		                    </div>
						</div>
					</div>
					
					<div class="row" style="padding: 0px 30px;">
						<div class="col-md-5">
							<div class="form-group">
		                        <input type="submit" name="submitFeedback" value="Submit" class="btn btn-success">
		                    </div>
						</div>
						
					</div>
				</div>
			</form>	
		</div>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('inc/footer.php');?>
</div>