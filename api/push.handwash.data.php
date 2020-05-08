<?php

    if(isset($_POST['push.handwash.data'])){
 
        require_once "../classes/classes.db.php";
        require_once "../vendor/autoload.php";

        $id= mysqli_real_escape_string($conn, $_POST['id']);
        $battery1_lvl = mysqli_real_escape_string($conn, $_POST['battery1_lvl']);
        $battery2_lvl = mysqli_real_escape_string($conn, $_POST['battery2_lvl']);
        $soap_lvl = mysqli_real_escape_string($conn, $_POST['soap_lvl']);
        $water_lvl = mysqli_real_escape_string($conn, $_POST['water_lvl']);

        $data = array(
            'id' => $id,
            'battery1_lvl' => $battery1_lvl,
            'battery2_lvl' => $battery2_lvl,
            'soap_lvl' => $soap_lvl,
            'water_lvl' => $water_lvl
          );
        function publishHandwashData($data, $conn){
        $sql = "INSERT INTO booth (battery1_lvl, battery2_lvl, water_lvl, soap_lvl) VALUES ($data->battery1_lvl, $data->battery2_lvl, $data->water_lvl, $data->soap_lvl) WHERE id = $data->id;";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            $conn->close();
        }
        function pushNotif($data){
            $pusher = new Pusher\Pusher('cb1f2f0c72bcf179a8b1', '778823848992c2e6cc83', '841238', array('cluster' => 'mt1'));
            $response = $pusher->trigger("my-channel", "my-event", $data);
            ($response)? print("<script> window.location.href = '../?page=createpost&loc=".$data['status']."'</script>") : pushNotif($data);
          }
        publishHandwashData($id, $battery1_lvl, $battery2_lvl, $water_lvl, $soap_lvl, $conn);
        
    }else{
        echo "request cannot proceed!";
    }