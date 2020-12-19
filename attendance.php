<!DOCTYPE HTML>
<html>
<head>
	<title>Student Attendance System</title>
    <?php 
    include('includes/header.php');

    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	
    include('includes/dbh.inc.php');
    $name = $_GET['name'];
    $id = $_GET['id'];
    $courseCode = $_GET['course-code'];

    $sql = "SELECT class_number, student_id, date from $courseCode";
    $result = mysqli_query($conn, $sql);
    $clsNum = [];
    $clsDate = [];
    $stuId = [];
    if($result == true){
        while($row = mysqli_fetch_assoc($result)){
            array_push($clsNum, $row['class_number']);
            array_push($clsDate, $row['date']);
            array_push($stuId, $row['student_id']);
            // print_r($row);
        }
        // echo "<priv>";
        // $new = explode(" ",$stuId[4]);
    
        // var_dump($new);
    }else{
        echo "error";
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
			<h1><?php echo $name?></h1>
            <p><?php echo $id?></p>
		</div>

	</section>

	<!-- Highlights -->
	<section class="wrapper" style="justify-content: center; align-items: center; padding: 20px 0px 15px;" >
		<!-- <div class="inner"> -->
			<div class="highlights" style=" margin: 0 auto; display: flex; align-content: center; " >

				<div class="content" style="margin: 0 auto; width: auto; height: auto; padding: 5px;">
                    <div class="display-info" style="display: flex; flex-direction: column; align-content: conter; flex-wrap: wrap; max-width: 700px;">
                        <!-- <h3 style="margin: 0px 0px 5px">Student Details</h3> -->
                        <div class="details" style="overflow-y: auto; max-height: 400px; max-width: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Class Number</th>
                                        <th>Date</th>
                                        <th>Present/Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <tr> -->
                                <?php 
                                for($i = 0; $i <= count($clsNum) -1; $i++){
                                    echo "<tr>";
                                    echo "<td>". $clsNum[$i]."</td>";
                                    echo "<td>". $clsDate[$i]. "</td>";
                                    $new = explode(" ",$stuId[$i]);
                                    if(array_search($id,$new)){
                                        echo "<td>"."1". "</td>";
                                    }else{
                                        echo "<td>"."0". "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                                    
                                        <!-- <td>01</td>
                                        <td>13/11/2020</td>
                                        <td>X</td> -->
                                    <!-- </tr> -->

                                

                                </tbody>
                                
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