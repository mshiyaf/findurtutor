<?php
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$phone = "";
	$area = "";
	$qualification="";
	$errors = array();
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'mysql', 'registration') or die(mysql_error());

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$area = mysqli_real_escape_string($db, $_POST['area']);
		$qualification = mysqli_real_escape_string($db, $_POST['qualification']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($phone)) { array_push($errors, "Phone Number is required"); }
		if (empty($area)) { array_push($errors, "Area is required"); }
		if (empty($qualification)) { array_push($errors, "Qualification is required"); }
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO tutor (username, email, password, phone, area, qualification)
					  VALUES('$username', '$email', '$password', '$phone', '$area', '$qualification')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index2.php');
		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM tutor WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$qry = "SELECT email FROM tutor WHERE username='$username' AND password='$password'";
				$result = mysqli_query($db, $qry);
				$value = mysqli_fetch_object($result);
				$_SESSION['email'] = $value->email;

				$qry1 = "SELECT area FROM tutor WHERE username='$username' AND password='$password'";
				$result1 = mysqli_query($db, $qry1);
				$value = mysqli_fetch_object($result1);
				$_SESSION['area'] = $value->area;

				$qry2 = "SELECT phone FROM tutor WHERE username='$username' AND password='$password'";
				$result2 = mysqli_query($db, $qry2);
				$value = mysqli_fetch_object($result2);
				$_SESSION['phone'] = $value->phone;

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../home/profile.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
?>