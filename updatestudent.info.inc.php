<?php
include('dbh.inc.php');
session_start();
if(isset($_POST['update-student-info'])){
    // echo $_SESSION["stuId"];

    // $studentId =  mysqli_real_escape_string($conn,$_POST['student-id']);
    $studentId = $_SESSION["stuId"];
    $studentDept =  mysqli_real_escape_string($conn,$_POST['student-dept']);
    $studentName =  mysqli_real_escape_string($conn,$_POST['student-name']);
    $studentSession =  mysqli_real_escape_string($conn,$_POST['student-session']);
    $studentUserName =  mysqli_real_escape_string($conn,$_POST['student-username']);
    // $studentPassword =  mysqli_real_escape_string($conn,$_POST['student-password']);


    $sql = "UPDATE student_info
    
    SET name='$studentName', user_name='$studentUserName', dept='$studentDept', session='$studentSession' WHERE id='$studentId';";
    $result = mysqli_query($conn, $sql);
    header("Location: ../updateinfo.main.php");
    session_abort();

}
?>