<?php
require_once('app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password PHP</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<div class="login-form">
		<h2>Forgot Password</h2>
		<?php 
		if(isset($error) && !empty($error)): 
		?>
			<div class="message-error"><?= $error ?></div>
		<?php 
		endif 
		?>
		<form action="" method="POST">
			<div class="input-field">
				<label for="email" class="input-label">Email</label>
				<input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>" required="required">
			</div>
			<div class="input-field ">
				<a href="login.php" tabindex="-1"><small><strong>Go back to login page</strong></small></a>
			</div>
			<button class="login-btn">Reset Password</button>
		</form>
	</div>

</body>
</html>