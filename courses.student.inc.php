<?php

$lat = $_POST['Lat'];
$lon = $_POST['Lon'];
$room_number = $_POST['Room'];

$lat = (double) $lat;
$lon = (double) $lon;

// $arr = [$lat, $lon];

include('dbh.inc.php');

$rm = "SELECT * FROM class_room where room_num = '$room_number'";
$res = mysqli_query($conn, $rm);
$data = mysqli_fetch_assoc($res);
$latDb = (double)$data['latitude'];
$lonDb = (double)$data['longitude'];

if($lat == $latDb && $lon == $lonDb ){
    echo 1;

}else{
    echo 0;
}