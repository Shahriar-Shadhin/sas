<?php
			include('includes/dbh.inc.php');
			$msg = "";
			session_start();

			$_SESSION['loggedIn'] = true;
?>

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

<body class="is-preload">
	<!-- menu -->
    <header id="header">
		<a class="logo" href="index.php">Student Attendance System</a>
		<!-- <nav>
			<a href="#menu">Menu</a>
		</nav> -->
    </header>
    
    <!-- <nav id="menu">
		<ul class="links">
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
	</nav> -->

	<!-- Banner -->
	<section id="banner">
		<div class="inner" style="max-width: 500px;">
			<h1>Log in</h1>
			<form action="includes/userlogin.inc2.php" method="post">
            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" placeholder="Username" required> 
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value="Login" name="submit" style=" margin-top: 10px;">
            </form>
			<?php 
			if(isset($_GET['msg'])){
				$msg=$_GET['msg'];
				echo $msg;
			}else{
				$msg = "";
				echo $msg;
			}
			?>
		</div>
		
	</section>

	<!-- Highlights -->
	
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>