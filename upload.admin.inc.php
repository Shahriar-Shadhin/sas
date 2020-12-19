<?php
    include('dbh.inc.php');

    session_start();
	if($_SESSION['loggedIn'] !== 1){
		header("location: index.php");
		
	}else{
		
	}


    if(isset($_POST['submit-student'])){
        $fileName = $_FILES['studentinfo']['name'];
        $fileTmpName = $_FILES['studentinfo']['tmp_name'];
        $fileSize = $_FILES['studentinfo']['size'];
        $fileError = $_FILES['studentinfo']['error'];
        $fileType = $_FILES['studentinfo']['type']; 
        $i =0;
        if($fileSize>0){
            $handle = fopen($fileTmpName, 'r');
            while(($data = fgetcsv($handle,10000,',')) !== FALSE){
                if($i>0){
                    $hash = password_hash($data[7], PASSWORD_DEFAULT);
                    $sql = "INSERT INTO student_info(id, name, user_name, dept, session, semester, email, password) VALUES
                    ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$hash')";
                    mysqli_query($conn, $sql);

                    $copyData = "INSERT INTO user_password(id, current_pass) VALUES('$data[0]','$hash')";
                    mysqli_query($conn, $copyData);
                }
                $i++;
            }


            header("Location: ../upload.admin.php");
            // echo "<script>alert('successful');</script>";
        }
    }
    elseif(isset($_POST['submit-teacher'])){
        $fileName = $_FILES['teacherinfo']['name'];
        $fileTmpName = $_FILES['teacherinfo']['tmp_name'];
        $fileSize = $_FILES['teacherinfo']['size'];
        $fileError = $_FILES['teacherinfo']['error'];
        $fileType = $_FILES['teacherinfo']['type'];
        $i =0;
        if($fileSize>0){
            $handle = fopen($fileTmpName, 'r');
            while(($data = fgetcsv($handle,1000,',')) !== FALSE){
                if($i>0){
                    // echo "<pre>";
                    // echo print_r($data);
                    $hash = password_hash($data[6], PASSWORD_DEFAULT);
                    $sql = "INSERT INTO teacher_info(id, name, user_name, dept, phone, email, password) VALUES
                    ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$hash')";
                    mysqli_query($conn, $sql);

                    $copyData = "INSERT INTO user_password(id, current_pass) VALUES('$data[0]','$hash')";
                    mysqli_query($conn, $copyData);
                }
                    
                $i++;
            }
            

            header("Location: ../upload.admin.php");
            // echo "<script>alert('successful');</script>";
        }

    }
    elseif(isset($_POST['submit-course'])){

        $fileName = $_FILES['courseinfo']['name'];
        $fileTmpName = $_FILES['courseinfo']['tmp_name'];
        $fileSize = $_FILES['courseinfo']['size'];
        $fileError = $_FILES['courseinfo']['error'];
        $fileType = $_FILES['courseinfo']['type'];
        $i =0;
        if($fileSize>0){
            $handle = fopen($fileTmpName, 'r');
            while(($data = fgetcsv($handle,1000,',')) !== FALSE){
                if($i>0){
                    // echo "<pre>";
                    // echo print_r($data);
                    $sql = "INSERT INTO course_info(code, name, dept, semester, class_num, credit, teacher_id) VALUES
                    ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')";
                    mysqli_query($conn, $sql);

                    $sqlTable = "CREATE TABLE $data[0](
                        class_number int(11),
                        class_code int(11),
                        student_id varchar(255),
                        time_limit varchar(255),
                        date datetime,
                        room_num int(11)) ";
                        mysqli_query($conn, $sqlTable);
                        


                }
                $i++;
            }

            

            // echo "<script>alert('successful');</script>";
            header("Location: ../upload.admin.php");
            
        }

    }
    ?>