<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Update Course Information</title>
    <?php include('includes/header.php');?>
    <link rel="stylesheet" href="assets/css/addinfo.css" />
    <style>
        .search-box {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            justify-items: center;
        }

        .search-btn {
            margin: 0 auto;
            margin-top: 5px;
            max-width: 200px;


        }

        .content {
            padding: 1rem;
        }

        .highlights {
            justify-content: center;
            flex-wrap: wrap;
        }

        label {
            margin: 5px 0px 0px 0px;
        }
    </style>
</head>

<body class="is-preload">

    <!-- Header -->
    <?php include('includes/menu.php');?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Update Course Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="search-box">
                <h3>Search Course By Course-Code</h3>
                <form action="" method="post">
                <input type="search" name="search-course" id="search-course">
                <button class="search-btn" type="submit" name="search-btn">Search</button>
                </form>

                <?php
                    include('includes/dbh.inc.php');
                    $valueCode = '';
                    $valueName = '';
                    $valueSemester = '';
                    $valueDept = '';
                    $valueClassNumber = '';
                    $valueCredit = '';

                    if(isset($_POST['search-btn'])){
                        $courseCode = mysqli_real_escape_string($conn,$_POST['search-course']);
                        
                        $sql = "SELECT * FROM course_info where code like '%$courseCode%';";
                        $result = mysqli_query($conn, $sql);
                        // var_dump($result);
    
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            $row = mysqli_fetch_assoc($result);
                        // print_r($row);
                            $valueCode = $row['code'];
                            $_SESSION["courCode"] = $row['code'];
                            $valueName = $row['name'];
                            $valueSemester = $row['semester'];
                            $valueDept = $row['dept'];
                            $valueClassNumber = $row['class_num'];
                            $valueCredit = $row['credit'];
                        }else{
                            echo "<script>alert('No Course found');</script>";
                        }
    
                    }
                    
                
                ?>
            </header>
            <div class="highlights">
                <section>
                    <form action="includes/updatecourse.info.inc.php" method="post">
                        <div class="content" style="padding: 10px;">
                            <!-- <label for="cousrs-code" class="">Course Code:</label>
                            <input type="text" name="course-code" id="course-code" required> -->
                            <label for="course-dept" class="">Course Department:</label>
                            <!-- <select name="dept" id="dept">
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
                            </select> -->
                            <input type="text" name="course-dept" id="course-dept"  placeholder="<?php echo $valueDept; ?>">
                            <label for="course-semester" class="">course Semester:</label>
                            <!-- <select name="course-semester" id="course-semester">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select> -->
                            <input type="text" name="course-semester" id="course-semester"  placeholder="<?php echo $valueSemester; ?>">
                            <label for="course-class" class="">Number Of class:</label>
                            <input type="number" name="course-class" id="course-class"  placeholder="<?php echo $valueClassNumber; ?>"
                                style="border-radius: 5px; border-width: 1px; background-color: #ECECEC; border-color: #b1b1b1;">
                            <label for="cousrs-name" class="">Course Name:</label>
                            <input type="text" name="course-name" id="course-name"  placeholder="<?php echo $valueName; ?>">
                            <label for="cousrs-credit" class="">Course Credit:</label>
                            <input type="text" name="course-credit" id="course-credit"  placeholder="<?php echo $valueCredit; ?>">

                            <hr>
                            <button type="submit" name="update-course-info" value="Add Course"
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