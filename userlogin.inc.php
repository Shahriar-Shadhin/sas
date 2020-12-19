<?php
include('dbh.inc.php');
session_start();
if(isset($_POST['submit'])){
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['password']);
    // echo $userPassword;
    if($userName == "admin" && $userPassword == "admin"){
        header("location: ../admin.php");
        // echo "admin";
    }else{
    $hashPass = array();
    $dbId = array();
    $sqlHashpassDb = "select id, current_pass from user_password";
    $result = mysqli_query($conn, $sqlHashpassDb);
    while($row = mysqli_fetch_assoc($result)){
        array_push($dbId, $row['id']);
        array_push($hashPass, $row['current_pass']);
    }
    // echo "<pre>";
    // print_r($hashPass);
    // echo "<br>";
    // echo "<pre>";
    // print_r($dbId);
    foreach ($hashPass as $data) {
        if(password_verify($userPassword, $data)){
            // echo "successful password verify<br>";
            $sql = "select id from user_password where current_pass = '$data';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $userId = $row['id'];
            $sqlStudent = "select user_name from student_info where id = '$userId'";
            $resultStudent = mysqli_query($conn, $sqlStudent);
            if (mysqli_num_rows($resultStudent) > 0){
                $row = mysqli_fetch_assoc($resultStudent);
                if($userName == $row['user_name']){
                    // echo $row['user_name'] . "<br>";
                    // echo "student<br>";
                    $_SESSION['STUDENT_ID'] = $userId;
                    // echo "student id is" . $_SESSION['STUDENT_ID'] . "<br>";
                    header("location:../student.main.php");
                }else{
                    // echo "user name of student not found<br>";
                    $msg = "Invalid user name of Student!";
                    header("location: ../index.php?msg=$msg");
                }
            }else{
                $sqlTeacher = "select user_name from teacher_info where id = '$userId'";
                $resultTeacher = mysqli_query($conn, $sqlTeacher);
                if(mysqli_num_rows($resultTeacher) > 0){
                    $row = mysqli_fetch_assoc($resultTeacher);
                    if($userName == $row['user_name']){
                        // echo $row['user_name'];
                        // echo "teacher<br>";
                        $_SESSION['TEACHER_ID'] = $userId;
                        // echo "teacher id is" . $_SESSION['TEACHER_ID'] . "<br>";
                        header("location:../teacher.main.php");
                    }else{
                        $msg = "Invalid user name of teacher!";
                        header("location: ../index.php?msg=$msg");
                        // echo "user name of teacher not found<br>";
                    }
                }
            }
        
    }
}
}





}

