<?php
$year = $_GET['year'];
$semester = $_GET['semester'];

include('includes/dbh.inc.php');

if($year == "1st" && $semester == "1st"){
    $sql = "select code, name from course_info where semester= '1st'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
    
}elseif($year == "1st" && $semester == "2nd"){
    $sql = "select code, name from course_info where semester= '2nd'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "2nd" && $semester == "1st"){
    $sql = "select code, name from course_info where semester= '3rd'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "2nd" && $semester == "2nd"){
    $sql = "select code, name from course_info where semester= '4th'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "3rd" && $semester == "1st"){
    $sql = "select code, name from course_info where semester= '5th'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "3rd" && $semester == "2nd"){
    $sql = "select code, name from course_info where semester= '6th'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "4th" && $semester == "1st"){
    $sql = "select code, name from course_info where semester= '7th'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}elseif($year == "4th" && $semester == "2nd"){
    $sql = "select code, name from course_info where semester= '8th'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        echo '<div class="course-codes code-area" style="margin: 5px;">';
        
        echo '<input type="checkbox" id="'. $row['code']. '"'. 'name="courses[]"'. 'value="'. $row['code'] . '"'.'>';
        echo '<label for="'. $row['code']. '"'.'style="padding: 0px 5px 0px 40px;">'. $row['code']. '</label>';
        echo $row['name'];
        
        echo '</div>';
        
    }
}else{
    alert("No Data Found");
}


?>