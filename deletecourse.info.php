<!DOCTYPE HTML>
<html>

<head>
    <title>Delete Information</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <?php 
    include('includes/header.php');
    
    session_start();
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
                            <a href="deleteonecourse.info.php" class="icon fa-minus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Delete </br>One Course Information</h3>
                        </header>
                        <p>Search and delete one course information</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="deleteallcourse.info.php" class="icon fa-minus-circle"><span
                                    class="label">Icon</span></a>
                            <h3>Delete </br>All Course Information</h3>
                        </header>
                        <p>Search and delete All course information</p>
                    </div>
                </section>
                <section>
                <form action="includes/deleteTables.inc.php" method="post">
                    <div class="content">
                        <header>
                        <br>
                            <button type="submit" name="dlt_tabels" class="" style=" background-color: #ff3333; border-radius:50%; width:70px; height: 70px;">
                                <span style="font-weight: 900; color:white;">X</span>
                            </button>
                                <!-- <span class="label">
                                    Icon
                                </span> -->
                            <br>
                            
                            <br>
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