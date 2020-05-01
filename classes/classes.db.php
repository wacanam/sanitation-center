<?php
$servername = "u3r5w4ayhxzdrw87.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "c7yg3tqcqei1s2z0";
$password = "cy3gfw6k19dtwvdt";
$dbname = "f693ja7ivvr5yc7l";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mobile_handwash_and_footbath";

// Create connection
$db_conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// checkConnection($db_conn);
// addBooth('booth002', $db_conn);
// addBooth2( $db_conn);

function checkConnection($conn){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
function checkName($name, $conn){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function addBooth2($conn){
    $sql = "INSERT INTO booth (display_name, location_coor, mobile_num, status, battery1_lvl, battery2_lvl, water_lvl, soap_lvl, on_charge_batt, on_load_batt, water_pump_stat, soap_pump_stat, blower_stat)
    VALUES ('bot1', 'cdo', '0000000', 'disable', 100, 100, 100, 100, 1, 0, 1, 1, 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
function addBooth($display_name, $conn){
    $sql = "INSERT INTO booth (display_name)
    VALUES ('$display_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    $conn->close();
}