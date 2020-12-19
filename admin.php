<!DOCTYPE HTML>
<html>
<head>
	<title>Admin Panel</title>
	<?php include('includes/header.php');
	session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>

</head>

<body class="is-preload">
	<!-- menu -->
	<header id="header">
		<a class="logo" href="index.php">Student Attendance System</a>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
    </header>
    
    <nav id="menu">
		<ul class="links">
			<li><a href="admin.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
	</nav>
	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Admin Panel</h1>
			<p></p>
		</div>
		
	</section>
	
	<!-- Highlights -->
	<section class="wrapper">
		<div class="inner">
			<div class="highlights">
				<section>
					<div class="content">
						<header>
							<a href="upload.admin.php" class="icon fa-database"><span class="label">Icon</span></a>
							<h3>Upload Information</h3>
						</header>
						<p>Upload Student, Teacher and Courses informations in CSV format</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="addinfo.main.php" class="icon fa-plus-circle"><span class="label">Icon</span></a>
							<h3>Add Information</h3>
						</header>
						<p>Add Student, Teacher and Course Information to Database</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="deleteinfo.main.php" class="icon fa-minus-circle"><span
								class="label">Icon</span></a>
							<h3>Delete Information</h3>
						</header>
						<p>Delete Student, Teacher and Course Information from Database</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="updateinfo.main.php" class="icon fa-pencil"><span class="label">Icon</span></a>
							<h3>Update Information</h3>
						</header>
						<p>Update information of student, teacher and courses from database</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="assign.main.php" class="icon fa-file-text-o"><span class="label">Icon</span></a>
							<h3>Assign Teacher</h3>
						</header>
						<p>Assign teachers of courses</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="browseinfo.main.php" class="icon fa-eye"><span class="label">Icon</span></a>
							<h3>Browse Information</h3>
						</header>
						<p>Browse detail informations of teacher, student and courses</p>
					</div>
				</section>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>