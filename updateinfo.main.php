<!DOCTYPE HTML>
<html>
<head>
    <title>Update Information</title>
    <?php include('includes/header.php');?>
</head>

<body class="is-preload">

    <!-- Header -->
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
            <h1>Update Information</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="updatestudent.info.php" class="icon fa-pencil"><span class="label">Icon</span></a>
                            <h3>Update </br> Student Information</h3>
                        </header>
                        <p>Update Student Information To Databse</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="updateteacher.info.php" class="icon fa-pencil"><span class="label">Icon</span></a>
                            <h3>Update </br>Teacher Information</h3>
                        </header>
                        <p>Update Teacher Information to Database</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="updatecourse.info.php" class="icon fa-pencil"><span class="label">Icon</span></a>
                            <h3>Update </br>Course Information</h3>
                        </header>
                        <p>Update Course Information To Database</p>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>