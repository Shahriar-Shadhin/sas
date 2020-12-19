<!DOCTYPE HTML>
<html>
<head>
	<title>Student Attendance System</title>
	<?php include('includes/header.php');
	session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>

    <style>
    label{
        margin: 0px 0px 0px 0px;
    }
    </style>

</head>

<body class="is-preload">
	<!-- Header -->
	<header id="header">
		<a class="logo" href="index.php">Student Attendance System</a>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
	</header>

	<!-- Nav -->
	<nav id="menu">
		<ul class="links">
			<li><a href="teacher.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Teacher Menu</h1>
		</div>

	</section>

	<!-- Highlights -->
	<section class="wrapper">
		<div class="inner">

			<div class="highlights">
				<section>
					<div class="content">
						<header>
							<a href="courseview.main.teacher.php" class="icon fa-files-o"><span class="label">Icon</span></a>
							<h3>View Courses</h3>
						</header>
						<p>View All Current Courses</p>
					</div>
				</section>
				
				<section>
					<div class="content">
						<header>
							<a href="signup.teacher.php" class="icon fa-pencil-square-o"><span
									class="label">Icon</span></a>
							<h3>Change User Name & Password</h3>
						</header>
						<p>Change Login User Name & Password</p>
					</div>
				</section>
				
			</div>
		</div>
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>