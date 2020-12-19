<!DOCTYPE HTML>
<html>

<head>
    <title>Browse Teacher Information By ID</title>
	<?php include('includes/header.php');?>
    <style>
        .display-info {
            width: auto;
            height: 500px;
            border: 1px solid gray;
            justify-content: center;
        }
    </style>

</head>

<body class="is-preload">

    <!-- Header -->
	<?php include('includes/menu.php');?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Browse Teacher By ID</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper" style="padding: 0px 10px;">
        <div class="inner">
            <div class="highlights" style="justify-content: center; margin: 15px 0px;">
                <div class="content"
                    style="padding: 1rem; margin: 0 auto; width: 600px; height: 500px; display: flex; flex-direction: column; justify-content: center;">
                    <form action="" method="post">
                        <input type="search" name="teacher-id" placeholder="CE-16001">
                        <button type="submit" name="search" style="margin-top: 5px;">Search</button>
                    </form>
                    <div class="display-info">
                        <h3>Teacher Details</h3>
                        <table>
					<?php
					include "includes/dbh.inc.php";
							$teaId = "";
							$teaName = "";
							$teaUserName = "";
							$teaDept = "";
							$teaSession = "";
							$teaPassword = "";
					

					if(isset($_POST['search'])){
						$teacherId = mysqli_real_escape_string($conn,$_POST['teacher-id']);
						$sql = "SELECT * FROM teacher_info where id like '%$teacherId%';";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							// print_r($row);
							$teaId = $row['id'];
							$teaName = $row['name'];
							$teaUserName = $row['user_name'];
							$teaDept = $row['dept'];
							$teaPhone = $row['phone'];
							$teaPassword = $row['password'];

							$arrData =[$teaId, $teaName, $teaDept, $teaPhone, $teaUserName, $teaPassword];
							$arr = ["ID","Name", "Department", "Phone", "User Name", "Password"];
							for ($i=0; $i <=4; $i++) { 
								echo "<tr><td><b>". $arr[$i]." :". "</b></td><td>". $arrData[$i]. "</td></tr>";
					}

						}else{
                            echo "<script>alert('No Teacher found');</script>";
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