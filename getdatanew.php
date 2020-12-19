<?php
include('includes/dbh.inc.php');

$year = $_GET['selectvalue'];

                                
$semester = array('1st', '2nd');   
echo "<option>Select</option>";
foreach ($semester as $data) {

    echo "<option>$data</option>";
};

?>
