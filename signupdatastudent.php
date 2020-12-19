<?php
include('includes/dbh.inc.php');

$oldPass = mysqli_real_escape_string($conn,$_GET['oldPass']);
$newPass = mysqli_real_escape_string($conn,$_GET['newPass']);
// echo $newPass."<br>";
// $conPass = mysqli_real_escape_string($conn,$_GET['conPass']);
$newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
// echo $newPassHash."<br>";

session_start();
$id = $_SESSION['STUDENT_ID'];
$sql1 = "select current_pass, pass_1, pass_2, pass_3 from user_password where id = '$id' ";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $currentPass = $row['current_pass'];
    $pass_1 = $row['pass_1'];
    $pass_2 = $row['pass_2'];
    $pass_3 = $row['pass_3'];
    // echo $currentPass."<br>";
    // var_dump($currentPass)."<br>";
    // var_dump(password_verify($newPass, $currentPass));
    
    
}else{
    echo 'Database error! no result found';
}







if(empty($pass_1)&&empty($pass_2)&&empty($pass_3)){
    if(!password_verify($newPass, $currentPass)){
        $sql3 = "UPDATE user_password SET pass_1='$currentPass' WHERE id='$id'";
        mysqli_query($conn, $sql3);
        $sql2 = "UPDATE user_password SET current_pass='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql2);

        $sql6 = "UPDATE student_info
        SET password='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql6);

        // echo 'condition 1';
        header("location: signup.student.php");
    }else{
        // echo "matched in 1";
        $msg = "password is matching between last three password!";
        header("location: signup.student.php?msg=".$msg);
    }
    
}
elseif(empty($pass_2)&&empty($pass_3)){
    if(!password_verify($newPass, $currentPass) && !password_verify($newPass, $pass_1)){
        $sql4 = "UPDATE user_password SET pass_2='$pass_1' WHERE id='$id'";
        mysqli_query($conn, $sql4);
        $sql3 = "UPDATE user_password SET pass_1='$currentPass' WHERE id='$id'";
        mysqli_query($conn, $sql3);
        $sql2 = "UPDATE user_password
        SET current_pass='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql2);

        $sql6 = "UPDATE student_info
        SET password='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql6);

        // echo "condition 2";
        header("location: signup.student.php");
    }else{
        // echo "matched in 2";
        $msg = "password is matching between last three password!";
        header("location: signup.student.php?msg=".$msg);
    }
}elseif(empty($pass_3)){
    if(!password_verify($newPass, $currentPass) && !password_verify($newPass, $pass_1) && !password_verify($newPass, $pass_2)){
        $sql5 = "UPDATE user_password SET pass_3='$pass_2' WHERE id='$id'";
        mysqli_query($conn, $sql5);
        $sql4 = "UPDATE user_password SET pass_2='$pass_1' WHERE id='$id'";
        mysqli_query($conn, $sql4);
        $sql3 = "UPDATE user_password SET pass_1='$currentPass' WHERE id='$id'";
        mysqli_query($conn, $sql3);
        $sql2 = "UPDATE user_password SET current_pass='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql2);

        $sql6 = "UPDATE student_info
        SET password='$newPassHash' WHERE id='$id';";
        mysqli_query($conn, $sql6);

        // echo "condition 3";
        header("location: signup.student.php");
    }else{
        // echo "matched in 3";
        $msg = "password is matching between last three password!";
        header("location: signup.student.php?msg=".$msg);
    }
}
elseif(!password_verify($newPass, $currentPass) && !password_verify($newPass, $pass_1) && !password_verify($newPass, $pass_2) && !password_verify($newPass, $pass_3) ){
    // $sql = "UPDATE user_password
    // SET current_pass='$newPassHash', pass_1='$currentPass', pass_2='$pass_1', pass_3='$pass_2' WHERE id='$id';";
    // mysqli_query($conn, $sql);

    

    $sql5 = "UPDATE user_password SET pass_3='$pass_2' WHERE id='$id'";
    mysqli_query($conn, $sql5);
    $sql4 = "UPDATE user_password SET pass_2='$pass_1' WHERE id='$id'";
    mysqli_query($conn, $sql4);
    $sql3 = "UPDATE user_password SET pass_1='$currentPass' WHERE id='$id'";
    mysqli_query($conn, $sql3);
    $sql2 = "UPDATE user_password
    SET current_pass='$newPassHash' WHERE id='$id';";
    mysqli_query($conn, $sql2);

    $sql6 = "UPDATE student_info
    SET password='$newPassHash' WHERE id='$id';";
    mysqli_query($conn, $sql6);


    


    header("location: signup.student.php");
}else{
    $msg = "password is matching between last three password!";
    // echo $msg;
    header("location: signup.student.php?msg=".$msg);
}









?>