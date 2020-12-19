<?php
include('dbh.inc.php');
session_start();
if(isset($_POST['submit'])){
    $_SESSION['loggedIn'] = 1;  
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sqlStudent = "select id, user_name, password from student_info where user_name = '$userName'";
    $resultStudent = mysqli_query($conn, $sqlStudent);

    $sqlTeacher = "select id, user_name, password from teacher_info where user_name = '$userName'";
    $resultTeacher = mysqli_query($conn, $sqlTeacher);
    if($userName == "admin" && $userPassword == "admin"){
        header("location: ../admin.php");
    }
    elseif(mysqli_num_rows($resultStudent) > 0){
        // print_r($resultStudent);
        $row = mysqli_fetch_assoc($resultStudent);
        if(password_verify($userPassword, $row['password'])){
            // echo "thanks student";
            $_SESSION['STUDENT_ID'] = $row['id'];
            // echo $_SESSION['STUDENT_ID'];
            header("location:../student.main.php");

        }else{
            // echo "student password is not correct";
            $msg = "Invalid password of Student!";
            header("location: ../index.php?msg=$msg");
        }
    }
    elseif(mysqli_num_rows($resultTeacher) > 0){
        $row = mysqli_fetch_assoc($resultTeacher);
        if(password_verify($userPassword, $row['password'])){
            // echo "thanks teacher";
            $_SESSION['TEACHER_ID'] = $row['id'];
            // echo $_SESSION['TEACHER_ID'];
            header("location:../teacher.main.php");
        }else{
            // echo "teacher password is not correct";
            $msg = "Invalid password of Teacher!";
            header("location: ../index.php?msg=$msg");

        }
    }else{
        $msg = "Invalid User!";
        header("location: ../index.php?msg=$msg");
    }




}
?>