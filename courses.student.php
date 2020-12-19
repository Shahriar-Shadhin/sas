<!DOCTYPE HTML>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<title>Student Attendance System</title>
	<style>
	.hide{
		display: none;
	}
	</style>
	<?php include('includes/header.php');
		include('includes/dbh.inc.php');
		session_start();
		$id = $_SESSION['STUDENT_ID'];
		// session_start();
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
			<li><a href="student.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>
	<?php 
	$courseCode = $_GET['code'];
	$sql = "select * from $courseCode order by class_number desc";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$time_limit = $row['time_limit'] * 60;
	
		$room_number = $row['room_num'];
	}else{
		$row = mysqli_fetch_array($result);
		$room_number = null;
		
	}

	if($room_number !== null){
		$rm = "SELECT * FROM class_room where room_num = '$room_number'";
		$res = mysqli_query($conn, $rm);
		$data = mysqli_fetch_assoc($res);
		$latDb = (double)$data['latitude'];
		$lonDb = (double)$data['longitude'];
	}else{
		$latDb = 0;
		$lonDb = 0;
	}

	
	
	// echo $room_number;
	
	?>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1><?php echo $_GET['name'];?></h1>
		</div>

	</section>
	

	<!-- Highlights -->
	<section class="wrapper" style="justify-content: center; align-items: center; padding: 20px 0px 15px;">
		
			<div class="highlights" style=" margin: 0 auto; display: flex; align-content: center; align-item: center;">
				<section>
					<div class="content" style="margin: 0 auto; max-width: 500px; height: auto; padding: 0px;">
					<form action="" method="post">
					<table>
                            <tr>
                            <td><b>Course Name:</b></td>
                            <td><?php echo $_GET['name'];?></td>
                            </tr>

                            <tr>
                            <td ><b>Course Code:</b></td>
                            <td id="course-code"><?php echo $_GET['code'];?></td>
                            </tr>

                            <tr>
                            <td><b>Course Credit:</b></td>
                            <td><?php echo $_GET['credit'];?></td>
                            </tr>

                            <tr>
                            <td><b>Number Of Classes:</b></td>
                            <td><?php echo $_GET['class_num'];?></td>
                            </tr>

                            <tr>
                            <td><b>Current Class Number:</b></td>
                            <td>
								<?php
								if($row !== null){
									$newClass = $row[0];
								echo $newClass;
								}
								else{
									$newClass = '1';
									echo $newClass;
								}
								?>
							</td>
                            </tr>

                            <tr style="color: #FF5733">
                            <td><b>Current Class Code:</b></td>
                            <td>
								<?php
								if($row !== null){
									
								echo $row['class_code'];
								}
								else{
								
									echo "No code is available";
								}
								?>
							</td>
                            </tr>
							<tr>
							<td><b>Distance</b></td>
							<td>
								<span id="message" style="color:red;"></span>
							</td>
							</tr>

                            <tr style="background: white;">
                            <td colspan="2">
								<div id="status">
									<input type="submit" id= "submit" name="submit" value="Submit"></input>
								</div>

							</td>
                            
							</tr>
							
							
							


                            
                        </table>
						</form>
						<p id="msg"></p>
								<script>
								var lat1 = '';
								var lon1 = '';
								var lat2 = Number("<?php echo $latDb?>");
								var lon2 = Number("<?php echo $lonDb?>");

								var room = "<?php echo $room_number?>";
								// console.log(room);
								$(document).ready(function() {
								if(navigator.geolocation){
									navigator.geolocation.getCurrentPosition(function(p){
										lat1 = p.coords.latitude;
										lon1 = p.coords.longitude;

										console.log(lat1);
										console.log(lon1);
										console.log(lat2);
										console.log(lon2);

										const R = 6371e3; // metres
										const φ1 = lat1 * Math.PI/180; // φ, λ in radians
										const φ2 = lat2 * Math.PI/180;
										const Δφ = (lat2-lat1) * Math.PI/180;
										const Δλ = (lon2-lon1) * Math.PI/180;

										const a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
												Math.cos(φ1) * Math.cos(φ2) *
												Math.sin(Δλ/2) * Math.sin(Δλ/2);
										const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

										const d = R * c; // in metres
										console.log(d);

										if(d >= 4){
											$("#submit").prop('disabled',true);
											// $("#message").textContent = d;
											document.getElementById("message").textContent = d;

										}else{
											$("#submit").prop('disabled',false);
											// $("#message").textContent = d;
											
										}

								// 	$.ajax({
								// 	url: "includes/courses.student.inc.php",
								// 	type: "POST",
								// 	data: {
								// 		Lat: lat,
								// 		Lon: lon,
								// 		Room: room
								// 	},
								// 	success: function(data){
										
								// 		if(data == 0){
											
								// 			$("#submit").prop('disabled',true);
											
								// 		}else{
											
								// 			$("#submit").prop('disabled',false);

								// 		}
								// 	}
								// })
									})
								}
								})

								
								
								</script>

						<?php
						
						if(isset($_POST['submit'])){
							$rm = "SELECT * FROM class_room where room_num = '$room_number'";
							$res = mysqli_query($conn, $rm);
							$data = mysqli_fetch_assoc($res);
							$lat = $data['latitude'];
							$lon = $data['longitude'];

							
								if($row !== null ){
									if(strpos($row['student_id'], $id) !== false){
										echo "Your attendance is already given";
										
									}else{
										$sql = "select * from $courseCode order by class_number desc";
										$result = mysqli_query($conn, $sql);
				
										$row = mysqli_fetch_array($result);
										date_default_timezone_set("Asia/Dhaka");
										$currentStudentDate = date("Y-m-d h:i");
										$currentCourseDate = $row['date'];
										
										$studentDate = strtotime($currentStudentDate);
										$classDate = strtotime($currentCourseDate) + $time_limit;
										
										if($studentDate < $classDate){
										
											$studentIds = $row['student_id'];
											$newIds = $studentIds . " " . $id;
											$sqli = "UPDATE $courseCode
											SET student_id = '$newIds'
											WHERE class_number = '$newClass';";
											mysqli_query($conn, $sqli);
		
											$s = "select * from $courseCode where class_number = '$newClass'";
											$result = mysqli_query($conn, $s);
											$row = mysqli_fetch_assoc($result);
											
											$attCurrentClassNumber = $row['class_number'];
											$attCurrentClassCode = $row['class_code'];
											$attCurrentCourseCode = $_GET['code'];
											$attStudentId = $id;
											$attTotalClassNumber = $_GET['class_num'];
									
											$demo = "select student_id from $courseCode";
											$r = mysqli_query($conn, $demo);
											$data = [];
											while($ro = mysqli_fetch_assoc($r)){
												array_push($data, $ro['student_id']);
											}
											
											$str =  implode(" ",$data);
											$numberOfAttendance = substr_count($str, $attStudentId);
	
	
		
											$persantage = ($numberOfAttendance / $attCurrentClassNumber) * 100;
	
	
											// echo $persantage . "%". "<br>";
	
											if($persantage < 60){
												$marks = 0;
												// echo $marks ."<br>";
											}else if($persantage >= 60 && $persantage <=65){
												$marks = 4;
												// echo $marks ."<br>";
											}else if($persantage >= 65 && $persantage <=70){
												$marks = 5;
												// echo $marks ."<br>";
											}else if($persantage >= 70 && $persantage <=75){
												$marks = 6;
												// echo $marks ."<br>";
											}else if($persantage >= 75 && $persantage <=80){
												$marks = 7;
												// echo $marks ."<br>";
											}else if($persantage >= 80 && $persantage <=85){
												$marks = 8;
												// echo $marks ."<br>";
											}else if($persantage >= 85 && $persantage <=90){
												$marks = 9;
												// echo $marks ."<br>";
											}else if($persantage >= 90){
												$marks = 10;
												// echo $marks ."<br>";
											}
	
											// echo "Present";
	
											$att = "insert into attendance_info(student_id, course_code, total_class_number, current_class_number, percentage, result, date, class_code) 
											values('$attStudentId', '$attCurrentCourseCode', '$attTotalClassNumber', '$attCurrentClassNumber', '$persantage', '$marks', '$currentStudentDate', '$attCurrentClassCode')";
											mysqli_query($conn, $att);
	
											
		
		
										
										// header("location: courseview.main.student.php");
										echo "<script> alert('Attendance is done')</script>";
										}
										else{
											echo "Your Attendance Time is Up";
										}
								
	
	
										
									}
									
								}else{
									echo "<b>error!</b>";
								}
							
							
							
						}

						?>
					</div>
				</section>
			</div>
		
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>