<!DOCTYPE HTML>
<html>

<head>
    <title>Add Teacher Information</title>
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

    <!-- Header -->
    <?php include('includes/menu.php');?>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Add Teacher Information</h1>
            <p></p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper" style="padding: 10px 0px 32px;">
        <div class="inner">
            <div class="highlights">
                <section>
                    <form action="includes/addteacher.inc.php" method="post">
                        <div class="content" style="padding: 10px;">
                            <!-- <label for="teacher-id" class="">Teacher ID:</label>
                            <input type="text" name="teacher-id" id="teacher-id" required> -->
                            <label for="teacher-dept" class="">Teacher Dept:</label>
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
                            <label for="teacher-name" class="">Teacher Name:</label>
                            <input type="text" name="teacher-name" id="teacher-name" required>
                            <label for="teacher-email" class="">Teacher Email:</label>
                            <input type="email" name="teacher-email" id="teacher-email">
                            <label for="phone-number" class="">Teacher Phone:</label>
                            <input type="text" name="phone-number" id="phone-number" required>
                            <label for="teacher-username" class="">Teacher Username:</label>
                            <input type="text" name="teacher-username" id="teacher-username" required>
                            <label for="teacher-password" class="">Teacher Password:</label>
                            <input type="text" name="teacher-password" id="teacher-password" required>
                            <hr>
                            <button type="submit" name="add-teacher-info" value="Add Teacher"
                                class="btn btn-warning btn-block">Add Teacher</button>
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