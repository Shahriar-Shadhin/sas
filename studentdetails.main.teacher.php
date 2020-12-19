<!DOCTYPE HTML>
<html>
<head>
	<title>Student Attendance System</title>
	<?php include('includes/header.php');?>

    <style>
    label{
        margin: 0px 0px 0px 0px;
    }
    </style>

</head>
<?php 
include("includes/dbh.inc.php");
$dept = $_GET['dept'];
$semester = $_GET['semester'];
$courseCode = $_GET['code'];
// echo $courseCode;
// echo $semester;

$sql = "SELECT id, name FROM student_info where dept = '$dept' and semester = '$semester';";

$result = mysqli_query($conn, $sql);
$name= array();
$id = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($name, $row['name']);
	array_push($id, $row['id']);
}

// ---------------------------------------------
$s = "select DISTINCT student_id from attendance_info";
$rea = mysqli_query($conn, $s);
$ids = [];
while($ro = mysqli_fetch_assoc($rea)){
	array_push($ids, $ro['student_id']);
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
			<li><a href="teacher.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Student Details</h1>
		</div>

	</section>

	<!-- Highlights -->
	<section class="wrapper" style="justify-content: center; align-items: center; padding: 20px 0px 15px;" >
		<!-- <div class="inner"> -->
			<div class="highlights" style=" margin: 0 auto; display: flex; align-content: center; " >

				<div class="content" style="margin: 0 auto; width: auto; height: auto; padding: 5px;">
                    <div class="display-info" style="display: flex; flex-direction: column; align-content: conter; flex-wrap: wrap; max-width: 700px;">
                        <h3 style="margin: 0px 0px 5px">Student Details</h3>
                        <div class="details" style="overflow-y: auto; max-height: 400px; max-width: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Attendance (%)</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
							<?php for($i = 0; $i <= count($id) -1; $i++){
								
								
								?>
                                <tr>
                                <td><?php echo $id[$i]?></td>
                                <td><a href="attendance.php?name=<?php echo $name[$i]?>&&id=<?php echo $id[$i]?>&&course-code=<?php echo $courseCode?>">
								<?php echo $name[$i]?></a></td>
							<?php 
							// array_search($id[$i] ,$ids);
							$per = 0;
							if(array_search($id[$i] ,$ids) !== false){
								$new = "SELECT percentage from attendance_info where student_id = '$id[$i]' and course_code = '$courseCode' order by date desc;";
								$newResult = mysqli_query($conn, $new);
								$percent = mysqli_fetch_assoc($newResult);
								// print_r($percent);
								if($percent !== null){
									$per = $percent['percentage'];
								}else{
									$per = "0";
								}

								
								
							}else{
								$per = "0";
							}
							
							?>
								<td><?php echo $per;?>%</td>
                                </tr>

                            

							<?php }?>
							




                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>
					
				</div>

			<!-- </div> -->
		</div>
	</section>
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>