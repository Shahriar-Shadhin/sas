<?php
include('dbh.inc.php');
session_start();
if(isset($_POST['update-teacher-info'])){
    // echo $_SESSION["stuId"];

    // $studentId =  mysqli_real_escape_string($conn,$_POST['student-id']);
    $teacherId = $_SESSION["teacId"];
    $teacherDept =  mysqli_real_escape_string($conn,$_POST['teacher-dept']);
    $teacherName =  mysqli_real_escape_string($conn,$_POST['teacher-name']);
    $teacherPhone =  mysqli_real_escape_string($conn,$_POST['teacher-phone']);
    // $teacherUserName =  mysqli_real_escape_string($conn,$_POST['teacher-username']);
    // $teacherPassword =  mysqli_real_escape_string($conn,$_POST['teacher-password']);
    // echo $teacherId . "<br>" . $teacherName;

    $sql = "UPDATE teacher_info SET name='$teacherName', dept='$teacherDept', phone='$teacherPhone'  WHERE id='$teacherId';";
    $result = mysqli_query($conn, $sql);
    header("Location: ../updateinfo.main.php");
    session_abort();

}
?>