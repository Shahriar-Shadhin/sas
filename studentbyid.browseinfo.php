<!DOCTYPE HTML>
<html>

<head>
	<title>Browse Student Information By ID</title>
	<?php include('includes/header.php');?>
	<style>
		.display-info {
			padding: 10px;
			/* display: flex; */
			/* flex-direction: column; */
			width: auto;
			height: 500px;
			border: 1px solid gray;
			justify-content: center;
		}
		table{
			/* border: 1px solid black; */
		}
	</style>

</head>

<body class="is-preload">
<?php include('includes/menu.php');?>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Browse Student By ID</h1>
			<p>A responsive business oriented template with a video background<br />
				designed by and released under the Creative Commons
				License.</p>
		</div>
	</section>

	<!-- Highlights -->
	<section class="wrapper" style="padding: 0px 10px;">
		<div class="inner">
			<div class="highlights" style="justify-content: center; margin: 15px 0px;">

				<div class="content"
					style="padding: 1rem; margin: 0 auto; width: 600px; height: 650px; display: flex; flex-direction: column; justify-content: center;">
					<form action="" method="post">
						<input type="search" name="student-id" placeholder="CE-16001">
						<button type="submit" name="search" style="margin-top: 5px;">Search</button>
					</form>
					
					
					<div class="display-info">
					<h3 style="margin: 0px 0px 5px">Student Details</h3>
					<table>
					<?php
					include "includes/dbh.inc.php";
							$stuId = "";
							$stuName = "";
							$stuUserName = "";
							$stuDept = "";
							$stuSession = "";
							$stuPassword = "";
					

					if(isset($_POST['search'])){
						$studentId = mysqli_real_escape_string($conn,$_POST['student-id']);
						$sql = "SELECT * FROM student_info where id like '%$studentId%';";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							// print_r($row);
							$stuId = $row['id'];
							$stuName = $row['name'];
							$stuUserName = $row['user_name'];
							$stuDept = $row['dept'];
							$stuSession = $row['session'];
							$stuPassword = $row['password'];

							$arrData =[$stuId, $stuName, $stuDept, $stuSession, $stuUserName, $stuPassword];
							$arr = ["ID","Name", "Department", "Session", "User Name", "Password"];
							for ($i=0; $i <=4; $i++) { 
								echo "<tr><td><b>". $arr[$i]." :". "</b></td><td>". $arrData[$i]. "</td></tr>";
					}

						}else{
                            echo "<script>alert('No Student found');</script>";
                        }
					}
					?>

					</table>

					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include('includes/footer.php');?>
</body>

</html>