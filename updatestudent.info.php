<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Update Student Information</title>
    <?php include('includes/header.php');?>
    <style>
        .search-box {
            text-align: center;
        }

        .search-btn {
            margin-top: 5px;

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
            <h1>Update Student Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="search-box">
                <h3>Search Student By ID</h3>
                <form action="" method="post">
                <input type="search" name="search-student" id="search-student">
                <button class="search-btn" type="submit" name="search-btn">Search</button>
                </form>
                <?php
                    include('includes/dbh.inc.php');
                    $valueId = '';
                    $valueName = '';
                    $valueUserName = '';
                    $valueDept = '';
                    $valueSession = '';
                    $valuePassword = '';

                    if(isset($_POST['search-btn'])){
                        $studentId = mysqli_real_escape_string($conn,$_POST['search-student']);
                        
                        $sql = "SELECT * FROM student_info where id like '%$studentId%';";
                        $result = mysqli_query($conn, $sql);
                        // var_dump($result);
    
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            $row = mysqli_fetch_assoc($result);
                        // print_r($row);
                            $valueId = $row['id'];
                            $_SESSION["stuId"] = $row['id'];
                            $valueName = $row['name'];
                            $valueUserName = $row['user_name'];
                            $valueDept = $row['dept'];
                            $valueSession = $row['session'];
                            $valuePassword = $row['password'];
                        }else{
                            echo "<script>alert('No Student found');</script>";
                        }
    
                    }
                    
                
                ?>
            </header>
            <div class="highlights">
                <section style="padding: 0;">
                    <div class="content" style="padding: 1rem;">
                        <form action="includes/updatestudent.info.inc.php" method="post">
                            <label for="student-dept" class="">Student Dept:</label>
                            <input type="text" name="student-dept" id="student-dept" placeholder="<?php echo $valueDept; ?>">
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
                            <label for="student-name" class="">Student Name:</label>
                            <input type="text" name="student-name" id="student-name" placeholder="<?php echo $valueName; ?>">

                            <!-- <label for="student-semester" class="">Student Semester:</label>
                            <input type="text" name="student-semester" id="student-semester" > -->
                            <!-- <select name="student-semester" id="student-semester">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select> -->
                            <!-- <input type="text" name="student-semester" id="student-semester"> -->
                            <label for="student-session" class="">Student Sessions:</label>
                            <input type="text" name="student-session" id="student-session" placeholder="<?php echo $valueSession; ?>">
                            <label for="student-username" class="">Student Username:</label>
                            <input type="text" name="student-username" id="student-username" placeholder="<?php echo $valueUserName; ?>">
                            <!-- <label for="student-password" class="">Student Password:</label>
                            <input type="text" name="student-password" id="student-password" placeholder="<?php echo $valuePassword; ?>"> -->
                            <hr>
                            <button type="submit" name="update-student-info" value="Update Student"
                                class="btn btn-warning btn-block">Update
                                Student</button>
                    </div>
                    </form>

            </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
    session_abort();
</body>

</html>