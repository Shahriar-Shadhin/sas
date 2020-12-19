<?php
include('dbh.inc.php');

                if(isset($_POST['add-student-info'])){
                    $studentId = mysqli_real_escape_string($conn,$_POST['student-id']);
                    $studentDept = mysqli_real_escape_string($conn,$_POST['dept']);
                    $studentSemester = mysqli_real_escape_string($conn,$_POST['student-semester']);
                    $studentName = mysqli_real_escape_string($conn,$_POST['student-name']);
                    $studentSession = mysqli_real_escape_string($conn,$_POST['student-session']);
                    $studentUserName = mysqli_real_escape_string($conn,$_POST['student-username']);
                    $studentPassword = mysqli_real_escape_string($conn,$_POST['student-password']);
                    $studentEmial = mysqli_real_escape_string($conn,$_POST['student-email']);

                    $hashPass = password_hash($studentPassword, PASSWORD_DEFAULT);

                    // echo $studentId . '<br>' . $studentDept. '<br>' . $studentSemester
                    //  . '<br>' . $studentName. '<br>' . $studentSession. '<br>' . $studentUserName
                    //  . '<br>' . $studentPassword;

                    $sql = "INSERT INTO student_info(id, name, user_name, dept, session, semester, email, password) VALUES('$studentId',
                    '$studentName', '$studentUserName', '$studentDept', '$studentSession', '$studentSemester', '$studentEmial', '$hashPass');";

                    mysqli_query($conn, $sql);
                    
                    header("Location: ../addstudent.info.php?studnetinfo=successful");
                }
                
                ?>