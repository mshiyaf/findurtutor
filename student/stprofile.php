<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  	<meta charset="UTF-8">
  	<title>Student Profile</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="main.css" />

    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="../index.html">Find_your_tutor</a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="../index.html">Welcome <?php echo $_SESSION['username'];?> </a></li>
						</ul>
					</nav>
				<section id="banner">

					<div class="inner">
						<header>
							<h2>Find_your_tutor</h2>
						</header>
						<p>
						Find yourself a tutor of your choice
						<br />
					</div>

				</section>

 <label id="img_category_label"class="field"for="img_category"data-value="">
	<span>Select Subject</span>
	<div id="img_category"class="psuedo_select"name="img_category">
		<span class="selected"></span>
		<ul id="img_category_options"class="options">
			<li class="option"data-value="commercial">Biology</li>
			<li class="option"data-value="residential">Physics</li>
			<li class="option"data-value="residential">Maths</li>
			<li class="option"data-value="residential">Chemistry</li>
			<li class="option"data-value="residential">Computer</li>
		</ul>
	</div>
</label>

    <script src="js/index.js"></script>

</body>
</html>