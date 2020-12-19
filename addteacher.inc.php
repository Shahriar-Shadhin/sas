<?php
include('dbh.inc.php');

                if(isset($_POST['add-teacher-info'])){
                    $teacherId = mysqli_real_escape_string($conn,$_POST['teacher-id']);
                    $teacherDept = mysqli_real_escape_string($conn,$_POST['dept']);
                    $teacherPhone = mysqli_real_escape_string($conn,$_POST['phone-number']);
                    $teacherName = mysqli_real_escape_string($conn,$_POST['teacher-name']);
                    $teacherUserName = mysqli_real_escape_string($conn,$_POST['teacher-username']);
                    $teacherPassword = mysqli_real_escape_string($conn,$_POST['teacher-password']);
                    $teacherEmail = mysqli_real_escape_string($conn,$_POST['teacher-email']);
                    $hashPass = password_hash($teacherPassword, PASSWORD_DEFAULT);

                    // echo $teacherId . '<br>' . $teacherDept. '<br>' . $teacherPhone
                    //  . '<br>' . '<br>' . $teacherUserName. '<br>' . $teacherPassword
                    //  . '<br>' . $teacherName;

                    $sql = "INSERT INTO teacher_info(name, user_name, dept, phone, email, password) VALUES('$teacherName', '$teacherUserName', '$teacherDept', '$teacherPhone', '$teacherEmail', '$hashPass');";

                    mysqli_query($conn, $sql);
                    
                    header("Location: ../addteacher.info.php?courseinfo=successful");
                }
                
                ?>