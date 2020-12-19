<!DOCTYPE HTML>
<html>

<head>
    <title>Delete Course Information</title>
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

    <!-- Header -->
    <?php include('includes/menu.php');?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Delete Course Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="search-box">
                <h3>Search Course By Course-Code</h3>
                <form action="" method="post">
                <input type="search" name="search-course" id="search-course">
                <button class="search-btn" type="submit" name="search-btn">Search</button>
                </form>
                <?php
				include('includes/dbh.inc.php');
						$valueCode = '';
						$valueDept = '';
						$valueName = '';
						$valueCredit = '';


				if(isset($_POST['search-btn'])){
					$courseCode = mysqli_real_escape_string($conn,$_POST['search-course']);
					
					$sql = "SELECT code, name, dept, credit FROM course_info where code like '%$courseCode%';";
					$result = mysqli_query($conn, $sql);
					// var_dump($result);

					if (mysqli_num_rows($result) > 0) {
					// output data of each row
					$row = mysqli_fetch_assoc($result);
					// print_r($row);
						$valueCode = $row['code'];
						$valueDept = $row['dept'];
						$valueName = $row['name'];
						$valueCredit = $row['credit'];
					// while($row = mysqli_fetch_assoc($result)) {
					// 	print_r($row);
					// 	// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					// }
					// } else {
					// echo "0 results";
					}else{
						echo "<script>alert('No Course found');</script>";
					}

				}
				
				?>
            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <form action="includes/deleteTables.inc.php" method="post">
                            <div class="content" style="padding: 10px;">
                                <label for="cousrs-code" class="">Course Code:</label>
                                <input type="text" name="course-code" id="course-code" value='<?php echo $valueCode;?>'>
                                <label for="dept" class="">Course Department:</label>
                                <input type="text" name="dept" id="dept" value='<?php echo $valueDept;?>'>
                                <label for="cousrs-name" class="">Course Name:</label>
                                <input type="text" name="course-name" id="course-name" value='<?php echo $valueName;?>'>
                                <label for="cousrs-credit" class="">Course Credit:</label>
                                
                                <input type="text" name="course-credit" id="course-credit" value='<?php echo $valueCredit;?>'>
                                <div style="margin:20px 0 0 0;">
                                
                                <input type="checkbox" name="table" id="Table" value="Yes" >
                                <label for="Table" class="" style="margin:0;">Delete With Table</label>
                                </div>
                                <!-- <input type="checkbox" name="table" id="Table"value="No">No -->
                                <hr>
                                <button type="submit" name="delete-course-info" value="Delete Course"
                                    class="btn btn-warning btn-block">Delete Course</button>
                            </div>
                        </form>
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