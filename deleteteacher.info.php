<!DOCTYPE HTML>
<html>

<head>
    <title>Delete Teacher Information</title>
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
            <h1>Delete Teacher Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="search-box">
                <h3>Search Teacher By ID</h3>
                <form action="" method="post">
                <input type="search" name="search-teacher" id="search-teacher">
                <button class="search-btn" type="submit" name="search-btn">Search</button>
                </form>
                <?php
				include('includes/dbh.inc.php');
						$valueId = '';
						$valueName = '';
						$valueDept = '';
						$valuePhone = '';


				if(isset($_POST['search-btn'])){
					$teacherId = mysqli_real_escape_string($conn,$_POST['search-teacher']);
					
					$sql = "SELECT id, name, dept, phone FROM teacher_info where id like '%$teacherId%';";
					$result = mysqli_query($conn, $sql);
					// var_dump($result);

					if (mysqli_num_rows($result) > 0) {
					// output data of each row
					$row = mysqli_fetch_assoc($result);
					// print_r($row);
						$valueId = $row['id'];
						$valueName = $row['name'];
						$valueDept = $row['dept'];
						$valuePhone = $row['phone'];
					// while($row = mysqli_fetch_assoc($result)) {
					// 	print_r($row);
					// 	// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					// }
					// } else {
					// echo "0 results";
					}else{
						echo "<script>alert('No Teacher found');</script>";
					}

				}
				
				?>

            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <form action="includes/deleteteacher.info.inc.php" method="post">
                            <div class="content" style="padding: 10px;">
                                <label for="teacher-id" class="">Teacher ID:</label>
                                <input type="text" name="teacher-id" id="teacher-id" value='<?php echo $valueId;?>'>
                                <label for="teacher-dept" class="">Teacher Dept:</label>
                                <input type="text" name="teacher-dept" id="teacher-dept" value='<?php echo $valueDept;?>'>
                                <label for="teacher-name" class="">Teacher Name:</label>
                                <input type="text" name="teacher-name" id="teacher-name" value='<?php echo $valueName;?>'>
                                <label for="phon-number" class="">Teacher Phone:</label>
                                <input type="text" name="phon-number" id="phon-number" value='<?php echo $valuePhone;?>'>

                                <hr>
                                <button type="submit" name="delete-teacher-info" value="Delete Teacher"
                                    class="btn btn-warning btn-block">Delete Teacher</button>
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