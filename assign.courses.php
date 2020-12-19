<?php 
session_start();
include('includes/dbh.inc.php');
// session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}


if(isset($_POST['course'])){


$_SESSION['TEACHER-DEPT'] = $_POST['dept'];
$_SESSION['TEACHER-NAME'] = $_POST['teacher-name'];
$_SESSION['TEACHER-DESIG'] = $_POST['teacher-designation'];
// echo $_SESSION['TEACHER-NAME'];
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Assign Teacher</title>
    <?php include('includes/header.php');?>
    <style>
        .search-box {
            text-align: center;
        }
        .content {
            margin: 0 auto;
            padding: 1rem;
            width: 600px;
            
        }

        .highlights {
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 auto;
            
        }

        label {
            margin: 0px 0px 0px 0px;
            padding: 0px;
        }
        .course-section {
            border: 1px solid gainsboro;
        }
    
    </style>
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
            <h1>Assign Teacher</h1>

        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
                <div class="content" style="padding: 0.5rem; margin: 0 auto; width: 600px;">
                    <form action="includes/assign.inc.php" method="post">
                        
                        <h3 style="margin: 0 0 5px; font-weight: 500;">Choose Year & Semester:</h3>
                        <label for="year">Year</label >
                        <select name="year" id="year" onchange="funYear(this.value)">
                            
                            <option>Select</option>
                            <option value="1st" >1st</option>
                            <option value="2nd" >2nd</option>
                            <option value="3rd" >3rd</option>
                            <option value="4th" >4th</option>
                        
                        </select>
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" onchange="funSemester(this.value)">
                            <option>Select</option>
                        
                        </select>
                        <div class="course-section" style="display: flex; flex-direction: column; flex-wrap: wrap; justify-content: space-around; padding: 5px;
                        text-align: left;">

                        </div>
                        <hr>
                        <button type="submit" name="assign" >Assign</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var year;
        function funYear(data){
            
            year = data;
            const ajaxreq = new XMLHttpRequest();
            ajaxreq.open('GET', 'http://localhost/site/SAS-tamplate-php-refine/getdatanew.php?selectvalue=' + year, 'TRUE');
            ajaxreq.send();
            ajaxreq.onreadystatechange = function(){
                if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                    document.getElementById('semester').innerHTML = ajaxreq.responseText;
                    
                
                };
            };


        };

        function funSemester(value){
            let semester = value;
            
            const ajaxreq = new XMLHttpRequest();
            ajaxreq.open('GET', 'http://localhost/site/SAS-tamplate-php-refine/getdata3.php?year='+year + '&semester='+semester, 'TRUE');
        
            ajaxreq.send();
            ajaxreq.onreadystatechange = function(){
                if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                    document.querySelector('.course-section').innerHTML = ajaxreq.responseText;
                    
                
                };
            };

        };

    

        
    </script>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>