<!DOCTYPE HTML>
<html>

<head>
    <title>Add Student Information</title>
    <?php include('includes/header.php');?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/addinfo.css" />
</head>

<body class="is-preload">
<?php include('includes/menu.php');
session_start();
if($_SESSION['loggedIn'] !== 1){
    header("location: index.php");
    
}else{
    
}
?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Add Student information</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper" style="padding: 10px 0px 32px;">
        <div class="inner">
            <div class="highlights">
                <section>
                    <form action="includes/addstudent.inc.php" method="post">
                        <div class="content" style="padding: 10px;">
                            <label for="student-id" class="">Student ID:</label>
                            <input type="text" name="student-id" id="student-id" required>
                            <label for="student-dept" class="">Student Dept:</label>
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
                            <label for="student-semester" class="">Student Semester:</label>
                            <select name="student-semester" id="student-semester">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                            </select>
                        
                            <label for="student-name" class="">Student Name:</label>
                            <input type="text" name="student-name" id="student-name" required>
                            <label for="student-email" class="">Student Email:</label>
                            <input type="email" name="student-email" id="student-email">
                            <label for="student-session" class="">Student Session:</label>
                            <input type="text" name="student-session" id="student-session" required>
                            <label for="student-username" class="">Student Username:</label>
                            <input type="text" name="student-username" id="student-username" required>
                            <label for="student-password" class="">Student Password:</label>
                            <input type="text" name="student-password" id="student-password" required>
                            <hr>
                            <button type="submit" name="add-student-info" value="Add Student"
                                class="btn btn-warning btn-block">Add
                                Student</button>
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