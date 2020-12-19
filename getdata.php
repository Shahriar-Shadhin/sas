<?php
include('includes/dbh.inc.php');

$depts = $_GET['selectvalue'];
$sql = "select name from teacher_info where dept= '$depts' order by name";
$result = mysqli_query($conn, $sql);
                                
// $arr1 = [];                  
while($row = mysqli_fetch_assoc($result)){
    // array_push($arr1, $row);
    
    foreach ($row as $data) {
                echo "<option>$data</option>";
                
            }
        
}

?>