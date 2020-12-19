<!DOCTYPE HTML>
<html>

<head>
    <title>Upload Information</title>
    <?php 
        include('includes/header.php');
        require('includes/dbh.inc.php');
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
            <h1>Upload Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
        
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
                <form action="includes/upload.admin.inc.php" method="post" enctype="multipart/form-data">
                    <section>
                        <div class="content">
                            <header>
                                <input type="file" id="teacher-file" name="teacherinfo" hidden="hidden">
                                <button type="button" id="custom-upload-button-teacher" class="btn btn-info ">Choose
                                    a
                                    file</button><br>
                                <span id="upload-text">No File Choosen</span>
                                <h3>Upload Teacher Information</h3>
                            </header>
                            <p>Upload Teacher informations in CSV format</p>
                            <input type="submit" name="submit-teacher" value="Upload" class="btn btn-info">
                        </div>
                    </section>
                    </form>

                <form action="includes/upload.admin.inc.php" method="post" enctype="multipart/form-data">
                    <section>
                        <div class="content">
                            <header>
                                <input type="file" id="student-file" name="studentinfo" hidden="hidden">
                                <button type="button" id="custom-upload-button-student" class="btn btn-info ">Choose
                                    a
                                    file</button><br>
                                <span id="upload-text-student">No File Choosen</span>
                                <h3>Upload Student Information</h3>
                            </header>
                            <p>Upload Student Information in CSV formate</p>
                            <input type="submit" name="submit-student" value="Upload" class="btn btn-info">
                        </div>
                    </section>
                </form>
                <form action="includes/upload.admin.inc.php" method="post" enctype="multipart/form-data">
                    <section>
                        <div class="content">
                            <header>
                                <input type="file" id="course-file" name="courseinfo" hidden="hidden">
                                <button type="button" id="custom-upload-button-course" class="btn btn-info ">Choose a
                                    file</button><br>
                                <span id="upload-text-course">No File Choosen</span>
                                <h3>Upload Course Information</h3>
                            </header>
                            <p>Upload Courses Information in CSV formate</p>
                            <input type="submit" name="submit-course" value="Upload" class="btn btn-info">
                        </div>
                    </section>

                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
    <script src="assets/js/upload.js"></script>

</body>

</html>