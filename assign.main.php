
<!DOCTYPE HTML>
<html>

<head>
    <title>Assign Teacher</title>
    <?php include('includes/header.php');
    // session_start();
    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
    
    
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
            margin: 5px 0px 0px 0px;
        }

        .code-area {
            width: 140px;

            padding: 5px;
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
                <div class="content" style="padding: 1rem; margin: 0 auto; width: 600px;">
                    <form action="assign.courses.php" method="post">
                        <label for="teacher-dept">Teacher Dept:</label>
                        <select name="dept" id="teacher-dept" onchange="depts(this.value)">
                            <option>Select</option>
                            <option value="cse">CSE</option>
                            <option value="ict">ICT</option>
                            <option value="te">TE</option>
                            <option value="farm">Farmacy</option>
                            <option value="bge">BGE</option>
                            <option value="bmb">BMB</option>
                            <option value="esrm">ESRM</option>
                            <option value="ftns">FTNS</option>
                            <option value="cps">CPS</option>
                            <option value="phy">PHY</option>
                            <option value="chem">CHEM</option>
                            <option value="math">MATH</option>
                            <option value="stat">STAT</option>
                            <option value="eco">ECO</option>
                            <option value="bba">BBA</option>
                        </select>
                        <label for="teacher-name">Teacher Name:</label>
                        <!-- <input type="text" name="teacher-name" id="teacher-name"> -->
                        <select name="teacher-name" id="teacher-name">
                        <option >Select</option>
                        </select>
                        <label for="teacher-designation">Teacher Designation:</label>
                        <select name="teacher-designation" id="teacher-designation">
                            <option value="professor">Professor</option>
                            <option value="associate-professor">Associate Professor</option>
                            <option value="assistant-professor">Assistant Professor</option>
                            <option value="lecturer">Lecturer</option>
                            
                        </select>
                        
                        <hr>

                        <button type="submit" name="course">Goto Courses Page</button>

                    </form>
                </div>
                
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function depts(data){
            // alert(data);
            const ajaxreq = new XMLHttpRequest();
            ajaxreq.open('GET', 'http://localhost/site/SAS-tamplate-php-refine/getdata.php?selectvalue=' + data, 'TRUE');
            ajaxreq.send();
            ajaxreq.onreadystatechange = function(){
                if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                    document.getElementById('teacher-name').innerHTML = ajaxreq.responseText;
                    
                
                }
            }


        }
    </script>




    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>