<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset Password PHP</title>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image: url('assets/img/background.jpg');">

	<div class="login-form">
		<h2>Reset Password</h2>
		<?php 
		if(isset($error) && !empty($error)): 
		?>
			<div class="message-error"><?= $error ?></div>
		<?php 
		endif 
		?>
		<form action="" method="POST">
			<div class="input-field">
				<label for="password" class="input-label">New Password</label>
				<input type="password" id="password" name="password" required="required">
			</div>
			<div class="input-field">
				<label for="confirm_password" class="input-label">Confirm Password</label>
				<input type="password" id="confirm_password" name="confirm_password" required="required">
			</div>
			<div class="input-field ">
				<a href="login.php" tabindex="-1"><small><strong>Go back to login page</strong></small></a>
			</div>
			<button class="login-btn">Submit</button>
		</form>
	</div>

	<style>
		body {
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
			background-repeat: no-repeat;
			font-family: Arial, sans-serif;
			color: #333;
		}

		.login-form {
			width: 300px;
			background-color: rgba(255, 255, 255, 0.8);
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.login-form h2 {
			text-align: center;
			margin-bottom: 30px;
			color: #444;
		}

		.input-field {
			margin-bottom: 20px;
		}

		.input-label {
			display: block;
			margin-bottom: 5px;
			font-size: 14px;
			color: #444;
		}

		.input-field input[type="text"],
		.input-field input[type="password"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 5px;
			font-size: 14px;
			color: #444;
		}

		.input-field input[type="text"]:focus,
		.input-field input[type="password"]:focus {
			outline: none;
			box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.1);
		}

		.login-btn {
			width: 100%;
			padding: 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 14px;
			cursor: pointer;
		}

		.login-btn:hover {
			background-color: #45a049;
		}

		.message-error {
			color: red;
			font-size: 12px;
			margin-bottom: 10px;
		}
	</style>

</body>
</html>