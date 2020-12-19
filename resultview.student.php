<!DOCTYPE HTML>
<html>
<head>
	<title>Student Attendance System</title>
	<?php 
	include('includes/header.php');
	include('includes/dbh.inc.php');
	session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}

	$id = $_GET['id'];
	$sql = "select semester, dept from student_info where id='$id';";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result); 
	$studentSemester = $row['semester'];
	$studentDept = $row['dept'];

	$sqlCourses = "select * from course_info where semester = '$studentSemester' and dept = '$studentDept'";
	$result = mysqli_query($conn, $sqlCourses);
	$code = [];
	$totalClass = [];
	while($row = mysqli_fetch_assoc($result)){
		array_push($code, $row['code']);
		array_push($totalClass, $row['class_num']);
		
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
			<li><a href="student.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Student Result</h1>
		</div>

	</section>

	<!-- Highlights -->
	<section class="wrapper" style="justify-content: center; align-items: center; padding: 20px 0px 15px;">
		

			<div class="highlights" style=" margin: 0; display: flex; align-content: center; align-items: center; ">
				
					<div class="content" style="margin: 0; max-width: 600px; height: auto; padding: 5px;">
						<table>
							<thead>
								<tr>
									<th>Course Code</th>
									<th>Total Class</th>
									<th>Absent</th>
									<th>Present</th>
									<th>Marks</th>
								</tr>
							</thead>
							<!-- <tbody>
								<?php 

								for($i = 0 ; $i <= count($code) -1 ; $i++){

									$sql = "SELECT course_code, result from attendance_info where course_code = '$code[$i]' and student_id = '$id' order by date desc";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_assoc($result);
									// print_r($row);
									if($row !== null){
										
										$mark = $row['result'];
									}else{
										$mark = '0';
									}
									
									
									echo "<tr>";
									echo "<td>". $code[$i] ."</td>";
									echo "<td>". $totalClass[$i] ."</td>";
									// echo "<td>". $totalClass[$i] ."</td>";
									// echo "<td>". $totalClass[$i] ."</td>";
									echo "<td>". $mark ."</td>";
									// for($j = 0; $j <= count($code[$i]); $j++){

									// }
									// echo "<td>". $code[$i] ."</td>";
									echo "</tr>";

								}
								?>
					

							
							
							</tbody> -->

							<tbody>
							
								<?php
								
								// echo $id ;	
								// print_r($code);
									for($i =0; $i<= count($code)-1; $i++){
										// echo $code[$i]. "<br>";
										$c = $code[$i];
										$currClassSql = "SELECT class_number from $c order by date DESC";
										$res  = mysqli_query($conn, $currClassSql);
										if(mysqli_num_rows($res)>0){

												$row = mysqli_fetch_array($res);
												$currClassNumber = $row[0];
												// echo $currClassNumber;

										}else{
											
										}
										

										$sql = "SELECT * from attendance_info where course_code = '$code[$i]' and student_id = '$id' order by date DESC;";
										$result = mysqli_query($conn, $sql);
										
										$cnt = mysqli_num_rows($result);
										
										echo "<tr>
											<td>
											{$c}
											</td>
											";
									
										if($cnt == 0){

										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";


										}else{
											// echo "<pre>";
											// print_r($result);
											$r = mysqli_fetch_array($result);
											$m = $r[5];
											// echo "<pre>";
											// print_r($r);
											// echo $currClassNumber . "<br>";
											// echo $cnt . "<br>";
											$absent = $currClassNumber - $cnt;
											// $present = $cnt;
											// echo $absent . "<br>";
											// echo "<br>";
											// echo $present;
										echo "<td>{$totalClass[$i]}</td>";
										echo "<td>{$absent}</td>";
										echo "<td>{$cnt}</td>";
										echo "<td>{$m}</td>";
											
										}
										
									}
								?>

							</tbody>
						</table>
					</div>
				
			</div>
		
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>