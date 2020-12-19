<?php
include('dbh.inc.php');
if(isset($_POST['delete-teacher-info'])){

    $teacherId = mysqli_real_escape_string($conn,$_POST['teacher-id']);

    $sql = "DELETE FROM teacher_info WHERE id='$teacherId';";
    $result = mysqli_query($conn, $sql);
    header("Location: ../deleteteacher.info.php?teacherremove=successful");

}
?>