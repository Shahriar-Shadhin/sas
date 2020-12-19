<?php
include('dbh.inc.php');

                if(isset($_POST['add-course-info'])){
                    $courseCode = mysqli_real_escape_string($conn,$_POST['course-code']);
                    $courseDept = mysqli_real_escape_string($conn,$_POST['dept']);
                    $courseSemester = mysqli_real_escape_string($conn,$_POST['course-semester']);
                    $courseClass = mysqli_real_escape_string($conn,$_POST['course-class']);
                    $courseName = mysqli_real_escape_string($conn,$_POST['course-name']);
                    $courseCredit = mysqli_real_escape_string($conn,$_POST['course-credit']);
                    $table = mysqli_real_escape_string($conn,$_POST['table']);
                    
                    if($table==""){
                        $sql = "INSERT INTO course_info(code, name, dept, semester, class_num, credit) VALUES('$courseCode',
                        '$courseName', '$courseDept', '$courseSemester', '$courseClass', '$courseCredit');";
    
                        mysqli_query($conn, $sql);
                        
                        header("Location: ../addcourse.info.php?courseinfo=successful");
                    }else{
                        $sql = "INSERT INTO course_info(code, name, dept, semester, class_num, credit) VALUES('$courseCode',
                        '$courseName', '$courseDept', '$courseSemester', '$courseClass', '$courseCredit');";
    
                        mysqli_query($conn, $sql);

                        $sql2 = "CREATE TABLE $courseCode(
                            class_number int(11),
                            class_code int(11),
                            student_id varchar(255),
                            time_limit varchar(255),
                            date datetime,
                            room_num int(11)
                        )";
                        if(mysqli_query($conn, $sql2)){
                            header("Location: ../addcourse.info.php?courseinfo=successful with table");
                        }else{
                            header("Location: ../addcourse.info.php?courseinfo=successful with but table error");
                        }
                        
                        
                    }
                    // echo $teacherId . '<br>' . $teacherDept. '<br>' . $teacherPhone
                    //  . '<br>' . '<br>' . $teacherUserName. '<br>' . $teacherPassword
                    //  . '<br>' . $teacherName;

                    
                }
                
                ?>