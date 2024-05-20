<?php
session_start();

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dance";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Function to generate random token
function generateToken() {
	return bin2hex(random_bytes(32));
}

// Function to send email
function sendEmail($email, $token) {
	$to = $email;
	$subject = "Reset Password";
	$message = "Please click on the following link to reset your password: <br><br> <a href='http://localhost/password-recovery/reset-password.php?token=$token'>Reset Password</a>";
	$headers = "From: your-email@example.com" . "\r\n" .
		"CC: another-email@example.com";
	mail($to, $subject, $message, $headers);
}

// Function to check if token is valid
function isTokenValid($token) {
	global $conn;
	$sql = "SELECT * FROM password_reset_temp WHERE token = '$token'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

// Function to check if token is expired
function isTokenExpired($expDate) {
	$currentDate = new DateTime();
	if ($currentDate > $expDate) {
		return true;
	} else {
		return false;
	}
}

// Function to reset password
function resetPassword($email, $password) {
	global $conn;
	$password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
	mysqli_query($conn, $sql);
}

// Forgot password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$stmt = $conn->prepare("SELECT * FROM users where email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		$token = generateToken();
		$expDate = new DateTime();
		$expDate->add(new DateInterval("PT1H")); // Token expires in 1 hour
		$sql = "INSERT INTO password_reset_temp (email, token, expDate) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $email, $token, $expDate);
		$stmt->execute();
		sendEmail($email, $token);
		header("Location: pending.php?email=$email");
	} else {
		$error = "Email not found";
	}
}