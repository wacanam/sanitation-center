<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Handwash and Foothbath</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Karma", sans-serif
    }

    .w3-bar-block .w3-bar-item {
        padding: 20px
    }
</style>


<body>
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button fa fa-close w3-right-align"></a>
        <a href="?page=home" onclick="w3_close()" class="w3-bar-item w3-button fa fa-home">&nbsp; Home</a>
        <a href="?page=menu" onclick="w3_close()" class="w3-bar-item w3-button fa fa-bars">&nbsp; Menu</a>
        <a href="?page=about" onclick="w3_close()" class="w3-bar-item w3-button fa fa-info">&nbsp; About</a>
        <a href="?page=setting" onclick="w3_close()" class="w3-bar-item w3-button fa fa-gear">&nbsp; Setting</a>
    </nav>

    <!-- Top menu -->
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <?php if (!isset($_GET['page']) || ($_GET['page'] == "home")) : ?>
                <div class="w3-center w3-padding-16 "><i class="fa fa-home"></i>&nbsp; Home</div>
                <h1 class="w3-center">Mobile Handwash and Footbath | Monitoring</h1>
                <p class="w3-center w3-padding-0">A project initiative of USTP to fight againts COVID-19</p>
        </div>
    </div>
            <?php
                include_once "pages/home.php";
                include_once "pages/footer.php";
            endif; ?>
            <?php if (isset($_GET['page']) && ($_GET['page'] == "menu")) : ?>
                <div class="w3-center w3-padding-16"><i class="fa fa-bars"></i>&nbsp; Menu</div>
        </div>
    </div>
            <?php
                include_once "pages/menu.php";
                include_once "pages/footer.php";
            endif; ?>
            <?php if (isset($_GET['page']) && ($_GET['page'] == "about")) : ?>
                <div class="w3-center w3-padding-16"><i class="fa fa-info"></i>&nbsp; About</div>
        </div>
    </div>
            <?php
                include_once "pages/about.php";
                include_once "pages/footer.php";
            endif; ?>
            <?php if (isset($_GET['page']) && ($_GET['page'] == "setting")) : ?>
                <div class="w3-center w3-padding-16"><i class="fa fa-gear"></i>&nbsp; Setting</div>
        </div>
    </div>
            <?php
                include_once "pages/setting.php";
                include_once "pages/footer.php";
            endif; ?>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>

</html>