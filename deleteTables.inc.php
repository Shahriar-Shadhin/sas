<?php
include('dbh.inc.php');

if(isset($_POST['dlt_tabels'])){
    $sql = "SELECT code from course_info";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $counter = 0;
        while($row = mysqli_fetch_array($result)){
            $sqlDtl = "DROP TABLE $row[0]";
            if(mysqli_query($conn, $sqlDtl)){
                $counter++;
            }else{
                echo "NO Table Found named {$row[0]}<br>";
            }

            
        }
    }else{
        echo "<script>alert('No Tables Found!')</script>";
    }

    echo "<script>alert('Total " . $counter . " Tables Deleted ')</script>";
}

if(isset($_POST['delete-course-info'])){

    $courseCode = mysqli_real_escape_string($conn,$_POST['course-code']);
    $table = mysqli_real_escape_string($conn,$_POST['table']);

    if($table == ""){
        $sql = "DELETE FROM course_info WHERE code='$courseCode';";
        mysqli_query($conn, $sql);
        header("Location: ../deletecourse.info.php?courseremove=successful without table");
    }else{
        $sql = "DELETE FROM course_info WHERE code='$courseCode';";
        $result = mysqli_query($conn, $sql);

        $sql2 = "DROP TABLE $courseCode";
        if(mysqli_query($conn, $sql2)){
            header("Location: ../deletecourse.info.php?courseremove=successful with table");
        }else{
        
            header("Location: ../deletecourse.info.php?courseremove=table not found");
        }
    
    }
    

}

?>