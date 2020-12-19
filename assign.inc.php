<?php
include("dbh.inc.php");
session_start();
if(isset($_POST['assign'])){
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $courses = $_POST['courses'];
    $dept= $_SESSION['TEACHER-DESIG'];
    $designation = $_SESSION['TEACHER-DEPT'];
    $name = $_SESSION['TEACHER-NAME'];

    $sql = "select id from teacher_info where name = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    
    
    foreach($courses as $data){
        $sql = "update course_info set teacher_id = '$id' where code='$data'";
        mysqli_query($conn, $sql);
    }
    // session_abort();
    header("location:../assign.courses.php");
    

    // $sql = "SELECT code from course_info where dept = '$teacherDept';";

    // $result = mysqli_query($conn, $sql);
    // echo "<prev>";
    // print_r($result) ;
    
}
?>