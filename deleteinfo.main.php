<!DOCTYPE HTML>
<html>

<head>
    <title>Delete Information</title>
    <?php 
    include('includes/header.php');
    
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
            <h1>Delete Information</h1>
            
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="" class="icon fa-minus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Delete </br> Student Information</h3>
                        </header>
                        <p>Delete Student Information To Databse</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="deleteteacher.info.php" class="icon fa-minus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Delete </br>Teacher Information</h3>
                        </header>
                        <p>Delete Teacher Information to Database</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="deletecourse.info.php" class="icon fa-minus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Delete </br>Course Information</h3>
                        </header>
                        <p>Delete Course Information To Database</p>
                    </div>
                </section>

                <section>
                <form action="includes/deleteTables.inc.php" method="post">
                    <div class="content">
                        <header>
                            <input type="submit" vlaue="" name="dlt_tabels" class="" style="width:150px; height:70px; border-radius: 30px;">
                                <!-- <span class="label">
                                    Icon
                                </span> -->
                            </input>
                            <h3>Delete </br>Course Tables</h3>
                        </header>
                        <p>Delete Course Tables From Database</p>
                    </div>
                </form>
                </section>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>