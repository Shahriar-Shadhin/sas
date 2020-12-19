<!DOCTYPE HTML>
<html>
<head>
    <title>Browse Information</title>
    <?php include('includes/header.php');
    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
    

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
            <h1>Browse Information</h1>
       
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights" style="justify-content: center;">
                <section>
                    <div class="content">
                        <header>
                            <a href="student.browseinfo.php" class="icon fa-eye"><span class="label">Icon</span></a>
                            <h3>Browse Student Information</h3>
                        </header>
                        <p>Browse Detail Informations Of Students</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="teacher.browseinfo.php" class="icon fa-eye"><span class="label">Icon</span></a>
                            <h3>Browse Teacher Information</h3>
                        </header>
                        <p>Browse Detail Informations Of Teachers</p>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Footer -->
	<?php include('includes/footer.php');?>
</body>

</html>