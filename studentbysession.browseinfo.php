<!DOCTYPE HTML>
<html>

<head>
	<title>Browse Student Information By Session</title>
	<?php include('includes/header.php');?>
	<style>
    .table{
        margin: 0 auto;
        border: 1px solid black;
        
    }
    .table td{
        padding: 5px;
        border: 1px solid black;
    }
    .table th{
        padding: 5px;
        border: 1px solid black;
        text-align: center;
        background-color: steelblue;
        color: white;
    }

	</style>

</head>

<body class="is-preload">
<?php include('includes/menu.php');?>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Browse Student By Session</h1>
			<p></p>
		</div>
	</section>

	<!-- Highlights -->
	<section class="wrapper" style="justify-content: center; align-items: center; padding: 20px 0px 15px;" >
		<!-- <div class="inner"> -->
			<div class="highlights" style=" margin: 0 auto; display: flex; align-content: center; " >

				<div class="content" style="margin: 0 auto; width: 700px; height: 600px; padding: 5px;">
					<form action="" method="post" style="margin: 0px 0px 16px;">
						<input type="search" name="student-session" placeholder="2015-16">
						<button type="submit" name="search" style="margin-top: 5px;">Search</button>
                    </form>
                    
                    <div class="display-info" style="display: flex; flex-direction: column; align-content: conter; flex-wrap: wrap; max-width: 700px;">
                        <h3 style="margin: 0px 0px 5px">Student Details</h3>
                        <div class="details" style="overflow: auto; height: 450px; max-width: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <!-- <th>Password</th> -->
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include "includes/dbh.inc.php";
                                    if(isset($_POST['search'])){
                                        $stuSession = mysqli_real_escape_string($conn,$_POST['student-session']);
                                        $sql = "SELECT * FROM student_info where session = '$stuSession';";
                                        $result = mysqli_query($conn, $sql);
                                        

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr><td>". $row['id']. "</td><td>". $row['name']. "</td><td>"
                                            . $row['user_name']. "</td><td>". $row['dept']. "</td><td>". $row['session'].
                                            "</td></tr>";


                                            }

                                        }
                                        else{
                                            echo "<script>alert('No Student found');</script>";
                                        }
                                    }
					            ?>

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
	<?php include('includes/footer.php');?>
</body>

</html>