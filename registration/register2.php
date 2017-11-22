<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register2.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" value="<?php echo $phone; ?>">
		</div>
		<div class="input-group">
			<label>Area</label>
			<input type="text" name="area" value="<?php echo $area; ?>">
		</div>
		<div class="input-group">
			<label>Qualification</label>
			<input type="text" name="qualification" value="<?php echo $qualification; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login2.php">Sign in</a>
		</p>
		<p>
			Go back to HomePage <a href="../index.html">Back</a>
		</p>
	</form>
</body>
</html>