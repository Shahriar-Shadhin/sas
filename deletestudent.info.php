<!DOCTYPE HTML>
<html>

<head>
	<title>Delete Student Information</title>
	<?php include('includes/header.php');
	session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
	
	
	<style>
		.search-box {
			text-align: center;


		}

		.search-btn {
			margin-top: 5px;

		}

		section {
			margin: 0 auto;
		}
	</style>
</head>

<body class="is-preload">
<?php include('includes/menu.php');?>
	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Delete Student Information</h1>
			<p>A responsive business oriented template with a video background<br />
				designed by and released under the Creative Commons
				License.</p>
		</div>
	</section>

	<!-- Highlights -->
	<section class="wrapper">
		<div class="inner">
			<header class="search-box">
				<h3>Search Student By ID</h3>
				<form action="" method="post">
					<input type="search" name="search-student" id="search-student">
					<button class="search-btn" type="submit" name="search-btn">Search</button>
				</form>
				<?php
				include('includes/dbh.inc.php');
						$valueId = '';
						$valueName = '';
						$valueDept = '';
						$valueSession = '';


				if(isset($_POST['search-btn'])){
					$studentId = mysqli_real_escape_string($conn,$_POST['search-student']);
					
					$sql = "SELECT id, name, dept, session FROM student_info where id like '%$studentId%';";
					$result = mysqli_query($conn, $sql);
					// var_dump($result);

					if (mysqli_num_rows($result) > 0) {
					// output data of each row
					$row = mysqli_fetch_assoc($result);
					// print_r($row);
						$valueId = $row['id'];
						$valueName = $row['name'];
						$valueDept = $row['dept'];
						$valueSession = $row['session'];
					// while($row = mysqli_fetch_assoc($result)) {
					// 	print_r($row);
					// 	// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					// }
					// } else {
					// echo "0 results";
					}else{
						echo "<script>alert('No Student found');</script>";
					}

				}
				
				?>
			</header>
			<div class="highlights">
				<section>
					<div class="content">
						<form action="includes/deletestu.info.inc.php" method="post">
							<div class="content" style="padding: 10px;">
								<label for="student-id" class="">Student ID:</label>
								<input type="text" name="student-id" id="student-id" value='<?php echo $valueId;?>'>
								<label for="student-dept" class="">Student Dept:</label>
								<input type="text" name="student-dept" id="student-dept" value='<?php echo $valueDept;?>'>
								<label for="student-name" class="">Student Name:</label>
								<input type="text" name="student-name" id="student-name" value='<?php echo $valueName;?>'>
								<label for="student-session" class="">Student Sessions:</label>
								<input type="text" name="student-session" id="student-session" value='<?php echo $valueSession;?>'>
								<hr>
								<button type="submit" name="delete-student-info" value="Delete Student"
									class="btn btn-warning btn-block">Delete
									Student</button>
							</div>
						</form>
				<?php


			

				?>
						<p></p>
					</div>
				</section>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include('includes/footer.php');?>

</body>

</html>