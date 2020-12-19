<!DOCTYPE HTML>
<html>

<head>
    <title>Add Course Information</title>
    <?php include('includes/header.php');
    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/addinfo.css" />
</head>

<body class="is-preload">
<?php include('includes/menu.php');?>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Add Course Information</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper" style="padding: 10px 0px 32px;">
        <div class="inner">
            <div class="highlights">
                <section>
                    <form action="includes/addcourse.inc.php" method="post">
                        <div class="content" style="padding: 10px;">
                            <label for="cousrs-code" class="">Course Code:</label>
                            <input type="text" name="course-code" id="course-code" required>
                            <label for="dept" class="">Course Department:</label>
                            <select name="dept" id="dept">
                                <option value="CSE">CSE</option>
                                <option value="ICT">ICT</option>
                                <option value="TE">TE</option>
                                <option value="FAR">Farmacy</option>
                                <option value="BGE">BGE</option>
                                <option value="BMB">BMB</option>
                                <option value="ESRM">ESRM</option>
                                <option value="FTNS">FTNS</option>
                                <option value="CPS">CPS</option>
                                <option value="PHY">PHY</option>
                                <option value="CHE">CHEM</option>
                                <option value="MATH">MATH</option>
                                <option value="STAT">STAT</option>
                                <option value="ECO">ECO</option>
                                <option value="BBA">BBA</option>
                            </select>
                            <label for="course-semester" class="">course Semester:</label>
                            <select name="course-semester" id="course-semester">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                            </select>
                            <label for="course-class" class="">Number Of class:</label>
                            <input type="number" name="course-class" id="course-class" required
                                style="border-radius: 5px; border-width: 1px; background-color: #ECECEC; border-color: #b1b1b1;">
                            <label for="cousrs-name" class="">Course Name:</label>
                            <input type="text" name="course-name" id="course-name" required>
                            <label for="cousrs-credit" class="">Course Credit:</label>
                            <input type="text" name="course-credit" id="course-credit" required>
                            <!-- <div> -->
                            <input type="checkbox" name="table" id="table" value="Yes">
                            <label for="table" style="margin: 10px 0 0 20px; padding:0;">Create With Table</label>
                            <!-- </div> -->
                            <hr>
                            <button type="submit" name="add-course-info" value="Add Course"
                                class="btn btn-warning btn-block">Add Course</button>
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