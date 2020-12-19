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
	
	$courseCode = $_GET['code'];
	$sql = "select class_number from $courseCode order by class_number desc";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_array($result);
	// echo $row[0];
	$classCode = mt_rand(100000,900000);
	
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
                            <td><b>Course Code:</b></td>
                            <td><?php echo $_GET['code'];?></td>
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
                            <td><b>Previous Class Number:</b></td>
							<td><?php 
							if($row !== null){
							echo $row[0];
							}
							else{
								echo "0";
							}
							
							?>
							</td>
                            </tr>
                            <tr>
                            <td><b>Current Class Number:</b></td>
							<td><?php 
							if($row !== null){
								$newClass = ++$row[0];
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
                            <td><?php echo $classCode;?></td>
                            </tr>

							<tr>
                            <td><b>Set Time Limit(Minutes):</b></td>
                            <td><input type="text" name="time_limit" id="time_limit" required></td>
                            </tr>

							<tr>
                            <td><b>Set Class Room:</b></td>
                            <td>
							<select name="class-room" id="class-room">
							<option disabled>Choose a option</option>
							<option value="1">1</option>
							<option value="2">2</option>
							</select>
							</td>
                            </tr>

                            <tr style="background: white;">
                            <td colspan="2"><button type="submit" name="submit">Submit</button></td>
                            
                            </tr>

                            
						</table>
						</form>
					</div>
				</section>
			</div>
			<?php
			
			if(isset($_POST['submit'])){
				$courseCode = $_GET['code'];
				$time_limit = $_POST['time_limit'];
				$room_number = $_POST['class-room'];

				date_default_timezone_set("Asia/Dhaka");
				$currentDate = date("Y-m-d h:i");

				$sql = "INSERT INTO $courseCode(class_number, class_code, time_limit, date, room_num) VALUES ('$newClass', '$classCode', '$time_limit','$currentDate', '$room_number')";
				mysqli_query($conn, $sql);
				header("location: courseview.main.teacher.php");
			
			}

			?>
		
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>