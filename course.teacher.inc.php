<?php
include('dbh.inc.php');
// session_start();
$teacherId = $_SESSION['TEACHER_ID'];
// echo $teacherId;

$sql = "select * from course_info where teacher_id = '$teacherId';";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $name = $row['name'];
    $code = $row['code'];

// }


// echo $name . '<br>'. $code;


?>

<section>
    <div class="content">
        <header>
            <a href="courses.teacher.php" class="icon fa-files-o"><span class="label">Icon</span></a>
                <h3><?php echo $name?></h3>
        </header>
        <p><?php echo $code?></p>
        <form action="studentdetails.main.teacher.php" method="post">
            <input type="submit" value="View student details" name="submit">
        </form>
    </div>

</section>
<?php
}
?>