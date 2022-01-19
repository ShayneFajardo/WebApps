<?php
@include_once '../PHP_Comms/Functions.php';
require_once '../PHP_Comms/SQL.php';
session_start();
print_r($_SESSION);
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="img_wrapper2"></div>
    <?php
    @include_once 'NavBar.php';
    ?>
    <div id="Profile_Wrapper">
        <div class="Profile_Set">
            <div class="pfp"> 
                <?php
                $userID = $_SESSION["BloomUser_id"];
                $q = "select bloom_pfp from bloom_user where user_id = '$userID' limit 1";
                $BF = new bloom_functions();
                $result = $BF->read($q);
            $image = $result;
            if(file_exists($result[0]['bloom_pfp'])){
                $image = $result[0]['bloom_pfp'];
            } else {
                $image = "../../Assets/Pictures/anonymous-male-profile-picture-emotion-avatar-vector-15887369.jpg";
            }
                
            ?> <img src="<?php echo $image ?>"> </div>
            <div class="Details">
                <h2> Shayne Fajardo </h2>
                <p>Eat my longgadog</p>
            </div>
            <a href="pfp.php"><button id="edit_btn">Edit Profile</button></a>
        </div>
        <?php
        @include_once 'Post_Box.php';
        ?>
    </div>


    <?php

    echo '<link rel="stylesheet" type="text/css" href="../../CSS/Main.css">';
    echo '<link rel="stylesheet" type="text/css" href="../../CSS/Profile.css">';
    ?>
</body>
</html>