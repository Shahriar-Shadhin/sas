<?php
include('dbh.inc.php');
session_start();
if(isset($_POST['update-course-info'])){
    // echo $_SESSION["stuId"];

    // $studentId =  mysqli_real_escape_string($conn,$_POST['student-id']);
    $courseCode = $_SESSION["courCode"];
    $courseDept =  mysqli_real_escape_string($conn,$_POST['course-dept']);
    $courseSemester =  mysqli_real_escape_string($conn,$_POST['course-semester']);
    $courseClass =  mysqli_real_escape_string($conn,$_POST['course-class']);
    $courseName =  mysqli_real_escape_string($conn,$_POST['course-name']);
    $courseCredit =  mysqli_real_escape_string($conn,$_POST['course-credit']);
    // echo $teacherId . "<br>" . $teacherName;

    $sql = "UPDATE course_info SET name='$courseName', dept='$courseDept', semester='$courseSemester', class_num ='$courseClass',
     credit='$courseCredit'  WHERE code='$courseCode';";
    $result = mysqli_query($conn, $sql);
    header("Location: ../updateinfo.main.php");
    session_abort();

}
?>