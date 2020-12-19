<?php
include('dbh.inc.php');
if(isset($_POST['delete-student-info'])){

    $studentId = mysqli_real_escape_string($conn,$_POST['student-id']);

    $sql = "DELETE FROM student_info WHERE id='$studentId';";
    $result = mysqli_query($conn, $sql);
    header("Location: ../deletestudent.info.php?studnetremove=successful");

}
?>