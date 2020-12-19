<!DOCTYPE HTML>
<html>

<head>
    <title>Browse Teacher Information By Department</title>
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
            <h1>Browse Teacher By Department</h1>
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
                        <!-- <select name="dept" id="dept" onchange="depts(this.value)"> -->
                        <select name="dept" id="dept" required>
                            <!-- <option value="null" disabled selected>select a department</option> -->
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
                        <!-- <label for="teacher-name">Teacher Name:</label>
                        <input type="text" name="teacher-name" id="teacher-name">
                        <select name="teacher-name" id="teacher-name">
                        <option >Select</option>
                        </select> -->
                        <button type="submit" name="search" style="margin-top: 5px;">Search</button>
                    </form>
                    <div class="display-info" style="overflow: auto; height: 450px; max-width: auto;">
                        <h3>Teacher Details</h3>
                        <table>
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        
                        <?php
                        include("includes/dbh.inc.php");
                            if(isset($_POST['search'])){

                                $dept = $_POST['dept'];
                                // echo $dept;

                                $sql = "SELECT * from teacher_info where dept= '$dept'";
                                $result = mysqli_query($conn, $sql);
                                $id = [];
                                $name = [];
                                $userName = [];
                                $phn = [];
                                $email = [];
                                // print_r($result);

                                if(mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>
                                                <td>
                                                {$row['id']}
                                                </td>
                                                <td>
                                                {$row['name']}
                                                </td>
                                                <td>
                                                {$row['user_name']}
                                                </td>
                                                <td>
                                                {$row['phone']}
                                                </td>
                                                <td>
                                                {$row['email']}
                                                </td>
                                            </tr>";
                                    }
                                
                                }else{
                                    echo "<script>alert('No Teacher Found');</script>";
                                }
                            
                            
                                
                            }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- < src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></>
    <>
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
    </> -->

    

    


    <!-- Footer -->
    <?php include('includes/footer.php');?>
</body>

</html>