 <?php

include('config/db.php');
session_start();
if(isset($_POST['submit'])){

   	$email = mysqli_real_escape_string($conn, $_POST['email']);
   	$password = mysqli_real_escape_string($conn, sha1($_POST['password']));
   	$query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
   	$getUser = mysqli_query($conn, $query);

   	if(mysqli_num_rows($getUser) > 0){

      	$row = mysqli_fetch_assoc($getUser);
      	if($row['user_role_id'] == '1'){

         	$_SESSION['username'] = $row['username'];
         	$_SESSION['email'] = $row['email'];
         	$_SESSION['admin_user_id'] = $row['user_id'];
          $_SESSION['admin_role_id'] = $row['user_role_id'];
         	header('Location:admin_dashboard.php');

      	}else if($row['user_role_id'] == '2'){
         	$_SESSION['username'] = $row['username'];
         	$_SESSION['email'] = $row['email'];
         	$_SESSION['instructor_user_id'] = $row['user_id'];
          $_SESSION['instructor_role_id'] = $row['user_role_id'];
         	header('Location:instructor_dasbhoard.php');
     	  }
        else if($row['user_role_id'] == '3'){
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['student_user_id'] = $row['user_id'];
          $_SESSION['student_role_id'] = $row['user_role_id'];
          header('Location:student_dashboard.php');
        }
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>
<?php include('inc/header.php');?>
<div class="container" style="background-image: url('assets/img/background.jpg') ; width:auto;  height: fit;">
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
    ?><br><br><br><br>
		<div class="row justify-content-between">
        	<div class="col-md-4 col-md-offset-4">
           
            	<div class="panel panel-default">
                <div class="panel-heading"><strong>USER LOGIN</strong></div>
                <div class="panel-body">

                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required="" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="" placeholder="Password">
                            <div style="text-align:right; font-size:12px;"><a href="pending.php" >Forgot Password!</a></div>
                        </div>
                    <br>
                        <input type="submit" name="submit" value="Login now" class="btn success-btn" style="width: 100%;">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('inc/footer.php');?>

</div>
