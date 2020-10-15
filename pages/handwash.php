<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Handwash and Foothbath | Handwash</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<body>
    <div class="w3-container">
        <h2 class="w3-center"><span><a href="javascript:history.back()" class="fa fa-reply w3-left" style="text-decoration: none;"></a></span></span>Handwash Quick Stats</h2>
        <?php
        require_once "../classes/classes.db.php";
        $sql = "SELECT * FROM `booth` ORDER BY id DESC";
        $result = $db_conn->query($sql);

        if ($result->num_rows > 0) : ?>

            <?php 
            // output data of each row
            while ($row = $result->fetch_assoc()) : ?>
                <hr>
                <div style="padding: 0px; margin: 0px; line-height: 10px">
                    <h5 id="booth001">Name: <?=$row['display_name']?></h5>
                    <p>Location Coor.: <?=$row['location_coor']?></p>
                    <p>Address: <?=$row['address']?></p>
                    <?php
                    ($row['status']) ? print('<p>Status: <span class="fa fa-check-circle w3-text-green">&nbsp;Active</span></p>') :  print('<p>Status: <span class="fa fa-ban w3-text-red">&nbsp;Disable</span></p>');
                    ?>

                    <button onclick="document.getElementById('id<?=$row['id']?>').style.display='block'" class="w3-button w3-red w3-center fa fa-gear">&nbsp;Setting</button>

                    <div id="id<?=$row['id']?>" class="w3-modal w3-animate-opacity">
                        <div class="w3-modal-content w3-card-4">
                            <header class="w3-container w3-teal w3-padding-16">
                                <span onclick="document.getElementById('id<?=$row['id']?>').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                                <h2><?=$row['display_name']?> | Setting</h2>
                            </header>
                            <div class="w3-container w3-padding">
                                <form action="#" method="post">
                                    <input class="w3-check" type="checkbox" checked="checked">
                                    <label>Faucet</label>
                                    <hr>
                                    <input class="w3-check" type="checkbox" checked="checked">
                                    <label>Soap</label>
                                    <hr>
                                    <input class="w3-check" type="checkbox" checked="checked">
                                    <label>Blower</label>
                                    <hr>
                                    <select class="w3-select" name="charging_batt">
                                        <option value="" disabled selected>🔋 Battery Charging | Loaded</option>
                                        <option value="2">Battery 2</option>
                                    </select>
                                    <button type="submit" class="w3-teal w3-padding w3-margin">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <h5>Battery Level</h5>
                    <div class="w3-grey">
                        <div class="w3-container w3-center w3-padding w3-green" style="width:<?=$row['battery1_lvl']?>%"><?=$row['battery1_lvl']?>%&nbsp;|&nbsp;<?php ($row['on_charge_batt'])? print("Active") : print("Charging")?></div>
                    </div>
                    
                    <h5>Liquid Soap Level</h5>
                    <div class="w3-grey">
                        <div class="w3-container w3-center w3-padding w3-red" style="width:<?=$row['soap_lvl']?>%"><?=$row['soap_lvl']?>%</div>
                    </div>

                    <h5>Water Level</h5>
                    <div class="w3-grey">
                        <div class="w3-container w3-center w3-padding w3-teal" style="width:<?=$row['water_lvl']?>%"><?=$row['water_lvl']?>%</div>
                    </div>
                </div>
        <?php
            endwhile;
            $result->free();
            echo "Fetched data successfully\n";

            $db_conn->close();
        endif;
        ?>

    </div>
</body>

</html>