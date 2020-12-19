<!DOCTYPE HTML>
<html>

<head>
    <title>Browse Student Information By Semester</title>
    <?php include('includes/header.php');?>
    <style>
        .display-info {
            width: auto;
            height: 500px;
            border: 1px solid gray;
            justify-content: center;
        }
    </style>

</head>

<body class="is-preload">

    <!-- Header -->
    <?php include('includes/menu.php');?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Browse Student By Semester</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper" style="padding: 0px 10px;">
        <div class="inner">
            <div class="highlights" style="justify-content: center; margin: 15px 0px;">

                <div class="content" style="padding: 1rem; margin: 0 auto; width: 600px; height: auto;
                     display: flex; flex-direction: column; justify-content: center;">
                    <form action="" method="post">
                        <label for="dept" style="margin-bottom: 0px;">Choose Dept:</label>
                        <select name="dept" id="dept" required>
                            <option value="null" disabled selected>select a department</option>
                            <option value="CSE">CSE</option>
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
                        <label for="semester" style="margin-bottom: 0px;">Choose Semester:</label>
                        <select name="semester" id="semester">
                            <option value="null" disabled selected>select a semester</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                        </select>
                        <button type="submit" name="search" style="margin-top: 5px;">Search</button>
                    </form>
                    <div class="display-info" >
                        <h3>Student Details</h3>
                        <div class="details" style="overflow: auto; height: 450px; max-width: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <!-- <th>Password</th> -->
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include "includes/dbh.inc.php";
                                    if(isset($_POST['search'])){
                                        $semester = mysqli_real_escape_string($conn,$_POST['semester']);
                                        $dept = mysqli_real_escape_string($conn,$_POST['dept']);
                                        // echo $semester;
                                        // echo $dept;
                                        $sql = "SELECT * FROM student_info where semester = '$semester' AND dept = '$dept';";
                                        $result = mysqli_query($conn, $sql);
                                        // echo "<pre>";
                                        // print_r($result);
                                        

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr><td>". $row['id']. "</td><td>". $row['name']. "</td><td>"
                                            . $row['user_name']. "</td><td>". $row['dept']. "</td><td>". $row['session'].
                                            "</td></tr>";


                                            }

                                        }
                                        else{
                                            echo "<script>alert('No Student found');</script>";
                                        }
                                    }
					            ?>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>