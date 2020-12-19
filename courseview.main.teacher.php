<!DOCTYPE HTML>
<html>
<head>
	<title>Student Attendance System</title>
	<?php include('includes/header.php');?>

	<?php
	include('includes/dbh.inc.php');
	session_start();
	// session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	
	$teacherId = $_SESSION['TEACHER_ID'];
	$sql = "select * from course_info where teacher_id='$teacherId';";

	$result = mysqli_query($conn, $sql);

	
	

	// $courseList = $row['code'];
	$code = array();
	$name = array();
	$dept = array();
	$semester = array();
	$classNumber = array();
	$credit = array();
	
	while($row = mysqli_fetch_assoc($result)){
		array_push($code, $row['code']);
		array_push($name, $row['name']);
		array_push($dept, $row['dept']);
		array_push($semester, $row['semester']);
		array_push($classNumber, $row['class_num']);
		array_push($credit, $row['credit']);
		
	}
	
	// print_r($name);
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
			<h1>Course View</h1>
		</div>

	</section>

	<!-- Highlights -->
	<section class="wrapper">
		<div class="inner">

			<div class="highlights">
<?php 

for($i = 0 ; $i <= count($name) -1 ; $i++){



?>
				<section>
					<div class="content">
						<header>
							<a href="courses.teacher.php?name=<?php echo $name[$i];?>&&code=<?php echo $code[$i];?>
							&&credit=<?php echo $credit[$i];?>&&class_num=<?php echo $classNumber[$i];?>" 
							class="icon fa-files-o"><span class="label">Icon</span></a>
								<h3><?php 
									echo $name[$i];
								?></h3>
						</header>
						<p><?php echo $code[$i] ;
						
						?></p>
						<form action="studentdetails.main.teacher.php?dept=<?php echo $dept[$i];?>&&semester=<?php echo $semester[$i];?>&&code=<?php echo $code[$i];?>" method="post">
							<input type="submit" value="View student details" name="submit">
						</form>
					</div>

				</section>
			
	
			<?php }?>
			</div>
		</div>
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>