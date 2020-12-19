<!DOCTYPE HTML>
<html>

<head>
    <title>Delete Course Information</title>
    <?php include('includes/header.php');
    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}
	?>
    
    <style>
        .search-box {
            text-align: center;
            width: 300px;


        }

        .search-btn {
            margin-top: 5px;

        }

        section {
            margin: 0 auto;
        }
    </style>
</head>

<body class="is-preload">

    <!-- Header -->
    <?php include('includes/menu.php');?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Delete Course Information</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->


    <section class="wrapper">
        <div class="inner">
            <div class="highlights">
            <section>
                    <div class="content">
                        <header>
                        <h3>Delete All Courses By Dept</h3>
                        </header>

                        <form action="" method="post">
                <label for="dept">Select dept:</label>
                <select name="dept" id="dept">
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
                <br>
                <button class="delete-btn" type="submit" name="delete-btn">Delete</button>
                </form>
                    </div>
                </section>
                <?php
                include "includes/dbh.inc.php";

                if(isset($_POST['delete-btn'])){
                    $sql = "DELETE FROM course_info";
                    if(mysqli_query($conn, $sql)){
                        echo "<script>alert('all records are deleted!')</script>";
                    }else{
                        echo "<script>alert('error!')</script>";

                    }
                }
                ?>
            </div>
        </div>
    </dection>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>