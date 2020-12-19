<!DOCTYPE HTML>
<html>
<head>
    <title>Add Information</title>
    <?php include('includes/header.php');
    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
    
    
</head>

<body class="is-preload">

    <!-- Header and nav-->
    <header id="header">
		<a class="logo" href="index.php">Student Attendance System</a>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
    </header>
    
    <nav id="menu">
		<ul class="links">
			<li><a href="admin.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
	</nav>


    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Add information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="addstudent.info.php" class="icon fa-plus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Add </br> Student Information</h3>
                        </header>
                        <p>Add Student Information To Databse</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="addteacher.info.php" class="icon fa-plus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Add </br>Teacher Information</h3>
                        </header>
                        <p>Add Teacher Information to Database</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="addcourse.info.php" class="icon fa-plus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Add </br>Course Information</h3>
                        </header>
                        <p>Add Course Information To Database</p>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include('includes/footer.php');?>

</body>

</html>