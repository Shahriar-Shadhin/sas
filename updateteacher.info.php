<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Update Teacher Information</title>
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
            <h1>Update Teacher Information</h1>
            <p>A responsive business oriented template with a video background<br />
                designed by and released under the Creative Commons
                License.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="search-box">
                <h3>Search Teacher By ID</h3>
                <form action="" method="POST">
                <input type="search" name="search-teacher" id="search-teacher">
                <button class="search-btn" type="submit" name="search-btn">Search</button>
                </form>
                <?php
                    include('includes/dbh.inc.php');
                    $valueId = '';
                    $valueName = '';
                    $valueUserName = '';
                    $valueDept = '';
                    $valuePhone = '';
                    $valuePassword = '';

                    if(isset($_POST['search-btn'])){
                        $teacherId = mysqli_real_escape_string($conn,$_POST['search-teacher']);
                        
                        $sql = "SELECT * FROM teacher_info where id like '%$teacherId%';";
                        $result = mysqli_query($conn, $sql);
                        // var_dump($result);
    
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            $row = mysqli_fetch_assoc($result);
                        // print_r($row);
                            $valueId = $row['id'];
                            $_SESSION["teacId"] = $row['id'];
                            $valueName = $row['name'];
                            $valueUserName = $row['user_name'];
                            $valueDept = $row['dept'];
                            $valuePhone = $row['phone'];
                            $valuePassword = $row['password'];
                        }else{
                            echo "<script>alert('No Teacher found');</script>";
                        }
    
                    }
                    
                
                ?>
            </header>
            <div class="highlights">
                <section style="padding: 0;">
                    <div class="content" style="padding: 1rem;">
                        <form action="includes/updateteacher.info.inc.php" method="post">

                            <!-- <label for="teacher-id" class="">Teacher ID:</label>
                            <input type="text" name="teacher-id" id="teacher-id" placeholder="<?php echo $valueId; ?>"> -->
                            <label for="teacher-dept" class="">Teacher Dept:</label>
                            <!-- <select name="dept" id="teacher-dept">
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
                            <input type="text" name="teacher-dept" id="teacher-dept" placeholder="<?php echo $valueDept; ?>">
                            <label for="teacher-name" class="">Teacher Name:</label>
                            <input type="text" name="teacher-name" id="teacher-name" placeholder="<?php echo $valueName; ?>">
                            <label for="teacher-phone" class="">Teacher Phone:</label>
                            <input type="text" name="teacher-phone" id="teacher-phone" placeholder="<?php echo $valuePhone; ?>">
                            <hr>
                            <button type="submit" name="update-teacher-info" value="Update Teacher"
                                class="btn btn-warning btn-block">Update
                                Teacher</button>
                    </div>
                    </form>

            </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>