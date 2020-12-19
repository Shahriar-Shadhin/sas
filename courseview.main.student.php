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

<?php
	include('includes/dbh.inc.php');

	$studentId = $_SESSION['STUDENT_ID'];
	// echo $studentId;
	$sql = "select semester, dept from student_info where id='$studentId';";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result); 
	$studentSemester = $row['semester'];
	$studentDept = $row['dept'];
	// echo $studentSemester;
	// echo $studentDept;

	$sqlCourses = "select * from course_info where semester = '$studentSemester' and dept = '$studentDept'";
	$result = mysqli_query($conn, $sqlCourses);
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
?>

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
			<li><a href="student.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Course Lists</h1>
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
							<a href="courses.student.php?name=<?php echo $name[$i];?>&&code=<?php echo $code[$i];?>
							&&credit=<?php echo $credit[$i];?>&&class_num=<?php echo $classNumber[$i];?>" class="icon fa-file"><span class="label">Icon</span></a>
							<h3><?php echo $name[$i];?></h3>
						</header>
						<p><?php echo $code[$i];?></p>
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