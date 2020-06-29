<?php
    require_once "../classes/classes.db.php";

    $post = file_get_contents('php://input');
    $json = json_decode($post);
    var_dump($json);
    if($json){
        updateBooth($json, $db_conn);
    }
    function updateBooth($data, $conn){
        $sql = "UPDATE booth SET battery1_lvl = $data->battery1, soap_lvl = $data->soap, water_lvl = $data->water WHERE id = $data->booth_id;";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
        $conn->close();
    }
